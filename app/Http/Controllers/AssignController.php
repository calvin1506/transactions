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
        $data = bank::where('id', $request->id)->get();
        $array_data = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->website));
        $web = website::whereIn('id', $array_data)->get('web_name');
        return response()->json(["message"=>"success","data"=>$web, "bank"=>$data]);
    }
    public function getdataedit(Request $request){
        $webs = website::all();
        $data = bank::where('id', $request->id)->get();
        $cek = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->website));

        return response()->json(["message"=>"success", "webs"=>$webs, "bank"=>$data, "cek"=>$cek]);
    }

    public function dataprocess(Request $request){
        // dd($request->id);
        $banks = array();
        $update_bank = bank::where('id', $request->id)->first();
        // dd($update_bank->id);
        $update_bank->website = json_encode($request->website);
        $update_bank->save();
        array_push($banks, $update_bank->id);
        // dd($banks);
        $webs = array();
        $web = DB::table('websites')
                ->whereIn('id',$request->website)
                ->get();
        if(count($web) >0){
            foreach($web as $w){
                array_push($webs, $w->web_name);
                $update_web = website::where('id', $w->id)->first();
                if ($update_web->bank == "-") {
                    $update_web->bank = json_encode($banks);
                    $update_web->save();
                } else {
                    $cek = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $update_web->bank));
                    if(in_array($request->id, $cek)){
                        dd("sini");
                        // $pos = array_search($request->id, $cek);
                        // unset($cek[$pos]);
                        // dd($cek);
                    }else{
                        $banks = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $update_web->bank));
                        array_push($banks, $update_bank->id);
                        $update_web->bank = json_encode($banks);
                        $update_web->save();
                    }
                    
                }
                
            }
        }

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." assign website: ".json_encode($webs)." to bank: ".$update_bank[0]->bank_name." with account number: ".$update_bank[0]->acc_no;
        $log->save();

        return response()->json(["message"=>"success"]);
    }

    public function getdataweb(Request $request){
        $data = website::where('id', $request->id)->get();
        $array_data_leader = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->leader));
        $array_data_operator = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $data[0]->operator));
        $lead = user::whereIn('id', $array_data_leader)->get('name');
        $op = user::whereIn('id', $array_data_operator)->get('name');
        return response()->json(["message"=>"success","leads"=>$lead, "ops"=>$op, "web"=>$data]);
    }

    public function getdataeditweb(Request $request){
        $data = website::where('id', $request->id)->get();
        $leads = user::where('role', 'Leader')->get();
        $ops = user::where('role', 'Operator')->get();
        $cek_lead = $data[0]->leader;
        $cek_op = $data[0]->operator;
        return response()->json(["message"=>"success", "leads"=>$leads, "ops"=>$ops, "web"=>$data, "cek_lead"=>$cek_lead, "cek_op"=>$cek_op]);
    }

    public function dataprocessweb(Request $request){
        // dd($request);
        $leads = array();
        $ops = array();

        $lead = DB::table('users')
                ->whereIn('id',$request->leaders)
                ->get('name');
        $op = DB::table('users')
                ->whereIn('id',$request->operators)
                ->get('name');

        if(count($lead) >0){
            foreach($lead as $l){
                array_push($leads, $l->name);
            }
        }
        if(count($op) >0){
            foreach($op as $o){
                array_push($ops, $o->name);
            }
        }

        $update_web = website::where('id', $request->id)->first();
        $update_web->leader = json_encode($request->leaders);
        $update_web->operator = json_encode($request->operators);
        $update_web->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." assign Leaders: ".json_encode($leads)." and Operators: ".json_encode($ops)." to website: ".$update_web->web_name;
        $log->save();

        return response()->json(["message"=>"success"]);
    }
}
