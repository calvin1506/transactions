<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Bank;
use App\website;
use App\Customer;
use App\Cashback;
use App\ImportCashback as import;
use App\transaction as trx;
use App\activity_log as log;
use Illuminate\Http\Request;
use App\Imports\CashbackImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class CashbackController extends Controller
{
    public function getcashback(){

        $cashbacks = cashback::all();
        return response()->json(["message"=>"success", "data"=>$cashbacks]);
    }

    public function getdatacashback(){
        $arr_cust = array();
        $arr_bank = array();
        $arr_web = array();
        $banks = bank::all();
        $custs = customer::all();
        $websites = website::all();
        // dd($custs);
        foreach($custs as $cust){
            array_push($arr_cust, $cust->user_id);
        }
        for ($i=0; $i < count($banks); $i++) { 
            $arr_bank[$i]["id"] = $banks[$i]->id;
            $arr_bank[$i]["bank_name"] = $banks[$i]->bank_name;
            $arr_bank[$i]["acc_no"] = $banks[$i]->acc_no;
        }
        for ($j=0; $j < count($websites); $j++) { 
            $arr_web[$j]["id"] = $websites[$j]->id;
            $arr_web[$j]["web_name"] = $websites[$j]->web_name;
        }

        return response()->json(["message"=>"success", "custs"=>$arr_cust, "banks"=>$arr_bank, "webs"=>$arr_web]);
    }

    public function getdatacashbackdetail(Request $request){
        $data = cashback::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$data]);
    }

    public function singlecashbackprocess(Request $request){
        
        $web = website::where('id', $request->web)->first();

        $cek = cashback::all()->count();

        if ($cek == 0) {     
            $trx_num = "CB/".date('Y/m/d')."/1";
        } else {          
            $trx_num = "CB/".date('Y/m/d')."/".($cek+1);
        }

        $cb = new cashback;
        $cb->trx_number = $trx_num;
        $cb->user_id = $request->id;
        $cb->amount = $request->amount;
        $cb->web_id = $web->id;
        $cb->web_name = $web->web_name;
        $cb->save();

        $trx = new trx;
        $trx->trx_type = "Cashback";
        $trx->user_name = $request->id;
        $trx->bank_name = "-";
        $trx->acc_no = "-";
        $trx->website_name = $web->web_name;
        $trx->amount = $request->amount;
        $trx->old_web_coin = $web->init_coin;
        $trx->new_web_coin = $web->init_coin - $request->amount;
        $trx->old_bank_balance = 0;
        $trx->new_bank_balance = 0;
        $trx->save();

        $web->init_coin = $web->init_coin - $request->amount;
        $web->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." submit Cashback ".$request->amount." for user: ".$request->id;
        $log->save();

        return response()->json(["message"=>"success"]);
        
    }

    public function multicashbackprocess(Request $request){

        // validasi
		$this->validate($request, [
			'file_add_cashback' => 'required|mimes:csv,xls,xlsx'
		]);
 
		// menangkap file excel
		$file = $request->file('file_add_cashback');
 
		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();
 
		// upload ke folder file_siswa di dalam folder public
		$file->move('import_cashback',$nama_file);
 
		// import data
		Excel::import(new CashbackImport, public_path('/import_cashback/'.$nama_file));
 
		// alihkan halaman kembali
        // return response()->json(["message"=>"success"]);

        $arr_cb = array();
        $cek = import::all();
        for ($i=0; $i < count($cek); $i++) { 
            $arr_cb[$i]["user_id"] = $cek[$i]->user_id;
            $arr_cb[$i]["amount"] = $cek[$i]->amount;
        }
        // dd($arr_cb);


        $total = 0;

        for ($j=0; $j < count($arr_cb) ; $j++) { 

            $total += $arr_cb[$j]["amount"];
        }

        $webCek = website::where('id', $request->inlineRadioOptionsCashbackMulti)->get();

        for ($k=0; $k < count($arr_cb) ; $k++) { 
            if ($total > $webCek[0]->init_coin) {
                return back()->with('error', 'Cashback total amount bigger than available bank balance');
            } else {
                $web = website::where('id', $request->inlineRadioOptionsCashbackMulti)->first();
                $old_balance = $web->init_coin;

                $cekCB = cashback::all()->count();
    
                if ($cekCB == 0) {     
                    $trx_num = "CB/".date('Y/m/d')."/1";
                } else {          
                    $trx_num = "CB/".date('Y/m/d')."/".($cekCB+1);
                }
                
                
                $cb = new cashback;
                $cb->trx_number = $trx_num;
                $cb->user_id = $arr_cb[$k]["user_id"];
                $cb->amount = $arr_cb[$k]["amount"];
                $cb->web_id = $web->id;
                $cb->web_name = $web->web_name;
                $cb->save();
    
                $trx = new trx;
                $trx->trx_type = "Cashback";
                $trx->user_name = $arr_cb[$k]["user_id"];
                $trx->bank_name ="-";
                $trx->acc_no = "-";
                $trx->website_name = $web->web_name;
                $trx->amount = $arr_cb[$k]["amount"];
                $trx->old_web_coin = $old_balance;
                $trx->new_web_coin = $old_balance - $arr_cb[$k]["amount"];
                $trx->old_bank_balance = 0;
                $trx->new_bank_balance = 0;
                $trx->save();

                $web->init_coin = $web->init_coin - $arr_cb[$k]["amount"];
                $web->save();

                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." submit multiple cashback for user: ".$arr_cb[$k]["user_id"]." and amount: ".$arr_cb[$k]["amount"];
                $log->save();

                import::truncate();
            }
        }
        return back()->with('success', 'Success Submit Request');
    }   
}
