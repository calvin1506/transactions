<?php

namespace App\Http\Controllers;

use Auth;
use App\bank as bank;
use App\bank_master as master;
use App\User;
use App\activity_log as log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BankController extends Controller
{
    public function getbank(){
        $banks = bank::all();
        return response()->json(["message"=>"success", "data"=>$banks]);
    }

    public function getbankmasterdata(){
        $master = master::all();
        return response()->json(["message"=>"success", "data"=>$master]);
    }
    public function addbank(Request $request){

        $cek = bank::where('acc_no', $request->acc_no)->count();
        $bank_master = master::where('id', $request->bank_master_id)->get();

        if($cek>0){
            return response()->json(["message"=>"error", "data"=>"Duplicate Bank!"]);
        } else if ($request->acc_no == ""){
            return response()->json(["message"=>"error", "data"=>"Account Number Cannot empty!"]);
        } else if ($request->holder_name == ""){
            return response()->json(["message"=>"error", "data"=>"Holder Name Cannot empty!"]);
        } else if ($request->saldo == 0 || $request->saldo == ""){
            return response()->json(["message"=>"error", "data"=>"Initial Balance cannot 0 or empty!"]);
        } else if($request->login_name == "") {
            return response()->json(["message"=>"error", "data"=>"Login Name Cannot empty!"]);
        } else if($request->login_password == "") {
            return response()->json(["message"=>"error", "data"=>"Login Password Cannot empty!"]);
        } else {
            $bank = new bank;
            $bank->bank_master_id = $request->bank_master_id;
            $bank->bank_name = $bank_master[0]->bank_master_name;
            $bank->acc_no = $request->acc_no;
            $bank->holder_name = $request->holder_name;
            $bank->saldo = $request->saldo;
            $bank->login_name = $request->login_name;
            $bank->login_password = $request->login_password;
            $bank->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new bank: ".$bank_master[0]->bank_master_name." ,account number: ".$request->acc_no." , holder name: ".$request->holder_name." ,initial amount: ".$request->saldo;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }
    }
    public function getbankedit(Request $request){
        $data = bank::where('id', $request->id)->get();
        $master = master::all();
        return response()->json(["message"=>"success", "data"=>$data, "master"=>$master]);
    }
    public function bankeditprocess(Request $request){

        $bank_master = master::where('id', $request->bank_master_id_edit)->get();
        $bank_edit = bank::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit new bank: ".$request->bank_name." ,account number: ".$request->acc_no." , holder name: ".$request->holder_name." ,initial amount: ".$request->saldo;
        $log->save();

        $bank_edit->bank_master_id = $request->bank_master_id_edit;
        $bank_edit->bank_name = $bank_master[0]->bank_master_name;
        $bank_edit->acc_no = $request->acc_no;
        $bank_edit->holder_name = $request->holder_name;
        $bank_edit->saldo = $request->saldo;
        $bank_edit->login_name = $request->login_name;
        $bank_edit->login_password = $request->login_password;
        $bank_edit->save();

        return response()->json(["message"=>"success"]);
    }

    public function deletebank(Request $request){
        $bank = bank::where('id', $request->id)->first();
        $bank->delete();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." delete bank: ".$bank->name." ,account number: ".$bank->acc_no;
        $log->save();
        return response()->json(["message"=>"success"]);
    }

    public function getbankmaster(){
        $data = master::all();
        return response()->json(["message"=>"success", "data"=>$data]);
    }

    public function addbankmaster(Request $request){
        $validator = Validator::make($request->all(), [
            'bank_master_name' => 'required|unique:bank_masters',
            'bank_master_alias' => 'required|unique:bank_masters'
        ]);

        if($validator->passes()){
            $ops = new master;
            $ops->bank_master_name = $request->bank_master_name;
            $ops->bank_master_alias = $request->bank_master_alias;
            $ops->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new Bank Master: ".$request->bank_master_name." with alias ".$request->bank_master_alias;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }else{
            $cek = master::where('bank_master_name', $request->bank_master_name)->count();
            $cek1 = master::where('bank_master_alias', $request->bank_master_alias)->count();
            if($cek>0 || $cek1){
                return response()->json(["message"=>"error", "data"=>"Duplicate Bank Master!"]);
            }
        }
    }

    public function getbankmasteredit(Request $request){
        $data = master::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$data]);
    }

    public function getbankmastereditprocess(Request $request){
        $bank_edit = master::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit Bank Master: ".$request->bank_master_name." with alias ".$request->bank_master_alias;
        $log->save();

        $bank_edit->bank_master_name = $request->bank_master_name;
        $bank_edit->bank_master_alias = $request->bank_master_alias;
        $bank_edit->save();

        return response()->json(["message"=>"success"]);
    }

    public function bankmasterdelete(Request $request){
        $bank = master::where('id', $request->id)->first();
        $bank->delete();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." delete bank master: ".$bank->bank_master_name;
        $log->save();
        return response()->json(["message"=>"success"]);
    }
}
