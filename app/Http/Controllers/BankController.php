<?php

namespace App\Http\Controllers;

use Auth;
use App\bank as bank;
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
    public function addbank(Request $request){
        // dd($request);
        $validator = Validator::make($request->all(), [
            'bank_name' => 'required',
            'acc_no' => 'required|unique:banks',
            'holder_name' => 'required', 
            'saldo' => 'required', 
            'login_name' => 'required', 
            'login_password' => 'required', 
        ]);

        if($validator->passes()){
            $bank = new bank;
            $bank->bank_name = $request->bank_name;
            $bank->acc_no = $request->acc_no;
            $bank->holder_name = $request->holder_name;
            $bank->saldo = $request->saldo;
            $bank->login_name = $request->login_name;
            $bank->login_password = $request->login_password;
            $bank->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new bank: ".$request->bank_name." ,account number: ".$request->acc_no." , holder name: ".$request->holder_name." ,initial amount: ".$request->saldo;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }else{
            $cek = bank::where('acc_no', $request->acc_no)->count();
            if($cek>0){
                return response()->json(["message"=>"error", "data"=>"Duplicate Bank!"]);
            }
        }
    }
    public function getbankedit(Request $request){
        $data = bank::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$data]);
    }
    public function bankeditprocess(Request $request){
        $bank_edit = bank::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit new bank: ".$request->bank_name." ,account number: ".$request->acc_no." , holder name: ".$request->holder_name." ,initial amount: ".$request->saldo;
        $log->save();

        $bank_edit->bank_name = $request->bank_name;
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
}
