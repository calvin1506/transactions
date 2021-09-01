<?php

namespace App\Http\Controllers;

use Auth;
use App\bank;
use App\User;
use App\website;
use App\activity_log as log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AssignController extends Controller
{
    public function getdata(Request $request){
        $data = bank::where('id', $request->id)->get('website');
        $array_data = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->website));
        $web = website::whereIn('id', $array_data)->get('web_name');

        return response()->json(["message"=>"success","data"=>$web]);
    }
    public function getdataedit(Request $request){
        $webs = website::all();

        return response()->json(["message"=>"success", "webs"=>$webs]);
    }

    public function dataprocess(Request $request){
        $webs = array();
        $web = DB::table('websites')
                ->whereIn('id',$request->website)
                ->get('web_name');
        if(count($web) >0){
            foreach($web as $w){
                array_push($webs, $w->web_name);
            }
        }

        $update_bank = bank::where('id', $request->id)->first();
        $update_bank->website = json_encode($request->website);
        $update_bank->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." assign website: ".json_encode($webs)." to bank: ".$update_bank->bank_name." with account number: ".$update_bank->acc_no;
        $log->save();

        return response()->json(["message"=>"success"]);
    }
}
