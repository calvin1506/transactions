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
        // dd($request);

        $bank = bank::where('id', $request->id)->first();
        $webs = website::whereIn('id', $request->website)->get();

        $arr_bank = array();
        array_push($arr_bank, $request->id);

        foreach ($webs as $web) {
            $update_web = website::where('id', $web->id)->first();
            if($web->bank == "-"){
                $update_web->bank = json_encode($arr_bank);
                $update_web->save();
            } else {
                $old_web = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $bank->website));
                if ($old_web[0] == "-") {
                    $old_data = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $update_web->bank));
                    array_push($old_data, $request->id);
                    $update_web->bank = json_encode($old_data);
                    $update_web->save();
                } else {
                    $new_web = $request->website;
                    $diff = array_diff($old_web, $new_web);
                    if (count($diff) >0 ) {
                        $new_webs = website::whereIn('id', $diff)->get();
                    
                        foreach ($new_webs as $new ) {
                            $old_bank = explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $new->bank));
                            $update_new_data_bank = website::where('id', $new->id)->first();
                            if(in_array($request->id, $old_bank)){
                                $pos = array_search($request->id, $old_web);
                                unset($old_bank[$pos]);
                                $update_new_data_bank->bank = json_encode(array_values($old_bank));
                                $update_new_data_bank->save();
                            }
                        }
                    }
                }
            }
        }

        $bank->website = json_encode($request->website);
        $bank->save();

        $log = new log;
        $log->user = auth::user()->name;
        $log->activity = "User: ".auth::user()->name." assign website: ".json_encode($webs)." to bank: ".$bank->bank_name." with account number: ".$bank->acc_no;
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

        if (auth::user()->role == "superadmin") {
            $leads = array();
            $lead = DB::table('users')
            ->whereIn('id',$request->leaders)
            ->get('name');
            if(count($lead) >0){
                foreach($lead as $l){
                    array_push($leads, $l->name);
                }
            }
            $update_web = website::where('id', $request->id)->first();
            $update_web->leader = json_encode($request->leaders);
            $update_web->save();

            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." assign Leaders: ".json_encode($leads)." to website: ".$update_web->web_name;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        } else {
            $ops = array();

            $op = DB::table('users')
                    ->whereIn('id',$request->operators)
                    ->get('name');
    
            if(count($op) >0){
                foreach($op as $o){
                    array_push($ops, $o->name);
                }
            }
    
            $update_web = website::where('id', $request->id)->first();
            $update_web->operator = json_encode($request->operators);
            $update_web->save();
    
            $log = new log;
            $log->user = auth::user()->name;
            $log->activity = "User: ".auth::user()->name." assign Operators: ".json_encode($ops)." to website: ".$update_web->web_name;
            $log->save();
    
            return response()->json(["message"=>"success"]);
        }
        

    }
}
