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
}
