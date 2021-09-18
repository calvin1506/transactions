<?php

namespace App\Http\Controllers;

use Auth;
use App\bank;
use App\User;
use App\website as web;
use App\Customer;
use App\correction as corr;
use App\transaction as trx;
use App\activity_log as log;
use App\bank_master as master;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    public function getdata(Request $request){

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

        return response()->json(["message"=>"success","customers"=>$arr_cust, "banks"=>$arr_bank, "masters"=>$master]);
    }
    public function getbankdetail(Request $request){
        $cek1 = web::where('id', $request->id_web)->get('bank');
        $cek2 = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $cek1[0]->bank));
        
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

        // dd($request);
        if(is_null($request->bonus_type) || is_null($request->type) || is_null($request->bank) || is_null($request->user) || is_null($request->amount)){
            return response()->json(["message"=>"error", "data"=>"Please fill all data!"]);
        }else if($request->amount == 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot 0!"]);
        }else if($request->amount < 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot less than 0!"]);
        }

        $web = web::where('id', $request->web)->first();
        $bank = bank::where('id', $request->bank)->first();
        $old_coin = (int)$web->init_coin;
        $old_balance = (int)$bank->saldo;
        $amount = str_replace(",","", $request->amount);

        if($request->type == "deposit"){

            if ($amount > $web->init_coin) {
                return response()->json(["message"=>"error", "data"=>"Not enough Coins, please add coin first!"]);
            } else {
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
                        $bonus_trx_number = "BNS/".date('Y/m/d')."/".($cek1+1);
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
        
                    $web->init_coin = $old_coin - $amount - $amount_bonus;
                    $web->save();
    
                    $bank->saldo = $old_balance + $amount;
                    $bank->save();
        
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
            }
            

        }else if($request->type == "withdrawal"){

            if ($amount > $bank->saldo) {
                return response()->json(["message"=>"error", "data"=>"Not enough Balance, please add balance first!"]);
            } else {
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
        
        $data = web::where('id', $request->id)->get();
        return response()->json(["message"=>"success","data"=>$data]);
    }

    public function addcoinprocess(Request $request){

        if( $request->amount == 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot 0!"]);
        }else if ( $request->amount < 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot less than 0!"]);
        }

        $id = $request->id;
        $amount = $request->amount;

        $web = web::where('id', $request->id)->first();

        $cek = trx::where('trx_type', "Add Coin")->count();
        if($cek == 0){
            $trx_number = "AC/".date('Y/m/d')."/1";
        }else{
            $trx_number = "AC/".date('Y/m/d')."/".($cek+1);
        }

        $trx = new trx;
        $trx->submitter_id = auth::user()->id;
        $trx->submitter_name = auth::user()->name;
        $trx->trx_type = "Add Coin";
        $trx->trx_detail = "-";
        $trx->trx_number = $trx_number;
        $trx->trx_source = "-";
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
        if( $request->amount == 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot 0!"]);
        }else if ( $request->amount < 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot less than 0!"]);
        }

        $id = $request->id;
        $amount = $request->amount;

        $web = web::where('id', $request->id)->first();

        if ($web->init_coin < $request->amount) {
            return response()->json(["message"=>"error", "data"=>"Requested Amount bigger than available coins!"]);
        } else {

            $cek = trx::where('trx_type', "Deduct Coin")->count();
            if($cek == 0){
                $trx_number = "DC/".date('Y/m/d')."/1";
            }else{
                $trx_number = "DC/".date('Y/m/d')."/".($cek+1);
            }

            $trx = new trx;
            $trx->submitter_id = auth::user()->id;
            $trx->submitter_name = auth::user()->name;
            $trx->trx_type = "Deduct Coin";
            $trx->trx_detail = "-";
            $trx->trx_number = $trx_number;
            $trx->trx_source = "-";
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

        if(auth::user()->role == "Leader"){
            $webs = web::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                    array_push($arr_web,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                }
            }
            $data = bank::whereIn('id', $arr_web[0])->get();
        }else{
            $webs = web::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                    array_push($arr_web,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                }
            }
            $data = bank::whereIn('id', $arr_web[0])->get();
        }
        return response()->json(["message"=>"success","data"=>$data]);
    }
    public function getdataadddeductbalancedetail(Request $request){
        
        $data = bank::where('id', $request->id)->get();
        return response()->json(["message"=>"success","data"=>$data]);
    }

    public function addbalanceprocess(Request $request){
        if( $request->amount == 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot 0!"]);
        }else if ( $request->amount < 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot less than 0!"]);
        }
        $id = $request->id;
        $amount = $request->amount;

        $bank = bank::where('id', $request->id)->first();

        $cek = trx::where('trx_type', "Add Balance")->count();
        if($cek == 0){
            $trx_number = "AB/".date('Y/m/d')."/1";
        }else{
            $trx_number = "AB/".date('Y/m/d')."/".($cek+1);
        }


        $trx = new trx;
        $trx->submitter_id = auth::user()->id;
        $trx->submitter_name = auth::user()->name;
        $trx->trx_type = "Add Balance";
        $trx->trx_detail = "-";
        $trx->trx_number = $trx_number;
        $trx->trx_source = "-";
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
        if( $request->amount == 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot 0!"]);
        }else if ( $request->amount < 0){
            return response()->json(["message"=>"error", "data"=>"Amount cannot less than 0!"]);
        }
        $id = $request->id;
        $amount = $request->amount;

        $bank = bank::where('id', $request->id)->first();

        if ($bank->saldo < $request->amount) {
            return response()->json(["message"=>"error", "data"=>"Requested amount bigger than available balance!"]);
        } else {
            $cek = trx::where('trx_type', "Deduct Balance")->count();
            if($cek == 0){
                $trx_number = "DB/".date('Y/m/d')."/1";
            }else{
                $trx_number = "DB/".date('Y/m/d')."/".($cek+1);
            }

            $trx = new trx;
            $trx->submitter_id = auth::user()->id;
            $trx->submitter_name = auth::user()->name;
            $trx->trx_type = "Deduct Balance";
            $trx->trx_detail = "-";
            $trx->trx_number = $trx_number;
            $trx->trx_source = "-";
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

    public function getdatacorr(Request $request){
        if (auth::user()->role == "superadmin") {
            $trx = web::all();
        } else if(auth::user()->role == "Leader"){
            $webs = web::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                    array_push($arr_web, $web->id);
                }
            }
            $web = web::whereIn('id', $arr_web)->get('web_name');
            $data = trx::whereIn('website_name', $web)
                    ->whereIn('trx_type', ["Deposit", "Withdrawal", "Correction"])
                    ->get(); 
        }else{
            $webs = web::all();
            $arr_web = array();
            foreach($webs as $web){
                if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                    array_push($arr_web, $web->id);
                }
            }
            $web = web::whereIn('id', $arr_web)->get('web_name');
            $data = trx::whereIn('website_name', $web)
                    ->whereIn('trx_type', ["Deposit", "Withdrawal", "Correction"])
                    ->get();
        }

        return response()->json(["message"=>"success", "data"=>$data]);
    }

    public function getdatacorrdetail(Request $request){
        $data = trx::where('id', $request->id)->get();
        $bonus = trx::where('trx_source', $data[0]->trx_number)->get();
        // dd($data, $bonus);
        return response()->json(["message"=>"success", "data"=>$data, "bonus"=>$bonus]);
    }

    public function corrprocess(Request $request){
        $trx = trx::where('id', $request->trx_id)->first();
        $cek = trx::where('trx_type', 'Bonus')
            ->where('trx_source', $trx->trx_number)
            ->count();
        $website = web::where('web_name', $trx->website_name)->first();
        $bank = bank::where('acc_no', $trx->acc_no)->first();
    
        $cek1 = corr::all()->count();
        if($cek1 == 0){
            $corr_trx_name = "CORR/".date('Y/m/d')."/1";
        }else{
            $corr_trx_name = "CORR/".date('Y/m/d')."/".($cek1+1);
        }
    
    
        if ($request->trx_type == "Deposit") {
    
            if($cek == 1){
                $bonus = trx::where('id', $request->bonus_id)->first();
    
                $corr = new corr;
                $corr->corr_trx_num = $corr_trx_name;
                $corr->trx_type = "Deposit";
                $corr->trx_detail = $trx->trx_detail;
                $corr->trx_source = $trx->trx_number;
                $corr->old_amount = $trx->amount;
                $corr->old_bonus = 0;
                $corr->new_amount = $request->new_amount;
                $corr->new_bonus = 0;
                $corr->submitter_id = $trx->submitter_id;
                $corr->submitter_name = $trx->submitter_name;
                $corr->corrector_id = auth::user()->id;
                $corr->corrector_name = auth::user()->name;
                $corr->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." Input Correction for transaction Deposit with transaction number ".$trx->trx_numbe." corrected amount to ".$request->new_amount." from ".$trx->amount;
                $log->save();
                
    
                if($request->new_amount > $trx->amount){
                    $amount_trx = $request->new_amount - $trx->amount;
    
                    $trx_corr = new trx;
                    $trx_corr->submitter_id = auth::user()->id;
                    $trx_corr->submitter_name = auth::user()->name;
                    $trx_corr->trx_type = "Correction";
                    $trx_corr->trx_detail = "Deposit";
                    $trx_corr->trx_number = $corr_trx_name;
                    $trx_corr->trx_source = $trx->trx_number;
                    $trx_corr->user_name = $trx->user_name;
                    $trx_corr->bank_name = $trx->bank_name;
                    $trx_corr->acc_no = $trx->acc_no;
                    $trx_corr->holder_name = $trx->holder_name;
                    $trx_corr->website_name = $trx->website_name;
                    $trx_corr->amount = $amount_trx;
                    $trx_corr->old_web_coin = $website->init_coin;
                    $trx_corr->new_web_coin = $website->init_coin - $amount_trx;
                    $trx_corr->old_bank_balance = $bank->saldo;
                    $trx_corr->new_bank_balance = $bank->saldo + $amount_trx;
                    $trx_corr->note = "Correction Deposit";
                    $trx_corr->save();
    
                    $trx->note = "Correction Deposit";
                    $trx->save();
    
                    $bank->saldo = $bank->saldo + $amount_trx;
                    $bank->save();
                } else {
                    $amount_trx = $trx->amount - $request->new_amount;
    
                    $trx_corr = new trx;
                    $trx_corr->submitter_id = auth::user()->id;
                    $trx_corr->submitter_name = auth::user()->name;
                    $trx_corr->trx_type = "Correction";
                    $trx_corr->trx_detail = "Deposit";
                    $trx_corr->trx_number = $corr_trx_name;
                    $trx_corr->trx_source = $trx->trx_number;
                    $trx_corr->user_name = $trx->user_name;
                    $trx_corr->bank_name = $trx->bank_name;
                    $trx_corr->acc_no = $trx->acc_no;
                    $trx_corr->holder_name = $trx->holder_name;
                    $trx_corr->website_name = $trx->website_name;
                    $trx_corr->amount = $amount_trx;
                    $trx_corr->old_web_coin = $website->init_coin;
                    $trx_corr->new_web_coin = $website->init_coin + $amount_trx;
                    $trx_corr->old_bank_balance = $bank->saldo;
                    $trx_corr->new_bank_balance = $bank->saldo - $amount_trx;
                    $trx_corr->note = "Correction Deposit";
                    $trx_corr->save();
    
                    $trx->note = "Correction Deposit";
                    $trx->save();
    
                    $bank->saldo = $bank->saldo - $amount_trx;
                    $bank->save();
                }

                $cek2 = corr::all()->count();
                if($cek2 == 0){
                    $corr_trx_bonus = "CORR/".date('Y/m/d')."/1";
                }else{
                    $corr_trx_bonus = "CORR/".date('Y/m/d')."/".($cek2+1);
                }
    
                $corr_bonus = new corr;
                $corr_bonus->corr_trx_num = $corr_trx_bonus;
                $corr_bonus->trx_type = "Bonus";
                $corr_bonus->trx_detail = $bonus->trx_detail;
                $corr_bonus->trx_source = $bonus->trx_number;
                $corr_bonus->old_amount = 0;
                $corr_bonus->old_bonus = $bonus->amount;
                $corr_bonus->new_amount = 0 ;
                $corr_bonus->new_bonus = $request->new_bonus;
                $corr_bonus->submitter_id = $trx->submitter_id;
                $corr_bonus->submitter_name = $trx->submitter_name;
                $corr_bonus->corrector_id = auth::user()->id;
                $corr_bonus->corrector_name= auth::user()->name;;
                $corr_bonus->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." Input Correction for transaction Bonus with transaction number ".$bank->trx_numbe." corrected amount to ".$request->new_bonus." from ".$bank->amount;
                $log->save();
    
                if($request->new_bonus > $bonus->amount){
                    $amount_bonus = $request->new_bonus - $bonus->amount;
    
                    $trx_corr_bonus = new trx;
                    $trx_corr_bonus->submitter_id = auth::user()->id;
                    $trx_corr_bonus->submitter_name = auth::user()->name;
                    $trx_corr_bonus->trx_type = "Correction";
                    $trx_corr_bonus->trx_detail = "Bonus";
                    $trx_corr_bonus->trx_number = $corr_trx_bonus;
                    $trx_corr_bonus->trx_source = $bonus->trx_number;
                    $trx_corr_bonus->user_name = $bonus->user_name;
                    $trx_corr_bonus->bank_name = $bonus->bank_name;
                    $trx_corr_bonus->acc_no = $bonus->acc_no;
                    $trx_corr_bonus->holder_name = $bonus->holder_name;
                    $trx_corr_bonus->website_name = $bonus->website_name;
                    $trx_corr_bonus->amount = $amount_bonus;
                    $trx_corr_bonus->old_web_coin = $website->init_coin - $amount_trx;
                    $trx_corr_bonus->new_web_coin = $website->init_coin - $amount_trx - $amount_bonus;
                    $trx_corr_bonus->old_bank_balance = 0;
                    $trx_corr_bonus->new_bank_balance = 0;
                    $trx_corr_bonus->note = "Correction Bonus";
                    $trx_corr_bonus->save();
    
                    $bonus->note = "Correction Bonus";
                    $bonus->save();
    
                    $website->init_coin =  $website->init_coin - $amount_trx - $amount_bonus;
                    $website->save();
                } else {
                    $amount_bonus = $bonus->amount - $request->new_bonus;
    
                    $trx_corr_bonus = new trx;
                    $trx_corr_bonus->submitter_id = auth::user()->id;
                    $trx_corr_bonus->submitter_name = auth::user()->name;
                    $trx_corr_bonus->trx_type = "Correction";
                    $trx_corr_bonus->trx_detail = "Bonus";
                    $trx_corr_bonus->trx_number = $corr_trx_bonus;
                    $trx_corr_bonus->trx_source = $bonus->trx_number;
                    $trx_corr_bonus->user_name = $bonus->user_name;
                    $trx_corr_bonus->bank_name = $bonus->bank_name;
                    $trx_corr_bonus->acc_no = $bonus->acc_no;
                    $trx_corr_bonus->holder_name = $bonus->holder_name;
                    $trx_corr_bonus->website_name = $bonus->website_name;
                    $trx_corr_bonus->amount = $amount_bonus;
                    $trx_corr_bonus->old_web_coin = $website->init_coin + $amount_trx;
                    $trx_corr_bonus->new_web_coin = $website->init_coin + $amount_trx + $amount_bonus;
                    $trx_corr_bonus->old_bank_balance = 0;
                    $trx_corr_bonus->new_bank_balance = 0;
                    $trx_corr_bonus->note = "Correction Bonus";
                    $trx_corr_bonus->save();
    
                    $bonus->note = "Correction Bonus";
                    $bonus->save();
    
                    $website->init_coin =  $website->init_coin + $amount_trx + $amount_bonus;
                    $website->save();
                }
    
            }else{
    
                $corr = new corr;
                $corr->corr_trx_num = $corr_trx_name;
                $corr->trx_type = "Deposit";
                $corr->trx_detail = $trx->trx_detail;
                $corr->trx_source = $trx->trx_number;
                $corr->old_amount = $trx->amount;
                $corr->old_bonus = 0;
                $corr->new_amount = $request->new_amount;
                $corr->new_bonus = 0;
                $corr->submitter_id = $trx->submitter_id;
                $corr->submitter_name = $trx->submitter_name;
                $corr->corrector_id = auth::user()->id;
                $corr->corrector_name = auth::user()->name;
                $corr->save();                
    
                if($request->new_amount > $trx->amount){
                    $amount_trx = $request->new_amount - $trx->amount;
    
                    $trx_corr = new trx;
                    $trx_corr->submitter_id = auth::user()->id;
                    $trx_corr->submitter_name = auth::user()->name;
                    $trx_corr->trx_type = "Correction";
                    $trx_corr->trx_detail = "Deposit";
                    $trx_corr->trx_number = $corr_trx_name;
                    $trx_corr->trx_source = $trx->trx_number;
                    $trx_corr->user_name = $trx->user_name;
                    $trx_corr->bank_name = $trx->bank_name;
                    $trx_corr->acc_no = $trx->acc_no;
                    $trx_corr->holder_name = $trx->holder_name;
                    $trx_corr->website_name = $trx->website_name;
                    $trx_corr->amount = $amount_trx;
                    $trx_corr->old_web_coin = $website->init_coin;
                    $trx_corr->new_web_coin = $website->init_coin - $amount_trx;
                    $trx_corr->old_bank_balance = $bank->saldo;
                    $trx_corr->new_bank_balance = $bank->saldo + $amount_trx;
                    $trx_corr->note = "Correction Deposit";
                    $trx_corr->save();
    
                    $trx->note = "Correction Deposit";
                    $trx->save();
    
                    $bank->saldo = $bank->saldo + $amount_trx;
                    $bank->save();
    
                    $website->init_coin = $website->init_coin - $amount_trx;
                    $website->save();
                    
                } else {
                    $amount_trx = $trx->amount - $request->new_amount;
    
                    $trx_corr = new trx;
                    $trx_corr->submitter_id = auth::user()->id;
                    $trx_corr->submitter_name = auth::user()->name;
                    $trx_corr->trx_type = "Correction";
                    $trx_corr->trx_detail = "Deposit";
                    $trx_corr->trx_number = $corr_trx_name;
                    $trx_corr->trx_source = $trx->trx_number;
                    $trx_corr->user_name = $trx->user_name;
                    $trx_corr->bank_name = $trx->bank_name;
                    $trx_corr->acc_no = $trx->acc_no;
                    $trx_corr->holder_name = $trx->holder_name;
                    $trx_corr->website_name = $trx->website_name;
                    $trx_corr->amount = $amount_trx;
                    $trx_corr->old_web_coin = $website->init_coin;
                    $trx_corr->new_web_coin = $website->init_coin + $amount_trx;
                    $trx_corr->old_bank_balance = $bank->saldo;
                    $trx_corr->new_bank_balance = $bank->saldo - $amount_trx;
                    $trx_corr->note = "Correction Deposit";
                    $trx_corr->save();
    
                    $trx->note = "Correction Deposit";
                    $trx->save();
    
                    $bank->saldo = $bank->saldo - $amount_trx;
                    $bank->save();
    
                    $website->init_coin = $website->init_coin + $amount_trx;
                    $website->save();
                }
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." Input Correction for transaction Deposit with transaction number ".$trx->trx_number." corrected amount to ".$request->new_amount." from ".$trx->amount;
                $log->save();
            }
    
        } else {
    
            $corr = new corr;
            $corr->corr_trx_num = $corr_trx_name;
            $corr->trx_type = "Withdrawal";
            $corr->trx_detail = $trx->trx_detail;
            $corr->trx_source = $trx->trx_number;
            $corr->old_amount = $trx->amount;
            $corr->old_bonus = 0;
            $corr->new_amount = $request->new_amount;
            $corr->new_bonus = 0;
            $corr->submitter_id = $trx->submitter_id;
            $corr->submitter_name = $trx->submitter_name;
            $corr->corrector_id = auth::user()->id;
            $corr->corrector_name = auth::user()->name;
            $corr->save();
    
            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." Input Correction for transaction Deposit with transaction number ".$trx->trx_number." corrected amount to ".$request->new_amount." from ".$trx->amount;
            $log->save();
            
    
            if($request->new_amount > $trx->amount){
                $amount_trx = $request->new_amount - $trx->amount;
    
                $trx_corr = new trx;
                $trx_corr->submitter_id = auth::user()->id;
                $trx_corr->submitter_name = auth::user()->name;
                $trx_corr->trx_type = "Correction";
                $trx_corr->trx_detail = "Withdrawal";
                $trx_corr->trx_number = $corr_trx_name;
                $trx_corr->trx_source = $trx->trx_number;
                $trx_corr->user_name = $trx->user_name;
                $trx_corr->bank_name = $trx->bank_name;
                $trx_corr->acc_no = $trx->acc_no;
                $trx_corr->holder_name = $trx->holder_name;
                $trx_corr->website_name = $trx->website_name;
                $trx_corr->amount = $amount_trx;
                $trx_corr->old_web_coin = $website->init_coin;
                $trx_corr->new_web_coin = $website->init_coin + $amount_trx;
                $trx_corr->old_bank_balance = $bank->saldo;
                $trx_corr->new_bank_balance = $bank->saldo - $amount_trx;
                $trx_corr->note = "Correction Withdrawal";
                $trx_corr->save();
    
                $trx->note = "Correction Withdrawal";
                $trx->save();
    
                $bank->saldo = $bank->saldo - $amount_trx;
                $bank->save();
    
                $website->init_coin = $website->init_coin + $amount_trx;
                $website->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." Input Correction for transaction Withdrawal with transaction number ".$trx->trx_number." corrected amount to ".$request->new_amount." from ".$trx->amount;
                $log->save();
            } else {
                $amount_trx = $trx->amount - $request->new_amount;
    
                $trx_corr = new trx;
                $trx_corr->submitter_id = auth::user()->id;
                $trx_corr->submitter_name = auth::user()->name;
                $trx_corr->trx_type = "Correction";
                $trx_corr->trx_detail = "Withdrawal";
                $trx_corr->trx_number = $corr_trx_name;
                $trx_corr->trx_source = $trx->trx_number;
                $trx_corr->user_name = $trx->user_name;
                $trx_corr->bank_name = $trx->bank_name;
                $trx_corr->acc_no = $trx->acc_no;
                $trx_corr->holder_name = $trx->holder_name;
                $trx_corr->website_name = $trx->website_name;
                $trx_corr->amount = $amount_trx;
                $trx_corr->old_web_coin = $website->init_coin;
                $trx_corr->new_web_coin = $website->init_coin - $amount_trx;
                $trx_corr->old_bank_balance = $bank->saldo;
                $trx_corr->new_bank_balance = $bank->saldo + $amount_trx;
                $trx_corr->note = "Correction Withdrawal";
                $trx_corr->save();
    
                $trx->note = "Correction Withdrawal";
                $trx->save();
    
                $bank->saldo = $bank->saldo + $amount_trx;
                $bank->save();
    
                $website->init_coin = $website->init_coin = $amount_trx;
                $website->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." Input Correction for transaction Withdrawal with transaction number ".$trx->trx_number." corrected amount to ".$request->new_amount." from ".$trx->amount;
                $log->save();
            }
        }
        return response()->json(["message"=>"success"]);
    }
}
