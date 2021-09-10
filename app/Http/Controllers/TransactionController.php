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

class TransactionController extends Controller
{
    public function getdata(Request $request){
        // dd($request);
        $arr_cust = array();
        $arr_bank = array();
        $custs = customer::all();
        $data = website::where('id', $request->id)->get();
        $banks = bank::whereIn('id', explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->bank)))->get();

        foreach($custs as $cust){
            array_push($arr_cust, $cust->user_id);
        }

        for($i=0; $i < count($banks); $i++){
            $arr_bank[$i]["id"] = $banks[$i]->id;
            $arr_bank[$i]["bank_name"] = $banks[$i]->bank_name;
            $arr_bank[$i]["acc_no"] = $banks[$i]->acc_no;
        }

        return response()->json(["message"=>"success","customers"=>$arr_cust, "banks"=>$arr_bank]);
    }

    public function getdatabank(){
        $webs = website::all();
        return response()->json(["message"=>"success", "webs"=>$webs]);
    }

    public function process(Request $request){
        // dd($request);
        $web = website::where('id', $request->web)->first();
        $old_coin = (int)$web->init_coin;
        if($request->type == "withdrawal"){
            $bank = bank::where('id', $request->bank)->first();
            $old_balance = (int)$bank->saldo;
        }

        if($request->type == "deposit"){
            $trx = new trx;
            $trx->trx_type = "Deposit";
            $trx->user_name = $request->user;
            $trx->bank_name = $bank->bank_name;
            $trx->acc_no = $bank->acc_no;
            $trx->website_name = $web->web_name;
            $trx->amount = $request->amount;
            $trx->old_web_coin = $old_coin;
            $trx->new_web_coin = $old_coin - $request->amount;
            $trx->old_bank_balance = $old_balance;
            $trx->new_bank_balance = $old_balance + $request->amount;
            $trx->save();

            $web->init_coin = $old_coin - $request->amount;
            $web->save();

            $bank->saldo = $old_balance + $request->amount;
            $bank->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." approve ".$request->type." senilai ".$request->amount." untuk Player ".$request->user;
            $log->save();
        }else if($request->type == "withdrawal"){
            $trx = new trx;
            $trx->trx_type = "Withdrawal";
            $trx->user_name = $request->user;
            $trx->bank_name = $bank->bank_name;
            $trx->acc_no = $bank->acc_no;
            $trx->website_name = $web->web_name;
            $trx->amount = $request->amount;
            $trx->old_web_coin = $old_coin;
            $trx->new_web_coin = $old_coin + $request->amount;
            $trx->old_bank_balance = $old_balance;
            $trx->new_bank_balance = $old_balance - $request->amount;
            $trx->save();

            $web->init_coin = $old_coin + $request->amount;
            $web->save();

            $bank->saldo = $old_balance - $request->amount;
            $bank->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." approve ".$request->type." senilai ".$request->amount." untuk Player ".$request->user;
            $log->save();
        } else {
            $trx = new trx;
            $trx->trx_type = "Bonus";
            $trx->user_name = $request->user;
            $trx->bank_name = "-";
            $trx->acc_no = "-";
            $trx->website_name = $web->web_name;
            $trx->amount = $request->amount;
            $trx->old_web_coin = $old_coin;
            $trx->new_web_coin = $old_coin - $request->amount;
            $trx->old_bank_balance = 0;
            $trx->new_bank_balance = 0;
            $trx->save();

            $web->init_coin = $old_coin - $request->amount;
            $web->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." submit ".$request->type." ,amount: ".$request->amount." for Player ".$request->user;
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
        $data = website::where('id', $request->id)->get();
        return response()->json(["message"=>"success","data"=>$data]);
    }

    public function addcoinprocess(Request $request){
        $id = $request->id;
        $amount = $request->amount;

        $web = website::where('id', $request->id)->first();



        $trx = new trx;
        $trx->trx_type = "Add Coin";
        $trx->user_name = "-";
        $trx->bank_name = "-";
        $trx->acc_no = "-";
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

        $web = website::where('id', $request->id)->first();

        if ($web->init_coin < $request->amount) {
            return response()->json(["message"=>"error"]);
        } else {

            $trx = new trx;
            $trx->trx_type = "Deduct Coin";
            $trx->user_name = "-";
            $trx->bank_name = "-";
            $trx->acc_no = "-";
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
