<?php

namespace App\Http\Controllers;

use Auth;
use App\website as web;
use App\activity_log as log;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function getweb(){
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

    public function getwebedit(Request $request){
        $web = web::where('id', $request->id)->get();
        return response()->json(["message"=>"success", "data"=>$web]);
    }

    public function webeditprocess(Request $request){

        $web_edit = web::where('id', $request->id)->first();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." edit website: ".$web_edit->web_name." to ".$request->name." and Initial coin from: ".$web_edit->init_coin." to ".$request->coin;
        $log->save();

        $web_edit->web_name = $request->name;
        $web_edit->init_coin = $request->coin;
        $web_edit->persen_new_member = $request->persen_new_member;
        $web_edit->persen_harian = $request->persen_harian;
        $web_edit->save();

        return response()->json(["message"=>"success"]);

    }

    public function addweb(Request $request){

        $cek = web::where('web_name', $request->web_name)->count();
        if ($cek == 0) {
            if ($request->init_coin == 0 || $request->init_coin == "") {
                return response()->json(["message"=>"error", "data"=>"Initial Coins cannot 0 or empty!"]);
            } else if($request->persen_new_member == "" || $request->persen_harian == "") {
                $web = new web;
                $web->web_name = $request->web_name;
                $web->init_coin = $request->init_coin;
                $web->persen_new_member = 0;
                $web->persen_harian = 0;
                $web->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." add new website: ".$request->web_name." with initial coin: ". $request->init_coin;
                $log->save();
    
                return response()->json(["message"=>"success"]);
            } else {
                $web = new web;
                $web->web_name = $request->web_name;
                $web->init_coin = $request->init_coin;
                $web->persen_new_member = $request->persen_new_member;
                $web->persen_harian = $request->persen_harian;
                $web->save();
    
                $log = new log;
                $log->user = auth::user()->name;
                $log->activity = "User: ".auth::user()->name." add new website: ".$request->web_name." with initial coin: ". $request->init_coin." with Bonus New Member: ".$request->persen_new_member." % and Bonus Harian: ".$request->persen_harian." %";
                $log->save();
    
                return response()->json(["message"=>"success"]);
            }
        } else {
            return response()->json(["message"=>"error", "data"=>"Duplicate Web!"]);
        }
        

    }

    public function deleteweb(Request $request){

        $web = web::where('id', $request->id)->first();
        $web->delete();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." delete website: ".$web->web_name;
        $log->save();
        return response()->json(["message"=>"success"]);
    }
}
