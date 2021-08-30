<?php

namespace App\Http\Controllers;

use Auth;
use App\website as web;
use App\activity_log as log;
use Illuminate\Http\Request;

class WebController extends Controller
{

    public function getweb(){
        $web = web::all();
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
        $web_edit->save();

        return response()->json(["message"=>"success"]);

    }

    public function addweb(Request $request){
        $cek = web::where('web_name', $request->web_name)->count();
        if ($cek == 0) {
            $web = new web;
            $web->web_name = $request->web_name;
            $web->init_coin = $request->init_coin;
            $web->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." add new website: ".$request->web_name." with initial coin: ". $request->init_coin;
            $log->save();

            return response()->json(["message"=>"success"]);
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
