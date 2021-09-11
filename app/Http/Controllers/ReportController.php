<?php

namespace App\Http\Controllers;

use Auth;
use App\bank;
use App\User;
use App\website as web;
use App\Customer;
use App\transaction as trx;
use App\activity_log as log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function getwebreport(){
        $webs = web::all();
        return response()->json(["message"=>"success","data"=>$webs]);
    }

    public function reportgetdetaii (Request $request){
        // dd($request);
        $data = web::where('id', $request->id)->get();
        return response()->json(["message"=>"success","data"=>$data]);
    }

    public function reportweb($type){
        // dd($type);
        $type_report = $type;
        if ($type == "Website") {
            if (auth::user()->role == "superadmin") {
                $data = web::all();
            } else if(auth::user()->role == "Leader"){
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                        array_push($arr_web, $web->id);
                    }
                }
                $data = web::whereIn('id', $arr_web)->get();
            }else{
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                        array_push($arr_web, $web->id);
                    }
                }
                $data = web::whereIn('id', $arr_web)->get(); 
            }
        } else if ($type == "Bank") {
            $data = bank::all();
        } else {
            $data = customer::all();
        }
        
        return view('report',["type"=>$type_report,"data"=>$data]);
    }

    public function reportprocess(Request $request){
        $timeFrom = date('Y-m-d', strtotime(substr($request->time,0,10)))." 00:00:00";
        $timeTo = date('Y-m-d', strtotime(substr($request->time,-10)))." 23:59:59";
        $perFrom = date('d-m-Y', strtotime(substr($request->time,0,10)));
        $perTo = date('d-m-Y', strtotime(substr($request->time,-10)));
        $period = $perFrom." - ".$perTo;

        if ($request->type == "Website") {
            $web = web::where('id', $request->id)->get();
            $data = trx::where('website_name', $web[0]->web_name)
                   ->where('updated_at', '>=', $timeFrom)
                   ->where('updated_at','<=',$timeTo)
                   ->orderBy('created_at', 'ASC')->get();
            // dd($data);
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "webs"=>$web, "data"=>$data]);
        } else if($request->type == "Bank"){
            $bank = bank::where('id', $request->id)->get();
            $data = trx::where('bank_name', $bank[0]->bank_name)
            ->where('updated_at', '>=', $timeFrom)
            ->where('updated_at','<=',$timeTo)
            ->orderBy('created_at', 'ASC')->get();
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "banks"=>$bank, "data"=>$data]);
        } else {
            $custs = customer::where('id', $request->id)->get();
            $data = trx::where('user_name', $custs[0]->user_id)
            ->where('updated_at', '>=', $timeFrom)
            ->where('updated_at','<=',$timeTo)
            ->orderBy('created_at', 'ASC')->get();
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "custs"=>$custs, "data"=>$data]);
        }
        
    }
}
