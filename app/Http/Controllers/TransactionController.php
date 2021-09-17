<?php

namespace App\Http\Controllers;

use Auth;
use App\bank;
use App\User;
use App\website as web;
use App\Customer;
use App\transaction as trx;
use App\activity_log as log;
use App\bank_master as master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function getdata(Request $request){
        // dd($request);
        $arr_cust = array();
        $arr_bank = array();
        $arr_master = array();
        $custs = customer::all();
        $data = web::where('id', $request->id)->get();
        $banks = bank::whereIn('id', explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->bank)))->get();

        foreach($custs as $cust){
            array_push($arr_cust, $cust->user_id);
        }
        foreach ($banks as $bank) {
            array_push($arr_master, $bank->bank_master_id);
        }

        for($i=0; $i < count($banks); $i++){
            $arr_bank[$i]["id"] = $banks[$i]->id;
            $arr_bank[$i]["bank_name"] = $banks[$i]->bank_name;
            $arr_bank[$i]["acc_no"] = $banks[$i]->acc_no;
        }

        $master = master::whereIn('id', $arr_master)->get();
        // dd($master);

        return response()->json(["message"=>"success","customers"=>$arr_cust, "banks"=>$arr_bank, "masters"=>$master]);
    }
    public function getbankdetail(Request $request){
        $cek1 = web::where('id', $request->id_web)->get('bank');
        $cek2 = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $cek1[0]->bank));
        // dd($cek2);
        $banks = bank::where('bank_master_id', $request->id_master)
                ->whereIn('id', $cek2)
                ->orderBy('holder_name', 'ASC')
                ->get();
        return response()->json(["message"=>"success","banks"=>$banks]);
    }

    public function getpersenbonus(Request $request){
        $amount = str_replace(",","", $request->amount);

        $persen = web::where('id', $request->web)->get();
        if ($request->type == "bonus_new") {
            $bonus = $amount * ($persen[0]->persen_new_member / 100);
        } else {
            $bonus = $amount * ($persen[0]->persen_harian / 100);
        }
        return response()->json(["message"=>"success","bonus"=>$bonus]);
    }

    public function getdatabank(){
        $webs = web::all();
        return response()->json(["message"=>"success", "webs"=>$webs]);
    }

    public function process(Request $request){

        $web = web::where('id', $request->web)->first();
        $bank = bank::where('id', $request->bank)->first();
        $old_coin = (int)$web->init_coin;
        $old_balance = (int)$bank->saldo;
        $amount = str_replace(",","", $request->amount);

        if($request->type == "deposit"){

            if(isset($request->bonus_type)){
                $amount_bonus = str_replace(",","", $request->bonus_final);
                if ($request->bonus_type == "bonus_new") {
                    $bonus = "persen_new_member";
                } else {
                    $bonus = "persen_harian";
                }
                $cek = trx::where('trx_type', "Deposit")->count();
                $cek1 = trx::where('trx_type', "Bonus")->count();
                if($cek == 0){
                    $dp_trx_number = "DP/".date('Y/m/d')."/1";
                }else{
                    $dp_trx_number = "DP/".date('Y/m/d')."/".($cek+1);
                }
                if($cek1 == 0){
                    $bonus_trx_number = "BNS/".date('Y/m/d')."/1";
                }else{
                    $bonus_trx_number = "BNS/".date('Y/m/d')."/".($cek+1);
                }
    
                $trx = new trx;
                $trx->submitter_id = auth::user()->id;
                $trx->submitter_name = auth::user()->name;
                $trx->trx_type = "Deposit";
                $trx->trx_detail = "-";
                $trx->trx_number = $dp_trx_number;
                $trx->user_name = $request->user;
                $trx->bank_name = $bank->bank_name;
                $trx->acc_no = $bank->acc_no;
                $trx->holder_name = $bank->holder_name;
                $trx->website_name = $web->web_name;
                $trx->amount = $amount;
                $trx->old_web_coin = $old_coin;
                $trx->new_web_coin = $old_coin - $amount;
                $trx->old_bank_balance = $old_balance;
                $trx->new_bank_balance = $old_balance + $amount;
                $trx->save();
    
                $web->init_coin = $old_coin - $amount;
                $web->save();
    
                $bank->saldo = $old_balance + $amount;
                $bank->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." approve ".$request->type." senilai ".$request->amount." untuk Player ".$request->user;
                $log->save();
    
                $trx_bonus = new trx;
                $trx_bonus->submitter_id = auth::user()->id;
                $trx_bonus->submitter_name = auth::user()->name;
                $trx_bonus->trx_type = "Bonus";
                $trx_bonus->trx_detail = $bonus;
                $trx_bonus->trx_number = $bonus_trx_number;
                $trx_bonus->trx_source = $dp_trx_number;
                $trx_bonus->user_name = $request->user;
                $trx_bonus->bank_name = "-";
                $trx_bonus->acc_no = "-";
                $trx_bonus->holder_name = "-";
                $trx_bonus->website_name = $web->web_name;
                $trx_bonus->amount = $amount_bonus;
                $trx_bonus->old_web_coin = $old_coin - $amount;
                $trx_bonus->new_web_coin = $old_coin - $amount - $amount_bonus;
                $trx_bonus->old_bank_balance = 0;
                $trx_bonus->new_bank_balance = 0;
                $trx_bonus->save();
    
                $web->init_coin = $old_coin - $amount_bonus;
                $web->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." submit Bonus ".$bonus." ,amount: ".$amount_bonus." for Player ".$request->user;
                $log->save();
            }else{
                $cek = trx::where('trx_type', "Deposit")->count();
                if($cek == 0){
                    $dp_trx_number = "DP/".date('Y/m/d')."/1";
                }else{
                    $dp_trx_number = "DP/".date('Y/m/d')."/".($cek+1);
                }
    
                $trx = new trx;
                $trx->submitter_id = auth::user()->id;
                $trx->submitter_name = auth::user()->name;
                $trx->trx_type = "Deposit";
                $trx->trx_detail = "-";
                $trx->trx_number = $dp_trx_number;
                $trx->user_name = $request->user;
                $trx->bank_name = $bank->bank_name;
                $trx->acc_no = $bank->acc_no;
                $trx->holder_name = $bank->holder_name;
                $trx->website_name = $web->web_name;
                $trx->amount = $amount;
                $trx->old_web_coin = $old_coin;
                $trx->new_web_coin = $old_coin - $amount;
                $trx->old_bank_balance = $old_balance;
                $trx->new_bank_balance = $old_balance + $amount;
                $trx->save();
    
                $web->init_coin = $old_coin - $amount;
                $web->save();
    
                $bank->saldo = $old_balance + $amount;
                $bank->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." approve ".$request->type." senilai ".$request->amount." untuk Player ".$request->user;
                $log->save();
            }
        }else if($request->type == "withdrawal"){

            $cek = trx::where('trx_type', "Withdrawal")->count();
            if($cek == 0){
                $wd_trx_number = "WD/".date('Y/m/d')."/1";
            }else{
                $wd_trx_number = "WD/".date('Y/m/d')."/".($cek+1);
            }

            $trx = new trx;
            $trx->submitter_id = auth::user()->id;
            $trx->submitter_name = auth::user()->name;
            $trx->trx_type = "Withdrawal";
            $trx->trx_detail = "-";
            $trx->trx_number = $wd_trx_number;
            $trx->user_name = $request->user;
            $trx->bank_name = $bank->bank_name;
            $trx->acc_no = $bank->acc_no;
            $trx->holder_name = $bank->holder_name;
            $trx->website_name = $web->web_name;
            $trx->amount = $amount;
            $trx->old_web_coin = $old_coin;
            $trx->new_web_coin = $old_coin + $amount;
            $trx->old_bank_balance = $old_balance;
            $trx->new_bank_balance = $old_balance - $amount;
            $trx->save();

            $web->init_coin = $old_coin + $amount;
            $web->save();

            $bank->saldo = $old_balance - $amount;
            $bank->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." approve ".$request->type." senilai ".$amount." untuk Player ".$request->user;
            $log->save();
        }
        return response()->json(["message"=>"success"]);
    }

    public function getdataadddeductcoin(Request $request){
        if (auth::user()->role == "superadmin") {
            $web = web::all();
        } else if(auth::user()->role == "Leader"){
            $webs = web::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                    array_push($arr_web, $web->id);
                }
            }
            $web = web::whereIn('id', $arr_web)->get();
        }else{
            $webs = web::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                    array_push($arr_web, $web->id);
                }
            }
            $web = web::whereIn('id', $arr_web)->get(); 
        }


        return response()->json(["message"=>"success", "data"=>$web]);
    }
    public function getdataadddeductcoindetail(Request $request){
        // dd($request);
        $data = web::where('id', $request->id)->get();
        return response()->json(["message"=>"success","data"=>$data]);
    }

    public function addcoinprocess(Request $request){
        $id = $request->id;
        $amount = $request->amount;

        $web = web::where('id', $request->id)->first();



        $trx = new trx;
        $trx->trx_type = "Add Coin";
        $trx->user_name = "-";
        $trx->bank_name = "-";
        $trx->acc_no = "-";
        $trx->holder_name = "-";
        $trx->website_name = $web->web_name;
        $trx->amount = $request->amount;
        $trx->old_web_coin = $web->init_coin;
        $trx->new_web_coin = $web->init_coin + $request->amount;
        $trx->old_bank_balance = 0;
        $trx->new_bank_balance = 0;
        $trx->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." add ".$request->amount." coins to website: ".$web->web_name;
        $log->save();

        $web->init_coin = $web->init_coin + $request->amount;
        $web->save();

        return response()->json(["message"=>"success"]);
    }
    public function deductcoinprocess(Request $request){
        $id = $request->id;
        $amount = $request->amount;

        $web = web::where('id', $request->id)->first();

        if ($web->init_coin < $request->amount) {
            return response()->json(["message"=>"error"]);
        } else {

            $trx = new trx;
            $trx->trx_type = "Deduct Coin";
            $trx->user_name = "-";
            $trx->bank_name = "-";
            $trx->acc_no = "-";
            $trx->holder_name = "-";
            $trx->website_name = $web->web_name;
            $trx->amount = $request->amount;
            $trx->old_web_coin = $web->init_coin;
            $trx->new_web_coin = $web->init_coin - $request->amount;
            $trx->old_bank_balance = 0;
            $trx->new_bank_balance = 0;
            $trx->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." deduct ".$request->amount." coins from website: ".$web->web_name;
            $log->save();

            $web->init_coin = $web->init_coin - $request->amount;
            $web->save();

            return response()->json(["message"=>"success"]);
        }
    }

    public function getdataadddeductbalance(Request $request){
        $data = bank::all();
        return response()->json(["message"=>"success","data"=>$data]);
    }
    public function getdataadddeductbalancedetail(Request $request){
        // dd($request);
        $data = bank::where('id', $request->id)->get();
        return response()->json(["message"=>"success","data"=>$data]);
    }

    public function addbalanceprocess(Request $request){
        $id = $request->id;
        $amount = $request->amount;

        $bank = bank::where('id', $request->id)->first();



        $trx = new trx;
        $trx->trx_type = "Add Balance";
        $trx->user_name = "-";
        $trx->bank_name = $bank->bank_name;
        $trx->acc_no = $bank->acc_no;
        $trx->holder_name = $bank->holder_name;
        $trx->website_name = "-";
        $trx->amount = $request->amount;
        $trx->old_web_coin = 0;
        $trx->new_web_coin = 0;
        $trx->old_bank_balance = $bank->saldo;
        $trx->new_bank_balance = $bank->saldo + $request->amount;
        $trx->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." add ".$request->amount." to bank: ".$bank->bank_name." with account number: ".$bank->acc_no;
        $log->save();

        $bank->saldo = $bank->saldo + $request->amount;
        $bank->save();

        return response()->json(["message"=>"success"]);
    }
    public function deductbalanceprocess(Request $request){
        $id = $request->id;
        $amount = $request->amount;

        $bank = bank::where('id', $request->id)->first();

        if ($bank->saldo < $request->amount) {
            return response()->json(["message"=>"error"]);
        } else {
            

            $trx = new trx;
            $trx->trx_type = "Deduct Balance";
            $trx->user_name = "-";
            $trx->bank_name = $bank->bank_name;
            $trx->acc_no = $bank->acc_no;
            $trx->holder_name = $bank->holder_name;
            $trx->website_name = "-";
            $trx->amount = $request->amount;
            $trx->old_web_coin = 0;
            $trx->new_web_coin = 0;
            $trx->old_bank_balance = $bank->saldo;
            $trx->new_bank_balance = $bank->saldo - $request->amount;
            $trx->save();
    
            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." deduct ".$request->amount." from bank: ".$bank->bank_name." with account number: ".$bank->acc_no;
            $log->save();
    
            $bank->saldo = $bank->saldo - $request->amount;
            $bank->save();
    
            return response()->json(["message"=>"success"]);
        }
    }
}
