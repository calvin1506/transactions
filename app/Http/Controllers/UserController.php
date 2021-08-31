<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\activity_log as log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{

    //Leader
    public function getleader(){
        $leaders = user::where('role', 'Leader')->get();
        return response()->json(["message"=>"success", "data"=>$leaders]);
    }
    public function addleader(Request $request){
        // dd($request);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6', 
        ]);

        if($validator->passes()){
            $leadeer = new user;
            $leadeer->role = "Leader";
            $leadeer->leader_id = auth::user()->id;
            $leadeer->leader_name = auth::user()->name;
            $leadeer->name = $request->name;
            $leadeer->email = $request->email;
            $leadeer->password = Hash::make($request->password);
            $leadeer->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new Leader: ".$request->name;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }else{
            $cek = user::where('email', $request->email)->count();
            if($cek>0){
                return response()->json(["message"=>"error", "data"=>"Duplicate Leader!"]);
            }
        }

    }
    public function getleaderedit(Request $request){
        $data = user::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$data]);
    }
    public function leadereditprocess(Request $request){
        $leader_edit = user::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit Leader Name from: ".$leader_edit->name." to ".$request->name." and email from: ".$leader_edit->email." to ".$request->email;
        $log->save();

        $leader_edit->name = $request->name;
        $leader_edit->email = $request->email;
        $leader_edit->save();

        return response()->json(["message"=>"success"]);
    }
    public function deleteleader(Request $request){
        $user = user::where('id', $request->id)->first();
        $user->delete();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." delete Leader: ".$user->name;
        $log->save();
        return response()->json(["message"=>"success"]);
    }


    //Operator
    public function getoperator(){
        $ops = user::where('role', 'Operator')->get();
        return response()->json(["message"=>"success", "data"=>$ops]);
    }
    public function addoperator(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6', 
        ]);

        if($validator->passes()){
            $ops = new user;
            $ops->role = "Operator";
            $ops->leader_id = auth::user()->id;
            $ops->leader_name = auth::user()->name;
            $ops->name = $request->name;
            $ops->email = $request->email;
            $ops->password = Hash::make($request->password);
            $ops->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new Operator: ".$request->name;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }else{
            $cek = user::where('email', $request->email)->count();
            if($cek>0){
                return response()->json(["message"=>"error", "data"=>"Duplicate Operator!"]);
            }
        }
    }
    public function getoperatoredit(Request $request){
        $data = user::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$data]);
    }
    public function operatoreditprocess(Request $request){
        $operator_edit = user::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit operator Name from: ".$operator_edit->name." to ".$request->name." and email from: ".$operator_edit->email." to ".$request->email;
        $log->save();

        $operator_edit->name = $request->name;
        $operator_edit->email = $request->email;
        $operator_edit->save();

        return response()->json(["message"=>"success"]);
    }
    public function deleteoperator(Request $request){
        $user = user::where('id', $request->id)->first();
        $user->delete();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." delete operator: ".$user->name;
        $log->save();
        return response()->json(["message"=>"success"]);
    }



    //customer
    public function getcust(){
        $cust = user::where('role', 'customer')->get();
        return response()->json(["message"=>"success", "data"=>$cust]);
    }
    public function addcust(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:6', 
        ]);

        if($validator->passes()){
            $ops = new user;
            $ops->role = "Customer";
            $ops->leader_id = auth::user()->id;
            $ops->leader_name = auth::user()->name;
            $ops->name = $request->name;
            $ops->email = $request->email;
            $ops->password = Hash::make($request->password);
            $ops->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new customer: ".$request->name;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }else{
            $cek = user::where('email', $request->email)->count();
            if($cek>0){
                return response()->json(["message"=>"error", "data"=>"Duplicate Customer!"]);
            }
        }
    }
    public function getcustedit(Request $request){
        $data = user::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$data]);
    }
    public function customereditprocess(Request $request){
        $customer_edit = user::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit customer Name from: ".$customer_edit->name." to ".$request->name." and email from: ".$customer_edit->email." to ".$request->email;
        $log->save();

        $customer_edit->name = $request->name;
        $customer_edit->email = $request->email;
        $customer_edit->save();

        return response()->json(["message"=>"success"]);
    }
    public function deletecustomer(Request $request){
        $user = user::where('id', $request->id)->first();
        $user->delete();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." delete customer: ".$user->name;
        $log->save();
        return response()->json(["message"=>"success"]);
    }
}
