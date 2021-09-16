<?php

namespace App\Http\Controllers;

use Auth;
use App\bank;
use App\cost;
use App\User;
use App\website;
use App\Customer;
use App\pending;
use App\transaction as trx;
use App\activity_log as log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingController extends Controller
{
    public function getdatapending(){
        $data = pending::all();
        return response()->json(["message"=>"success","data"=>$data]);
    }
    public function getdatabank(){
        if (auth::user()->role == "superadmin") {
            $data = bank::all();
        } else if(auth::user()->role == "Leader"){
            $webs = website::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                    array_push($arr_web,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                }
            }
            $data = bank::whereIn('id', $arr_web[0])->get();
        }else{
            $webs = website::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                    array_push($arr_web,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                }
            }
            $data = bank::whereIn('id', $arr_web[0])->get(); 
        }
        return response()->json(["message"=>"success","banks"=>$data]);
    }

    public function pendingprocess(Request $request){
        $cek = pending::all()->count();
        if($cek == 0){
            $trx_name = "PND/".date('Y/m/d')."/1";
        }else{
            $trx_name = "PND/".date('Y/m/d')."/".($cek+1);
        }
        $bank = bank::where('id', $request->bank)->get();
        
        $pend = new pending;
        $pend->trx_name = $trx_name;
        $pend->bank_id = $bank[0]->id;
        $pend->bank_name = $bank[0]->bank_name;
        $pend->acc_no = $bank[0]->acc_no;
        $pend->user_id = "-";
        $pend->user_name = $request->user;
        $pend->amount = $request->amount;
        $pend->status = "Pending";
        $pend->status_detail = "-";
        $pend->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." input new pending transaction with transaction number: ".$trx_name.
                         " to bank ".$bank[0]->bank_name." with account number ".$bank[0]->acc_no." and amount ".$request->amount.
                         " for user ".$request->user;
        $log->save();

        return response()->json(["message"=>"success"]);
    }

    public function getdatapendingdepowd(Request $request){
        // dd($request);
        $arr_cust = array();
        $arr_bank = array();
        $arr_banks = array();
        $arr_web = array();
        $custs = customer::all();
        $data = pending::where('id', $request->id)->get();
        $active_bank = bank::where('id', $data[0]->bank_id)->get("id");
        $amount = $data[0]->amount;

        if (auth::user()->role == "superadmin") {
            $banks = bank::all();
            $webs  = website::all();
        } else if(auth::user()->role == "Leader"){
            $webs = website::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                    array_push($arr_bank,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                    array_push($arr_web,$web->id);
                }
            }
            $banks = bank::whereIn('id', $arr_bank[0])->get();
            $webs = website::where('id', $arr_web[0])->get();

            for($i=0; $i < count($banks); $i++){
                $arr_banks[$i]["id"] = $banks[$i]->id;
                $arr_banks[$i]["bank_name"] = $banks[$i]->bank_name;
                $arr_banks[$i]["acc_no"] = $banks[$i]->acc_no;
            }
        }else{
            $webs = website::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                    array_push($arr_bank,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                    array_push($arr_web, $web->id);
                }
            }
            $banks = bank::whereIn('id', $arr_bank[0])->get();
            $webs = website::where('id', $arr_web[0])->get(); 

            for($i=0; $i < count($banks); $i++){
                $arr_banks[$i]["id"] = $banks[$i]->id;
                $arr_banks[$i]["bank_name"] = $banks[$i]->bank_name;
                $arr_banks[$i]["acc_no"] = $banks[$i]->acc_no;
            }
        }

        foreach($custs as $cust){
            array_push($arr_cust, $cust->user_id);
        }



        // dd($arr_cust, $arr_bank, $active_bank, $amount);

        return response()->json(["message"=>"success","customers"=>$arr_cust, "banks"=>$arr_banks,"website"=>$webs, "active_bank"=>$active_bank[0]->id, "amount"=>$amount]);
    }
    public function getdatapendingcost(Request $request){
        // dd($request);
        $arr_cust = array();
        $arr_bank = array();
        $custs = customer::all();
        $banks = bank::all();
        $data = pending::where('id', $request->id)->get();
        $active_bank = bank::where('id', $data[0]->bank_id)->get("id");
        $amount = $data[0]->amount;

        foreach($custs as $cust){
            array_push($arr_cust, $cust->name);
        }

        if (auth::user()->role == "superadmin") {
            $banks = bank::all();
            $webs  = website::all();
        } else if(auth::user()->role == "Leader"){
            $webs = website::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                    array_push($arr_bank,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                    array_push($arr_web,$web->id);
                }
            }
            $banks = bank::whereIn('id', $arr_bank[0])->get();
            $webs = website::where('id', $arr_web[0])->get();

            for($i=0; $i < count($banks); $i++){
                $arr_banks[$i]["id"] = $banks[$i]->id;
                $arr_banks[$i]["bank_name"] = $banks[$i]->bank_name;
                $arr_banks[$i]["acc_no"] = $banks[$i]->acc_no;
            }
        }else{
            $webs = website::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                    array_push($arr_bank,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                    array_push($arr_web, $web->id);
                }
            }
            $banks = bank::whereIn('id', $arr_bank[0])->get();
            $webs = website::where('id', $arr_web[0])->get(); 

            for($i=0; $i < count($banks); $i++){
                $arr_banks[$i]["id"] = $banks[$i]->id;
                $arr_banks[$i]["bank_name"] = $banks[$i]->bank_name;
                $arr_banks[$i]["acc_no"] = $banks[$i]->acc_no;
            }
        }

        // dd($arr_cust, $arr_bank, $active_bank, $amount);

        return response()->json(["message"=>"success","customers"=>$arr_cust, "banks"=>$arr_banks, "active_bank"=>$active_bank[0]->id, "amount"=>$amount]);
    }

    public function pendingdepowdprocess(Request $request){
        // dd($request);
        $bank = bank::where('id', $request->bank)->first();
        $web = website::where('id', $request->web)->first();
        $pending = pending::where('id', $request->id_pending)->first();
        $old_balance = (int)$bank->saldo;
        $old_coin = (int)$web->init_coin;

        if($request->type == "deposit"){
            $trx = new trx;
            $trx->trx_type = "Deposit";
            $trx->user_name = $request->user;
            $trx->bank_name = $bank->bank_name;
            $trx->acc_no = $bank->acc_no;
            $trx->holder_name = $bank->holder_name;
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

            $pending->status = "Processed";
            $pending->status_detail = "Deposit";
            $pending->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." approve Deposit with amount ".$request->amount." for Player ".$request->user." from Pending transaction with number ".$pending->trx_name;
            $log->save();
        }else{
            $trx = new trx;
            $trx->trx_type = "Withdrawal";
            $trx->user_name = $request->user;
            $trx->bank_name = $bank->bank_name;
            $trx->acc_no = $bank->acc_no;
            $trx->holder_name = $bank->holder_name;
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

            $pending->status = "Processed";
            $pending->status_detail = "Withdrawal";
            $pending->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." approve Withdrawal with amount ".$request->amount." for Player ".$request->user." from Pending transaction with number ".$pending->trx_name;
            $log->save();
        }
        return response()->json(["message"=>"success"]);
    }

    public function costprocess(Request $request){

        $bank = bank::where('id', $request->bank)->first();
        $pending = pending::where('id', $request->id_pending)->first();
        $old_balance = (int)$bank->saldo;

        $cek = cost::all()->count();
        if($cek == 0){
            $trx_name = "COST/".date('Y/m/d')."/1";
        }else{
            $trx_name = "COST/".date('Y/m/d')."/".($cek+1);
        }

        $trx = new trx;
        $trx->trx_type = "Cost";
        $trx->user_name = "COMPANY";
        $trx->bank_name = $bank->bank_name;
        $trx->acc_no = $bank->acc_no;
        $trx->holder_name = $bank->holder_name;
        $trx->website_name = "-";
        $trx->amount = $request->amount;
        $trx->old_web_coin = 0;
        $trx->new_web_coin = 0;
        $trx->old_bank_balance = 0;
        $trx->new_bank_balance = 0;
        $trx->save();

        $pending->status = "Processed";
        $pending->status_detail = "COST";
        $pending->save();

        $cost = new cost;
        $cost->from_trx_Name = $pending->trx_name;
        $cost->trx_Name = $trx_name;
        $cost->bank_id = $bank->id;
        $cost->bank_name = $bank->bank_name;
        $cost->acc_no = $bank->acc_no;
        $cost->user_id = "-";
        $cost->user_name = "-";
        $cost->amount = $request->amount;
        $cost->status = "-";
        $cost->status_detail = "-";
        $cost->note = $request->note;
        $cost->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." approve Pending transaction with number ".$pending->trx_name." for COST with note ".$request->note;
        $log->save();

        return response()->json(["message"=>"success"]);
    }
}
