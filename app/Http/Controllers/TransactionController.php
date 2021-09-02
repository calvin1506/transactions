<?php

namespace App\Http\Controllers;

use Auth;
use App\bank;
use App\User;
use App\website;
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
            array_push($arr_cust, $cust->name);
        }

        for($i=0; $i < count($banks); $i++){
            $arr_bank[$i]["id"] = $banks[$i]->id;
            $arr_bank[$i]["bank_name"] = $banks[$i]->bank_name;
            $arr_bank[$i]["acc_no"] = $banks[$i]->acc_no;
        }

        return response()->json(["message"=>"success","customers"=>$arr_cust, "banks"=>$arr_bank]);
    }

    public function process(Request $request){
        // dd($request);
        $bank = bank::where('id', $request->bank)->first();
        $web = website::where('id', $request->web)->first();
        $cust = Customer::where('name', $request->user)->get("name");
        $old_balance = (int)$bank->saldo;
        $old_coin = (int)$web->init_coin;

        if($request->type == "deposit"){
            $trx = new trx;
            $trx->trx_type = $request->type;
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
        }else{
            $trx = new trx;
            $trx->trx_type = $request->type;
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
        }
        return response()->json(["message"=>"success"]);
    }
}
