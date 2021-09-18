<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/web/get', 'WebController@getweb')->name('get_web');
Route::post('/web/getedit', 'WebController@getwebedit')->name('get_web_edit');
Route::post('/web/editprocess', 'WebController@webeditprocess')->name('web_edit_process');
Route::post('/web/add', 'WebController@addweb')->name('add_web');
Route::post('/web/delete', 'WebController@deleteweb')->name('delete_web');

Route::post('/leader/get', 'UserController@getleader')->name('get_leader');
Route::post('/leader/add', 'UserController@addleader')->name('add_leader');
Route::post('/leader/getedit', 'UserController@getleaderedit')->name('get_leader_edit');
Route::post('/leader/editprocess', 'UserController@leadereditprocess')->name('leader_edit_process');
Route::post('/leader/delete', 'UserController@deleteleader')->name('delete_leader');

Route::post('/operator/get', 'UserController@getoperator')->name('get_operator');
Route::post('/operator/add', 'UserController@addoperator')->name('add_operator');
Route::post('/operator/getedit', 'UserController@getoperatoredit')->name('get_operator_edit');
Route::post('/operator/editprocess', 'UserController@operatoreditprocess')->name('operator_edit_process');
Route::post('/operator/delete', 'UserController@deleteoperator')->name('delete_operator');

Route::post('/cust/get', 'UserController@getcust')->name('get_cust');
Route::post('/cust/add', 'UserController@addcust')->name('add_cust');
Route::post('/cust/getedit', 'UserController@getcustedit')->name('get_cust_edit');
Route::post('/cust/editprocess', 'UserController@customereditprocess')->name('customer_edit_process');
Route::post('/cust/delete', 'UserController@deletecustomer')->name('delete_customer');

Route::post('/bank/get', 'BankController@getbank')->name('get_bank');
Route::post('/bank/get/bankmaster', 'BankController@getbankmasterdata')->name('get_bank_master_data');
Route::post('/bank/add', 'BankController@addbank')->name('add_bank');
Route::post('/bank/getedit', 'BankController@getbankedit')->name('get_bank_edit');
Route::post('/bank/editprocess', 'BankController@bankeditprocess')->name('bank_edit_process');
Route::post('/bank/delete', 'BankController@deletebank')->name('delete_bank');
Route::post('/bank/get/master', 'BankController@getbankmaster')->name('get_bank_master');
Route::post('/bank/add/master', 'BankController@addbankmaster')->name('add_bank_master');
Route::post('/bank/add/master/edit', 'BankController@getbankmasteredit')->name('get_bank_master_edit');
Route::post('/bank/add/master/edit/process', 'BankController@getbankmastereditprocess')->name('get_bank_master_edit_process');
Route::post('/bank/add/master/delete', 'BankController@bankmasterdelete')->name('bank_master_delete');

Route::post('/assign/get', 'AssignController@getdata')->name('get_data');
Route::post('/assign/getdata', 'AssignController@getdataedit')->name('get_data_edit');
Route::post('/assign/process', 'AssignController@dataprocess')->name('process_data');

Route::post('/assign/getweb', 'AssignController@getdataweb')->name('get_data_web');
Route::post('/assign/getdataweb', 'AssignController@getdataeditweb')->name('get_data_edit_web');
Route::post('/assign/processweb', 'AssignController@dataprocessweb')->name('process_data_web');

Route::post('/transaction/getdata', 'TransactionController@getdata')->name('get_data_trx');
Route::post('/transaction/getbankdetail', 'TransactionController@getbankdetail')->name('get_bank_detail');
Route::post('/transaction/getdatabank', 'TransactionController@getdatabank')->name('get_data_bank');
Route::post('/transaction/getpersenbonus', 'TransactionController@getpersenbonus')->name('get_persen_bonus');
Route::post('/transaction/process', 'TransactionController@process')->name('trx_process');
Route::post('/transaction/getdata/adddeductcoin', 'TransactionController@getdataadddeductcoin')->name('get_data_add_deduct_coin');
Route::post('/transaction/getdata/adddeductcoindetail', 'TransactionController@getdataadddeductcoindetail')->name('get_data_add_deduct_coin_detail');
Route::post('/transaction/addcoinprocess', 'TransactionController@addcoinprocess')->name('add_coin_process');
Route::post('/transaction/deductcoinprocess', 'TransactionController@deductcoinprocess')->name('deduct_coin_process');
Route::post('/transaction/getdata/adddeductbalance', 'TransactionController@getdataadddeductbalance')->name('get_data_add_deduct_balance');
Route::post('/transaction/getdata/adddeductbalancedetail', 'TransactionController@getdataadddeductbalancedetail')->name('get_data_add_deduct_balance_detail');
Route::post('/transaction/addbalanceprocess', 'TransactionController@addbalanceprocess')->name('add_balance_process');
Route::post('/transaction/deductbalanceprocess', 'TransactionController@deductbalanceprocess')->name('deduct_balance_process');
Route::post('/transaction/getdatacorr', 'TransactionController@getdatacorr')->name('get_data_corr');
Route::post('/transaction/getdatacorrdetail', 'TransactionController@getdatacorrdetail')->name('get_data_corr_detail');
Route::post('/transaction/corrprocess', 'TransactionController@corrprocess')->name('corr_process');


Route::post('/pending/getdata', 'PendingController@getdatabank')->name('get_data_pending_bank');
Route::post('/pending/getdatapending', 'PendingController@getdatapending')->name('get_data_pending');
Route::post('/pending/process', 'PendingController@pendingprocess')->name('pending_process');
Route::post('/pending/getdatadepowd', 'PendingController@getdatapendingdepowd')->name('get_data_pending_depowd');
Route::post('/pending/getdatacost', 'PendingController@getdatapendingcost')->name('get_data_pending_cost');
Route::post('/pending/pendingdepowdprocess', 'PendingController@pendingdepowdprocess')->name('pending_depowd_process');
Route::post('/pending/costprocess', 'PendingController@costprocess')->name('cost_process');

Route::post('/cashback/get', 'CashbackController@getcashback')->name('get_cashback');
Route::post('/cashback/getdata', 'CashbackController@getdatacashback')->name('get_data_cashback');
Route::post('/cashback/getdatadetail', 'CashbackController@getdatacashbackdetail')->name('get_data_cashback_detail');
Route::post('/cashback/singlecashbackprocess', 'CashbackController@singlecashbackprocess')->name('single_cashback_process');
Route::post('/cashback/multicashbackprocess', 'CashbackController@multicashbackprocess')->name('multi_cashback_process');

Route::get('/report/{type}', 'ReportController@reportweb')->name('report_web');
Route::post('/report/process', 'ReportController@reportprocess')->name('report_process');
// Route::post('/report', 'ReportController@getwebreport')->name('get_web_report');
// Route::post('/report/get', 'ReportController@reportgetdetaii')->name('report_get_detail');