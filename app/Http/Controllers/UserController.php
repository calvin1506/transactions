<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\website;
use App\Customer;
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
            'username' => 'required', 
            'pass_app' => 'required', 
        ]);

        if($validator->passes()){
            $leadeer = new user;
            $leadeer->role = "Leader";
            $leadeer->leader_id = auth::user()->id;
            $leadeer->leader_name = auth::user()->name;
            $leadeer->name = $request->name;
            $leadeer->email = $request->email;
            $leadeer->password = Hash::make($request->password);
            $leadeer->username = $request->username;
            $leadeer->password_apps = $request->pass_app;
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
            }else if(empty($request->name)){
                return response()->json(["message"=>"error", "data"=>"Leader Name cannot empty!"]);
            }else if(empty($request->email)){
                return response()->json(["message"=>"error", "data"=>"Leader Email cannot empty!"]);
            }else if(empty($request->password)){
                return response()->json(["message"=>"error", "data"=>"Leader Password cannot empty!"]);
            }else if(empty($request->username)){
                return response()->json(["message"=>"error", "data"=>"Leader Username cannot empty!"]);
            }else if(empty($request->password_apps)){
                return response()->json(["message"=>"error", "data"=>"Leader Password Apps cannot empty!"]);
            }
        }

    }
    public function getleaderedit(Request $request){
        $data = user::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$data]);
    }
    public function leadereditprocess(Request $request){
        // dd($request);
        if(empty($request->name)){
            return response()->json(["message"=>"error", "data"=>"Leader Name cannot empty!"]);
        }else if(empty($request->email)){
            return response()->json(["message"=>"error", "data"=>"Leader Email cannot empty!"]);
        }else if(empty($request->password)){
            return response()->json(["message"=>"error", "data"=>"Leader Password cannot empty!"]);
        }else if(empty($request->username)){
            return response()->json(["message"=>"error", "data"=>"Leader Username cannot empty!"]);
        }else if(empty($request->password_apps)){
            return response()->json(["message"=>"error", "data"=>"Leader Password Apps cannot empty!"]);
        }
        $leader_edit = user::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit Leader Name from: ".$leader_edit->name." to ".$request->name." and email from: ".$leader_edit->email." to ".$request->email;
        $log->save();

        $leader_edit->name = $request->name;
        $leader_edit->email = $request->email;
        $leader_edit->username = $request->username;
        $leader_edit->password_apps = $request->pass_app;
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
            'username' => 'required', 
            'pass_app' => 'required', 
        ]);

        if($validator->passes()){
            $ops = new user;
            $ops->role = "Operator";
            $ops->leader_id = auth::user()->id;
            $ops->leader_name = auth::user()->name;
            $ops->name = $request->name;
            $ops->email = $request->email;
            $ops->password = Hash::make($request->password);
            $ops->username = $request->username;
            $ops->password_apps = $request->pass_app;
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
            }else if(empty($request->name)){
                return response()->json(["message"=>"error", "data"=>"Operator Name cannot empty!"]);
            }else if(empty($request->email)){
                return response()->json(["message"=>"error", "data"=>"Operator Email cannot empty!"]);
            }else if(empty($request->password)){
                return response()->json(["message"=>"error", "data"=>"Operator Password cannot empty!"]);
            }else if(empty($request->username)){
                return response()->json(["message"=>"error", "data"=>"Operator Username cannot empty!"]);
            }else if(empty($request->password_apps)){
                return response()->json(["message"=>"error", "data"=>"Operator Password Apps cannot empty!"]);
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
        $operator_edit->username = $request->username;
        $operator_edit->password_apps = $request->pass_app;
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
        $cust = customer::all();
        return response()->json(["message"=>"success", "data"=>$cust]);
    }
    public function addcust(Request $request){
        // dd($request);
        if (empty($request->user_data)) {
            return response()->json(["message"=>"error", "data"=>"User Data cannot empty!"]);
        } else {
            $explode = explode('	',$request->user_data);

            $username = str_replace('No Name','',str_replace('Locked ', '',$explode[1]));
            $referal = $explode[2];
            $bank = $explode[3];
            $balance = $explode[4];
            $tanggalGabung = $explode[5];
            $telepon = $explode[6];
            $email = $explode[7];
    
            $ops = new customer;
            $ops->user_id = $username;
            $ops->referral = $referal;
            $ops->bank = $bank;
            $ops->balance = $balance;
            $ops->tanggal_gabung = $tanggalGabung;
            $ops->telepon = $telepon;
            $ops->email = $email;
            $ops->website = $request->web;
            $ops->save();
    
            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new customer: ".$username;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }
    }
    public function getcustedit(Request $request){
        $data = customer::where('id', $request->id)->get();
        $arr_web = array();
        $webs = website::all();
        $cek_web = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->website));
        for($i=0; $i < count($webs); $i++){
            $arr_web[$i]["id"] = $webs[$i]->id;
            $arr_web[$i]["website_name"] = $webs[$i]->web_name;
        }
        return response()->json(["message"=>"success", "data"=>$data, "webs"=>$arr_web, "cek"=>$cek_web]);
    }
    public function customereditprocess(Request $request){
        $customer_edit = customer::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name.
        " edit customer User ID from: ".$customer_edit->user_id." to ".$request->user_id.
        ", name from: ".$customer_edit->name." to ".$request->name.
        ", address from: ".$customer_edit->name." to ".$request->address.
        ", email from: ".$customer_edit->email." to ".$request->email.
        ", phone from: ".$customer_edit->phone." to ".$request->phone.
        ", note from: ".$customer_edit->note." to ".$request->note.
        ", bank_name: ".$customer_edit->bank_name." to ".$request->bank_name.
        ", account number from: ".$customer_edit->acc_no." to ".$request->acc_no.
        ", account holder from: ".$customer_edit->acc_holder." to ".$request->holder_name;


        $customer_edit->user_id = $request->user_id;
        $customer_edit->name = $request->name;
        $customer_edit->address = $request->address;
        $customer_edit->email = $request->email;
        $customer_edit->phone = $request->phone;
        $customer_edit->note = $request->note;
        $customer_edit->bank_name = $request->bank_name;
        $customer_edit->acc_no = $request->acc_no;
        $customer_edit->acc_holder = $request->holder_name;
        $customer_edit->website = $request->web;

        $log->save();
        $customer_edit->save();

        return response()->json(["message"=>"success"]);
    }
    public function deletecustomer(Request $request){
        $user = customer::where('id', $request->id)->first();
        $user->delete();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." delete customer: ".$user->name;
        $log->save();
        return response()->json(["message"=>"success"]);
    }
}
