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
            if (auth::user()->role == "superadmin") {
                $data = bank::all();
            } else if(auth::user()->role == "Leader"){
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->leader)))){
                        array_push($arr_web,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                    }
                }
                $data = bank::whereIn('id', $arr_web[0])->get();
            }else{
                $webs = web::all();
                $arr_web = array();
                foreach($webs as $web){
                    if(in_array(auth::user()->id, explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->operator)))){
                        array_push($arr_web,explode(",",str_replace(str_split('\\/:*?"<>|[]'), '', $web->bank)));
                    }
                }
                $data = bank::whereIn('id', $arr_web[0])->get(); 
            }
        } else if ($type == "Customer") {
            $data = customer::all();
        } else{
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
        }
        
        return view('report',["type"=>$type_report,"data"=>$data]);
    }

    public function reportprocess(Request $request){
        // dd($request);
        $timeFrom = date('Y-m-d', strtotime(substr($request->time,0,10)))." 00:00:00";
        $timeTo = date('Y-m-d', strtotime(substr($request->time,-10)))." 23:59:59";
        $perFrom = date('d-m-Y', strtotime(substr($request->time,0,10)));
        $perTo = date('d-m-Y', strtotime(substr($request->time,-10)));
        $period = $perFrom." - ".$perTo;

        if ($request->type == "Website") {
            $web = web::where('id', $request->id)->get();
            if ($request->trx == "all") {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->whereIn('trx_type',["deposit", "withdrawal", "Add Coin", "Deduct Coin", "bonus", "Cashback"])
                ->orderBy('created_at', 'DESC')->get();
            } else {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('trx_type',$request->trx)
                ->orderBy('created_at', 'DESC')->get();
            }

            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "webs"=>$web, "data"=>$data]);
        } else if($request->type == "Bank"){
            $bank = bank::where('id', $request->id)->get();
            if ($request->trx == "all") {
                $data = trx::where('acc_no', $bank[0]->acc_no)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->whereIn('trx_type',["deposit", "withdrawal", "Cost", "Add Balance", "Deduct Balance", "bonus"])
                ->orderBy('created_at', 'DESC')->get();
            } else {
                $data = trx::where('acc_no', $bank[0]->acc_no)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('trx_type',$request->trx)
                ->orderBy('created_at', 'DESC')->get();
            }
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "banks"=>$bank, "data"=>$data]);
        } else if($request->type == "Customer") {
            $check = customer::where('user_id', $request->cust)->count();
            if ($check == 0) {
                return response()->json(["message"=>"error","User Not Found!"]);
            } else {
                $custs = customer::where('user_id', $request->cust)->get();
                if ($request->trx == "all") {
                $data = trx::where('user_name', $custs[0]->user_id)
                    ->where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->whereIn('trx_type',["deposit", "withdrawal", "Cashback", "bonus"])
                    ->orderBy('created_at', 'DESC')->get();
                } else {
                $data = trx::where('user_name', $custs[0]->user_id)
                    ->where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('trx_type',$request->trx)
                    ->orderBy('created_at', 'DESC')->get();
                }
                return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "custs"=>$custs, "data"=>$data]);
            }
            

        }else if($request->type == "Cashback"){
            $web = web::where('id', $request->id)->get();
            if ($request->trx == "all") {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->whereIn('trx_type',["bonus", "Bonus", "cashback", "Cashback"])
                ->orderBy('created_at', 'DESC')->get();
            } else {
                $data = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('trx_type',$request->trx)
                ->orderBy('created_at', 'DESC')->get();
            }
            
            return response()->json(["message"=>"success","period"=>$period,"type"=>$request->type, "webs"=>$web, "data"=>$data]);
        } else {
            $temp = array();
            $tempBank = '';
            $web = web::where('id', $request->id)->get();

            $countTransaction = trx::where('website_name', $web[0]->web_name)->where('updated_at', '>=', $timeFrom)->where('updated_at','<=',$timeTo)->count();

            if($countTransaction > 0){
                $bankList = json_decode($web[0]->bank);

                for($j=0;$j<count($bankList);$j++){
                    $getBank = bank::where('id', '=', $bankList[$j])->first();
                    $tempBank .= "'".$getBank->acc_no."',";
                }
                $tempBank = substr($tempBank, 0, strlen($tempBank)-1);

                $transaction = trx::select('acc_no', 'bank_name', 'holder_name')
                ->where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('acc_no', '!=', '-')
                ->groupBy('acc_no', 'bank_name', 'holder_name')
                ->get();

                $i=0;
                $totalSaldoBankAwal = 0;
                $totalSaldoBankAkhir = 0;

                foreach($transaction as $tr){
                    $querySaldoAwal = trx::where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('acc_no', '!=', '-')
                    ->where('acc_no', '=', $tr->acc_no)
                    ->orderBy('created_at', 'asc')
                    ->first();

                    $querySaldoAkhir = trx::where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('acc_no', '=', $tr->acc_no)
                    ->orderBy('created_at', 'desc')
                    ->first();

                    $queryTotalDeposit = trx::where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('acc_no', '=', $tr->acc_no)
                    ->where('trx_type', '=', 'Deposit')
                    ->sum('amount');

                    $queryTotalWithdraw = trx::where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('acc_no', '=', $tr->acc_no)
                    ->where('trx_type', '=', 'Withdrawal')
                    ->sum('amount');

                    $queryTotalPenambahanSaldo= trx::where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('acc_no', '=', $tr->acc_no)
                    ->where('trx_type', '=', 'Add Balance')
                    ->sum('amount');

                    $queryTotalPenguranganSaldo = trx::where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('acc_no', '=', $tr->acc_no)
                    ->where('trx_type', '=', 'Deduct Balance')
                    ->sum('amount');

                    $queryTotalCost= trx::where('updated_at', '>=', $timeFrom)
                    ->where('updated_at','<=',$timeTo)
                    ->where('acc_no', '=', $tr->acc_no)
                    ->where('trx_type', '=', 'Cost')
                    ->sum('amount');


                    $temp[$i]['bankName'] = $tr->bank_name;
                    $temp[$i]['bankAccName'] = $tr->holder_name;
                    $temp[$i]['bankAccNo'] = $tr->acc_no;
                    $temp[$i]['saldoAwal'] = $querySaldoAwal->old_bank_balance;
                    $temp[$i]['saldoAkhir'] = $querySaldoAkhir->new_bank_balance;
                    $temp[$i]['deposit'] = $queryTotalDeposit;
                    $temp[$i]['withdraw'] = $queryTotalWithdraw;
                    $temp[$i]['penambahanSaldo'] = $queryTotalPenambahanSaldo;
                    $temp[$i]['penguranganSaldo'] = $queryTotalPenguranganSaldo;
                    $temp[$i]['cost'] = $queryTotalCost;

                    $totalSaldoBankAwal += $querySaldoAwal->old_bank_balance;
                    $totalSaldoBankAkhir += $querySaldoAkhir->new_bank_balance;
                    $i++;
                }

                $queryCoinAwal = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('old_web_coin', '!=', 0)
                ->orderBy('created_at', 'asc')
                ->first();

                $queryCoinAkhir = trx::where('website_name', $web[0]->web_name)
                ->where('updated_at', '>=', $timeFrom)
                ->where('updated_at','<=',$timeTo)
                ->where('old_web_coin', '!=', 0)
                ->orderBy('created_at', 'desc')
                ->first();

                $koinAwal = $queryCoinAwal->old_web_coin;
                $koinAkhir = $queryCoinAkhir->new_web_coin;

                $jumlahDeposit = trx::where('trx_type', '=', 'Deposit')->where('website_name', $web[0]->web_name)->where('updated_at', '>=', $timeFrom)->where('updated_at','<=',$timeTo)->sum('amount');
                $jumlahWithdraw =  trx::where('trx_type', '=', 'Withdrawal')->where('website_name', $web[0]->web_name)->where('website_name', $web[0]->web_name)->where('updated_at', '>=', $timeFrom)->where('updated_at','<=',$timeTo)->sum('amount');
                $jumlahPenambahanKoin = trx::where('trx_type', '=', 'Add Coin')->where('website_name', $web[0]->web_name)->where('website_name', $web[0]->web_name)->where('updated_at', '>=', $timeFrom)->where('updated_at','<=',$timeTo)->sum('amount');
                $jumlahPengurangKoin =  trx::where('trx_type', '=', 'Deduct Coin')->where('website_name', $web[0]->web_name)->where('website_name', $web[0]->web_name)->where('updated_at', '>=', $timeFrom)->where('updated_at','<=',$timeTo)->sum('amount');
                $jumlahPenambahanSaldo = DB::select("select sum(amount) as total from transactions where trx_type = 'Add Balance' and acc_no in (".$tempBank.") and updated_at >= '".$timeFrom."' and updated_at <= '".$timeTo."'");
                $jumlahPenguranganSaldo =  DB::select("select sum(amount) as total from transactions where trx_type = 'Deduct Balance' and acc_no in (".$tempBank.") and updated_at >= '".$timeFrom."' and updated_at <= '".$timeTo."'");
                $jumlahBonus = trx::where('trx_type', 'Bonus')->where('website_name', $web[0]->web_name)->where('updated_at', '>=', $timeFrom)->where('updated_at','<=',$timeTo)->sum('amount');
                $jumlahCashback = trx::where('trx_type', 'Cashback')->where('website_name', $web[0]->web_name)->where('website_name', $web[0]->web_name)->where('updated_at', '>=', $timeFrom)->where('updated_at','<=',$timeTo)->sum('amount');
                $jumlahCost =   DB::select("select sum(amount) as total from transactions where trx_type = 'Cost' and acc_no in (".$tempBank.") and updated_at >= '".$timeFrom."' and updated_at <= '".$timeTo."'");

                $resultArray = array(
                    "web" => $web[0]->web_name,
                    "period"=>$period,
                    "type"=>$request->type, 
                    "koinAwal" => $koinAwal,
                    "koinAkhir" => $koinAkhir,
                    "totalSaldoBankAwal" => $totalSaldoBankAwal,
                    "totalSaldoBankAkhir" => $totalSaldoBankAkhir,
                    "jumlahDeposit" => $jumlahDeposit,
                    "jumlahWithdraw" => $jumlahWithdraw,
                    "jumlahPenambahanKoin" => $jumlahPenambahanKoin,
                    "jumlahPengurangKoin" => $jumlahPengurangKoin,
                    "jumlahPenambahanSaldo" => $jumlahPenambahanSaldo[0]->total,
                    "jumlahPenguranganSaldo" => $jumlahPenguranganSaldo[0]->total,
                    "jumlahBonus" => $jumlahBonus,
                    "jumlahCashback" => $jumlahCashback,
                    "jumlahCost" => $jumlahCost[0]->total,
                    "detailBank" => $temp
                );


                return response()->json(["message"=>"success", "test"=>$tempBank, "result" => $resultArray]);
            } else {
                return response()->json(["message"=>"failed"]);
            }

            // $data = trx::where('website_name', $web[0]->web_name)
            // ->where('updated_at', '>=', $timeFrom)
            // ->where('updated_at','<=',$timeTo)
            // ->orderBy('created_at', 'ASC')->get();

            // // dd($data);
            // $last = count($data) - 1;
            // // dd($last);
            // for ($i=0; $i < count($data) ; $i++) { 
            //     $Saldo_bank_awal = $data[0]["old_bank_balance"];
            //     // $Saldo_bank_akhir = $data[$last]["new_bank_balance"];
            //     $Saldo_bank_akhir = bank::where('acc_no', $data[0]->acc_no)->get('saldo');
            //     $Saldo_koin_awal = $data[0]["old_web_coin"];
            //     $Saldo_koin_akhir = $data[$last]["new_web_coin"];
            //     $PenambahanKoin = trx::whereIn('trx_type', ['Add Coin', 'Withdrawal'])->sum('amount');
            //     $PenguranganKoin =  trx::whereIn('trx_type', ['Deduct Coin', 'Deposit'])->sum('amount');
            //     $PenambahanSaldo = trx::whereIn('trx_type', ['Add Balance', 'Deposit'])->sum('amount');
            //     $PenguranganSaldo =   trx::whereIn('trx_type', ['Deduct Balance', 'Withdrawal'])->sum('amount');
            //     $Bonus =   trx::where('trx_type', 'Bonus')->sum('amount');
            //     $Cashback =   trx::where('trx_type', 'Cashback')->sum('amount');
            // }
            // // dd($Saldo_bank_awal, $Saldo_bank_akhir, $Saldo_koin_awal, $Saldo_koin_akhir, $PenambahanKoin, $PenguranganKoin, $PenambahanSaldo, $PenguranganSaldo);
            
            // return response()->json(["message"=>"success",
            //                         "period"=>$period,
            //                         "type"=>$request->type, 
            //                         "webs"=>$web, 
            //                         "data"=>$data,
            //                         "Saldo_bank_awal" => $Saldo_bank_awal,
            //                         "Saldo_bank_akhir" =>$Saldo_bank_akhir,
            //                         "Saldo_koin_awal" =>$Saldo_koin_awal,
            //                         "Saldo_koin_akhir" =>$Saldo_koin_akhir,
            //                         "PenambahanKoin" =>$PenambahanKoin,
            //                         "PenguranganKoin" =>$PenguranganKoin,
            //                         "PenambahanSaldo" =>$PenambahanSaldo,
            //                         "PenguranganSaldo" =>$PenguranganSaldo,
            //                         "Bonus" =>$Bonus,
            //                         "Cashback" =>$Cashback
            //                         ]);
        }
    }
}
