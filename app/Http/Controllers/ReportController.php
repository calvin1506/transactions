<?php

namespace App\Http\Controllers;

use Auth;
use App\bank;
use App\User;
use App\website as web;
use App\Customer;
use App\transaction as trx;
use App\activity_log as log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function getwebreport(){
        $webs = web::all();
        return response()->json(["message"=>"success","data"=>$webs]);
    }

    public function reportgetdetaii (Request $request){
        // dd($request);
        $data = web::where('id', $request->id)->get();
        return response()->json(["message"=>"success","data"=>$data]);
    }

    public function reportweb($type){
        // dd($type);
        $type_report = $type;
        if ($type == "Website") {
            if (auth::user()->role == "superadmin") {
                $data = web::all();
            } else if(auth::user()->role == "Leader"){
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                        array_push($arr_web, $web->id);
                    }
                }
                $data = web::whereIn('id', $arr_web)->get();
            }else{
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                        array_push($arr_web, $web->id);
                    }
                }
                $data = web::whereIn('id', $arr_web)->get(); 
            }
        } else if ($type == "Bank") {
            $data = bank::all();
        } else if ($type == "Customer") {
            $data = customer::all();
        } else{
            if (auth::user()->role == "superadmin") {
                $data = web::all();
            } else if(auth::user()->role == "Leader"){
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                        array_push($arr_web, $web->id);
                    }
                }
                $data = web::whereIn('id', $arr_web)->get();
            }else{
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                        array_push($arr_web, $web->id);
                    }
                }
                $data = web::whereIn('id', $arr_web)->get(); 
            }
        }
        
        return view('report',["type"=>$type_report,"data"=>$data]);
    }

    public function reportprocess(Request $request){
        // dd($request);
        $timeFrom = date('Y-m-d', strtotime(substr($request->time,0,10)))." 00:00:00";
        $timeTo = date('Y-m-d', strtotime(substr($request->time,-10)))." 23:59:59";
        $perFrom = date('d-m-Y', strtotime(substr($request->time,0,10)));
        $perTo = date('d-m-Y', strtotime(substr($request->time,-10)));
        $period = $perFrom." - ".$perTo;

        if ($request->type == "Website") {
            $web = web::where('id', $request->id)->get();
            if ($request->trx == "all") {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->whereIn('trx_type',["deposit", "withdrawal", "Add Coin", "Deduct Coin", "bonus", "Cashback"])
                ->orderBy('created_at', 'ASC')->get();
            } else {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('trx_type',$request->trx)
                ->orderBy('created_at', 'ASC')->get();
            }

            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "webs"=>$web, "data"=>$data]);
        } else if($request->type == "Bank"){
            $bank = bank::where('id', $request->id)->get();
            if ($request->trx == "all") {
                $data = trx::where('acc_no', $bank[0]->acc_no)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->whereIn('trx_type',["deposit", "withdrawal", "Cost", "Add Balance", "Deduct Balance", "bonus"])
                ->orderBy('created_at', 'ASC')->get();
            } else {
                $data = trx::where('acc_no', $bank[0]->acc_no)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('trx_type',$request->trx)
                ->orderBy('created_at', 'ASC')->get();
            }
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "banks"=>$bank, "data"=>$data]);
        } else if($request->type == "Customer") {
            $custs = customer::where('id', $request->id)->get();
            if ($request->trx == "all") {
            $data = trx::where('user_name', $custs[0]->user_id)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->whereIn('trx_type',["deposit", "withdrawal", "Cashback", "bonus"])
                ->orderBy('created_at', 'ASC')->get();
            } else {
            $data = trx::where('user_name', $custs[0]->user_id)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('trx_type',$request->trx)
                ->orderBy('created_at', 'ASC')->get();
            }
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "custs"=>$custs, "data"=>$data]);
        }else if($request->type == "Cashback"){
            $web = web::where('id', $request->id)->get();
            if ($request->trx == "all") {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->whereIn('trx_type',["bonus", "Bonus", "cashback", "Cashback"])
                ->orderBy('created_at', 'ASC')->get();
            } else {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('trx_type',$request->trx)
                ->orderBy('created_at', 'ASC')->get();
            }
            
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "webs"=>$web, "data"=>$data]);
        } else {
            $web = web::where('id', $request->id)->get();

            $data = trx::where('website_name', $web[0]->web_name)
            ->where('updated_at', '>=', $timeFrom)
            ->where('updated_at','<=',$timeTo)
            ->orderBy('created_at', 'ASC')->get();

            // dd($data);
            $last = count($data) - 1;
            // dd($last);
            for ($i=0; $i < count($data) ; $i++) { 
                $Saldo_bank_awal = $data[0]["old_bank_balance"];
                // $Saldo_bank_akhir = $data[$last]["new_bank_balance"];
                $Saldo_bank_akhir = bank::where('acc_no', $data[0]->acc_no)->get('saldo');
                $Saldo_koin_awal = $data[0]["old_web_coin"];
                $Saldo_koin_akhir = $data[$last]["new_web_coin"];
                $PenambahanKoin = trx::whereIn('trx_type', ['Add Coin', 'Withdrawal'])->sum('amount');
                $PenguranganKoin =  trx::whereIn('trx_type', ['Deduct Coin', 'Deposit'])->sum('amount');
                $PenambahanSaldo = trx::whereIn('trx_type', ['Add Balance', 'Deposit'])->sum('amount');
                $PenguranganSaldo =   trx::whereIn('trx_type', ['Deduct Balance', 'Withdrawal'])->sum('amount');
                $Bonus =   trx::where('trx_type', 'Bonus')->sum('amount');
                $Cashback =   trx::where('trx_type', 'Cashback')->sum('amount');
            }
            // dd($Saldo_bank_awal, $Saldo_bank_akhir, $Saldo_koin_awal, $Saldo_koin_akhir, $PenambahanKoin, $PenguranganKoin, $PenambahanSaldo, $PenguranganSaldo);
            
            return response()->json(["message"=>"success",
                                    "period"=>$period,
                                    "type"=>$request->type, 
                                    "webs"=>$web, 
                                    "data"=>$data,
                                    "Saldo_bank_awal" => $Saldo_bank_awal,
                                    "Saldo_bank_akhir" =>$Saldo_bank_akhir,
                                    "Saldo_koin_awal" =>$Saldo_koin_awal,
                                    "Saldo_koin_akhir" =>$Saldo_koin_akhir,
                                    "PenambahanKoin" =>$PenambahanKoin,
                                    "PenguranganKoin" =>$PenguranganKoin,
                                    "PenambahanSaldo" =>$PenambahanSaldo,
                                    "PenguranganSaldo" =>$PenguranganSaldo,
                                    "Bonus" =>$Bonus,
                                    "Cashback" =>$Cashback
                                    ]);
        }
        
    }
}
