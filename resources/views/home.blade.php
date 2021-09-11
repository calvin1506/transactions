@extends('layouts.app')

@section('content')

<div class="container">

    @if (session('success')) 
    <div class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('success')}}</strong>
    </div>  
    @endif

    @if (session('error')) 
    <div class="alert alert-danger alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>{{session('error')}}</strong>
    </div>  
    @endif
    
    <h5><b>Initial Setup</b></h5>
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row text-center">
                    @if (auth::user()->role == "superadmin" )
                        <div class="col-xl-2">
                            <a href="#modal13" data-toggle="modal" data-target="#modal13" class="small-box-footer modal13">
                                <div class="small-box"
                                    style="background-image: url('{{ asset("img/bank_master.png") }}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Bank Master</h6>
                        </div>
                        <div class="col-xl-2">
                            <a href="#modal5" data-toggle="modal" data-target="#modal5" class="small-box-footer modal5">
                                <div class="small-box"
                                    style="background-image: url('{{ asset("img/icon-bank.png") }}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Banks</h6>
                        </div>
                        <div class="col-xl-2">
                            <a href="#modal1" data-toggle="modal" data-target="#modal1" class="small-box-footer modal1">
                                <div class="small-box "
                                    style="background-image: url('{{ asset("img/web-icon.png") }}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Websites</h6>
                        </div>
                        
                        <div class="col-xl-2">
                            <a href="#modal2" data-toggle="modal" data-target="#modal2" class="small-box-footer modal2">
                                <div class="small-box"
                                    style="background-image: url('{{asset('img/leader.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Leaders</h6>
                        </div>
                    @endif
                    @if (auth::user()->role == "Leader" || auth::user()->role == "Operator")
                        @if (auth::user()->role == "Leader")
                            <div class="col-xl-2">
                                <a href="#modal3" data-toggle="modal" data-target="#modal3" class="small-box-footer modal3">
                                    <div class="small-box"
                                        style="background-image: url('{{asset('img/op.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                    </div>
                                </a>
                                <h6>Operators</h6>
                            </div> 
                        @endif
                        <div class="col-xl-2">
                            <a href="#modal4" data-toggle="modal" data-target="#modal4" class="small-box-footer modal4">
                                <div class="small-box"
                                    style="background-image: url('{{asset('img/customer.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Customers</h6>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if(auth::user()->role == "superadmin" || auth::user()->role == "Leader")
        <h5><b>Assign</b></h5>
        <div class="row">
            <div class="card" style="width: 100%">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-xl-2">
                            <a href="#modal6" data-toggle="modal" data-target="#modal6" class="small-box-footer modal6">
                                <div class="small-box"
                                    style="background-image: url('{{ asset("img/icon-bank.png") }}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Assign Bank to Website</h6>
                        </div>
                        <div class="col-xl-2">
                            <a href="#modal7" data-toggle="modal" data-target="#modal7" class="small-box-footer modal7">
                                <div class="small-box"
                                    style="background-image: url('{{ asset("img/web-icon.png") }}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Assign Leaders/Operators to Websites</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if (auth::user()->role == "Leader" || auth::user()->role == "Operator")
        <h5><b>Transactions</b></h5>
        <div class="row">
            <div class="card" style="width: 100%">
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-xl-2">
                            <a href="#modal8" data-toggle="modal" data-target="#modal8" class="small-box-footer modal8">
                                <div class="small-box"
                                    style="background-image: url('{{asset('img/depo_wd.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Deposit / Withdrawal</h6>
                        </div>
                        <div class="col-xl-2">
                            <a href="#modal9" data-toggle="modal" data-target="#modal9" class="small-box-footer modal9">
                                <div class="small-box"
                                    style="background-image: url('{{asset('img/icon-pending.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Pending Transactions</h6>
                        </div>
                        <div class="col-xl-2">
                            <a href="#modal10" data-toggle="modal" data-target="#modal10" class="small-box-footer modal10">
                                <div class="small-box"
                                    style="background-image: url('{{asset('img/coin.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Add / Deduct Coins</h6>
                        </div>
                        <div class="col-xl-2">
                            <a href="#modal11" data-toggle="modal" data-target="#modal11" class="small-box-footer modal11">
                                <div class="small-box"
                                    style="background-image: url('{{asset('img/cash.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Add / Deduct Balance</h6>
                        </div>
                        <div class="col-xl-2">
                            <a href="#modal12" data-toggle="modal" data-target="#modal12" class="small-box-footer modal12">
                                <div class="small-box"
                                    style="background-image: url('{{asset('img/cashback.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                                </div>
                            </a>
                            <h6>Cashback</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <h5><b>Reporting</b></h5>
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-xl-2">
                        <a href="{{route('report_web', ['type' => 'Website'])}}" target="_blank" class="small-box-footer modal13">
                            <div class="small-box"
                                style="background-image: url('{{asset('img/web-icon.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>Websites Report</h6>
                    </div>
                    <div class="col-xl-2">
                        <a href="{{route('report_web', ['type' => 'Bank'])}}" target="_blank" class="small-box-footer modal13">
                            <div class="small-box"
                                style="background-image: url('{{asset('img/icon-bank.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>Banks Report</h6>
                    </div>
                    <div class="col-xl-2">
                        <a href="{{route('report_web', ['type' => 'Customer'])}}" target="_blank" class="small-box-footer modal13">
                            <div class="small-box"
                                style="background-image: url('{{asset('img/customer.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>User/Customer Report</h6>
                    </div>
                    <div class="col-xl-2">
                        <a href="{{route('report_web', ['type' => 'Cashback'])}}" target="_blank" class="small-box-footer modal13">
                            <div class="small-box"
                                style="background-image: url('{{asset('img/cashback.png')}}');background-size: cover;height: 90px;width: 100px;margin-left:30px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>Cashback/Bonus Report</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




<!-- Modal 1 -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Websites</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewweb">Add New
                            Website</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_web_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Website Name</td>
                                    <td>Initial Coins</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_web">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 2 -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Leaders</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewleader">Add
                            New Leader</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_leader_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Leader Name</td>
                                    <td>Leader Email</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_leader">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 3 -->
<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Operators</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
                            data-target="#modaladdnewoperator">Add New Operator</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_leader_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Operator Name</td>
                                    <td>Operator Email</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_operator">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 4 -->
<div class="modal fade" id="modal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Customers</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary get_bank_add_cust" data-toggle="modal"
                            data-target="#modaladdnewcustomer">Add New Customer</button>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_customer_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Customer Name</td>
                                    <td>Customer Email</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_customer">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 5 -->
<div class="modal fade" id="modal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banks</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary get_bank_master" data-toggle="modal" data-target="#modaladdnewbank">Add
                            New Bank</button>
                    </div>
                </div>
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_bank_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Bank Name</td>
                                    <td>Bank Account Number</td>
                                    <td>Bank Account Holder</td>
                                    <td>Balance</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_bank">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 6 -->
<div class="modal fade" id="modal6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Banks</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_assign_bank_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Bank Name</td>
                                    <td>Bank Account Number</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_assign_bank">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 7 -->
<div class="modal fade" id="modal7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Websites</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_assign_website_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Website Name</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_assign_website">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 8 -->
<div class="modal fade" id="modal8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Websites</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_depo_wd_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Website Name</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_depo_wd">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 9 -->
<div class="modal fade" id="modal9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pending Transactions</h5>
            </div>
            <div class="modal-body">
				<div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary modaladdnewpending" data-toggle="modal" data-target="#modaladdnewpending">Add New Pending Transaction</button>
                    </div>
                </div>
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_pending_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Status</td>
                                    <td>Transaction</td>
                                    <td>Bank Name</td>
                                    <td>Account Number</td>
                                    <td>Amount</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_pending">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 10 -->
<div class="modal fade" id="modal10" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add / Deduct Coins</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_add_deduct_coins_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Website Name</td>
                                    <td>Coins</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_add_deduct_coins">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 11 -->
<div class="modal fade" id="modal11" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add / Deduct Balance</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_add_deduct_balance_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Bank Name</td>
                                    <td>Account Number</td>
                                    <td>Balance</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_add_deduct_balance">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 12 -->
<div class="modal fade" id="modal12" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashback</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary addnewcashback" data-toggle="modal"
                            data-target="#modaladdnewcashback">Submit New Cashback</button>
                    </div>
                </div>
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_cashback_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Transaction Number</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_cashback">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Modal 13 -->
<div class="modal fade" id="modal13" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bank Master</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12 text-right">
                        <button class="btn btn-sm btn-primary addnewbankmaster" data-toggle="modal"
                            data-target="#modaladdnewbankmaster">Add New Bank Master</button>
                    </div>
                </div>
                <div class="row mt-3 table-responsive">
                    <div class="col-md-12">
                        <table class="table table-striped text-center" id="tbl_bank_master_list">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Bank Master Name</td>
                                    <td>Bank Master Alias</td>
                                    <td colspan="2">Actions</td>
                                </tr>
                            </thead>
                            <tbody id="tbl_bank_master">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="reload()">Close</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>



<!-- Modal Delete -->
<div class="modal fade" id="modaldelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
            </div>
            <div class="modal-body">
                <h5>Are you sure want to delete?</h5>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="type_delete" id="type_delete">
                <input type="hidden" name="id_delete" id="id_delete">
                <button type="button" class="btn btn-secondary delete_data_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger delete_data">Delete</button>
            </div>
        </div>
    </div>
</div>



<!-- Modal Add Web -->
<div class="modal fade" id="modaladdnewweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Website</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Website Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="web_name" id="web_name">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Initial Coins</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="init_coin" id="init_coin">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add_web_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_web">Add Website</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Web -->
<div class="modal fade" id="modaleditweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Website</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Website Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="web_name_edit" id="web_name_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Initial Coins</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="init_coin_edit" id="init_coin_edit" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_web_edit" id="id_web_edit">
                <button type="button" class="btn btn-secondary edit_web_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit_web_process">Edit Website</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Add Leader -->
<div class="modal fade" id="modaladdnewleader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Website</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Leader Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="leader_name" id="leader_name">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="leader_email" id="leader_email">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Password</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="password" name="leader_pass" id="leader_pass">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Username Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="leader_username_apps" id="leader_username_apps">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Password Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="leader_pass_pass" id="leader_pass_pass">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add_leader_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_leader">Add Leader</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Leader -->
<div class="modal fade" id="modaleditleader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Leader</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Leader Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="leader_name_edit" id="leader_name_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="leader_email_edit" id="leader_email_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Username Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="leader_username_apps_edit" id="leader_username_apps_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Password Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="leader_pass_pass_edit" id="leader_pass_pass_edit">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_leader_edit" id="id_leader_edit">
                <button type="button" class="btn btn-secondary edit_leader_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit_leader_process">Edit Leader</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Add Operator -->
<div class="modal fade" id="modaladdnewoperator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Operator</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Operator Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="operator_name" id="operator_name">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="operator_email" id="operator_email">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Password</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="password" name="operator_pass" id="operator_pass">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Username Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="operator_username_apps" id="operator_username_apps">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Password Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="operator_pass_pass" id="operator_pass_pass">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add_operator_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_operator">Add Operator</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Operator -->
<div class="modal fade" id="modaleditoperator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Operator</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Operator Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="operator_name_edit" id="operator_name_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="operator_email_edit" id="operator_email_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Username Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="operator_username_apps_edit" id="operator_username_apps_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Password Apps</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="operator_pass_pass_edit" id="operator_pass_pass_edit">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_operator_edit" id="id_operator_edit">
                <button type="button" class="btn btn-secondary edit_operator_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit_operator_process">Edit operator</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Customer -->
<div class="modal fade" id="modaladdnewcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
            </div>
			<div class="modal-body">
				<div class="row mb-1">
					<div class="col-md-2">
						<h6>User ID</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="text" name="customer_user_id" id="customer_user_id">
					</div>
				</div>
				<div class="row mb-1">
					<div class="col-md-2">
						<h6>Customer Name</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="text" name="customer_name" id="customer_name">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-2">
						<h6>Address</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="text" name="customer_address" id="customer_address">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-2">
						<h6>Email</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="email" name="customer_email" id="customer_email">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-2">
						<h6>Phone Number</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="number" name="customer_phone" id="customer_phone">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-2">
						<h6>Notes</h6>
					</div>
					<div class="col-md-10">
						<textarea class="form-control" name="customer_note" id="customer_note" rows="3"></textarea>
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-2">
						<h6>Bank Name</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="text" name="customer_bank_name" id="customer_bank_name">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-2">
						<h6>Account Number</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="number" name="customer_bank_acc_no" id="customer_bank_acc_no">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-2">
						<h6>Account Holder Name</h6>
					</div>
					<div class="col-md-10">
						<input class="form-control" type="text" name="customer_bank_acc_holder" id="customer_bank_acc_holder">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-2">
						Website
					</div>
					<div class="col-md-10">
						<div class="row" id="banks_div_add_customer">

						</div>
					</div>
				</div>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add_customer_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_customer">Add Customer</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Customer -->
<div class="modal fade" id="modaleditcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>User ID</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="user_id_cust_edit" id="user_id_cust_edit">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Customer Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="name_cust_edit" id="name_cust_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Address</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="address_cust_edit" id="address_cust_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Email</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="email" name="email_cust_edit" id="email_cust_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Phone Number</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="phone_cust_edit" id="phone_cust_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Notes</h6>
                    </div>
                    <div class="col-md-10">
                        <textarea class="form-control" name="note_cust_edit" id="note_cust_edit" rows="3"></textarea>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Bank Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="bank_name_cust_edit" id="bank_name_cust_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Account Number</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="number" name="bank_acc_no_cust_edit" id="bank_acc_no_cust_edit">
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-md-2">
                        <h6>Account Holder Name</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="bank_acc_holder_cust_edit" id="bank_acc_holder_cust_edit">
                    </div>
                </div>
				<div class="row mb-2">
					<div class="col-md-2">
						Website
					</div>
					<div class="col-md-10">
						<div class="row" id="banks_div_add_customer_edit">

						</div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_customer_edit" id="id_customer_edit">
                <button type="button" class="btn btn-secondary edit_customer_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit_customer_process">Edit Customer</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Bank -->
<div class="modal fade" id="modaladdnewbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Bank Account</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Bank Name</h6>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" name="bank_master_id" id="bank_master_id"></select>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Bank Account Number</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="acc_no" id="acc_no">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Bank Account Holder</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="holder_name" id="holder_name">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Initial Balance</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="saldo" id="saldo">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Username</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="username_ibank" id="username_ibank">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Password</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="pass_ibank" id="pass_ibank">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add_bank_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary add_bank">Add Bank</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Bank -->
<div class="modal fade" id="modaleditbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
            </div>
            <div class="modal-body">
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Bank Name</h6>
                    </div>
                    <div class="col-md-10">
                        <select class="form-control" name="bank_master_id_edit" id="bank_master_id_edit"></select>
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Bank Account Number</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="acc_no_edit" id="acc_no_edit">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Bank Account Holder</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="holder_name_edit" id="holder_name_edit">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Initial Balance</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="saldo_edit" id="saldo_edit">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Username</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="username_ibank_edit" id="username_ibank_edit">
                    </div>
                </div>
                <div class="row mb-1">
                    <div class="col-md-2">
                        <h6>Password</h6>
                    </div>
                    <div class="col-md-10">
                        <input class="form-control" type="text" name="pass_ibank_edit" id="pass_ibank_edit">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id_bank_edit" id="id_bank_edit">
                <button type="button" class="btn btn-secondary edit_bank_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary edit_bank_process">Edit Bank</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Assign Bank -->
<div class="modal fade" id="modaldetailassignbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bank details</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-6" id="bank_name_detail">

					</div>
					<div class="col-md-6" id="acc_no_detail">

					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-12">
						<h5><b>Assigned to websites:</b></h5>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-12">
						<table class="table table-striped">
							<thead>
								<tr>
									<td>No</td>
									<td>Website</td>
								</tr>
							</thead>
							<tbody id="web_assign">

							</tbody>
						</table>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary assign_bank_close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Assign Bank -->
<div class="modal fade" id="modaleditassignbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bank details</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-6" id="bank_name_detail_edit">

					</div>
					<div class="col-md-6" id="acc_no_detail_edit">

					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Websites
					</div>
					<div class="col-md-8">
						<div id="web_assign_edit"></div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
				<input type="hidden" name="web_id" id="web_id">
                <button type="button" class="btn btn-secondary assign_bank_edit_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary assign_bank_edit_process">Edit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Assign Website -->
<div class="modal fade" id="modaldetailassignwebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Website details</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-12" id="web_name_detail">

					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-12">
						<h5><b>Assigned Leaders:</b></h5>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-12">
						<table class="table table-striped">
							<thead>
								<tr>
									<td>No</td>
									<td>Leader Name</td>
								</tr>
							</thead>
							<tbody id="web_assign_leads">

							</tbody>
						</table>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-12">
						<h5><b>Assigned Operators:</b></h5>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-12">
						<table class="table table-striped">
							<thead>
								<tr>
									<td>No</td>
									<td>Operator Name</td>
								</tr>
							</thead>
							<tbody id="web_assign_ops">

							</tbody>
						</table>
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary assign_bank_close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Assign Website -->
<div class="modal fade" id="modaleditassignwebsite" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Websites detail edit</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-12" id="web_name_detail_edit">

					</div>
				</div>
                @if (auth::user()->role == "superadmin")
                    <div class="row mb-2">
                        <div class="col-md-4">
                            Leaders
                        </div>
                        <div class="col-md-8">
                            <div id="web_assign_edit_leads"></div>
                        </div>
                    </div> 
                @endif

				<div class="row mb-2">
					<div class="col-md-4">
						Operators
					</div>
					<div class="col-md-8">
						<div id="web_assign_edit_ops"></div>
					</div>
				</div>
            </div>
            <div class="modal-footer">
				<input type="hidden" name="web_id" id="web_id">
                <button type="button" class="btn btn-secondary assign_website_edit_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary assign_website_edit_process">Edit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Depo/WD -->
<div class="modal fade" id="modaldepowd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Depo / WD / Bonus</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-12" id="web_name_detail_edit">

					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						User
					</div>
					<div class="col-md-8">
						<form autocomplete="off">
							<div class="autocomplete" style="width:300px;" id="users_div">
							  
							</div>
						</form>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Bank
					</div>
					<div class="col-md-8">
						<div class="row" id="banks_div"></div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Type
					</div>
					<div class="col-md-8">
						<div class="row text-center">
							<div class="col-md-4">
								<label style="background-color: lightblue; border-radius: 10px;width: 80px">
									<div class="form-check form-check-inline">
										<input class="form-check-input-money" type="radio" name="inlineRadioOptionsMoney" id="depo" value="deposit">
										<img src="{{ asset("img/moneyIn.png") }}" style="max-width: 25px;margin-top: 5px;">
									</div>
									Deposit
								</label>
							</div>
							<div class="col-md-4">
								<label style="background-color: lightcoral; border-radius: 10px;width: 80px">
									<div class="form-check form-check-inline">
										<input class="form-check-input-money" type="radio" name="inlineRadioOptionsMoney" id="wd" value="withdrawal">
										<img src="{{ asset("img/moneyOut.png") }}" style="max-width: 25px;margin-top: 5px;">
									</div>
									Withdrawal
								</label>
							</div>
							<div class="col-md-4">
								<label style="background-color: lightgreen; border-radius: 10px;width: 80px">
									<div class="form-check form-check-inline">
										<input class="form-check-input-money" type="radio" name="inlineRadioOptionsMoney" id="bonus" value="bonus">
										<img src="{{ asset("img/bonus.png") }}" style="max-width: 25px;margin-top: 5px;">
									</div>
									Bonus
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Amount
					</div>
					<div class="col-md-8">
						<input class="form-control" type="number" name="amount_depowd" id="amount_depowd">
					</div>
				</div>
            </div>
            <div class="modal-footer">
				<input type="hidden" name="web_id_depo_wd" id="web_id_depo_wd">
                <button type="button" class="btn btn-secondary depo_wd_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary depo_wd_process">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pending -->
<div class="modal fade" id="modaladdnewpending" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Pending Transaction</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-12" id="web_name_detail_edit">

					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						User
					</div>
					<div class="col-md-8">
						<input class="form-control" type="text" name="user_pending" id="user_pending">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Bank
					</div>
					<div class="col-md-8">
						<div class="row" id="banks_pending_div"></div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Amount
					</div>
					<div class="col-md-8">
						<input class="form-control" type="number" name="amount_pending" id="amount_pending">
					</div>
				</div>
            </div>
            <div class="modal-footer">
				<input type="hidden" name="web_id_depo_wd" id="web_id_depo_wd">
                <button type="button" class="btn btn-secondary pending_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary pending_process">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Beban Pending -->
<div class="modal fade" id="modalbeban" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Cost Pending</h5>
            </div>
            <div class="modal-body">

				<div class="row mb-2">
					<div class="col-md-4">
						Bank
					</div>
					<div class="col-md-8">
						<div class="row" id="banks_div_pending_cost"></div>
					</div>
				</div>

				<div class="row mb-2">
					<div class="col-md-4">
						Amount
					</div>
					<div class="col-md-8">
						<input class="form-control" type="number" name="amount_pending_cost" id="amount_pending_cost">
					</div>
				</div>
				<div class="row mt-1">
					<div class="col-md-4">
						<h6>Notes</h6>
					</div>
					<div class="col-md-8">
						<textarea class="form-control" name="pending_note_cost" id="pending_note_cost" rows="3"></textarea>
					</div>
				</div>
            </div>
            <div class="modal-footer">
				<input type="hidden" name="pending_cost_id" id="pending_cost_id">
                <button type="button" class="btn btn-secondary beban_pending_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary beban_pending_process">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Depo/WD Pending -->
<div class="modal fade" id="modaldepowdpending" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Depo/WD Pending</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-12" id="web_name_detail_edit">

					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						User
					</div>
					<div class="col-md-8">
						<form autocomplete="off">
							<div class="autocomplete" style="width:300px;" id="users_div_pending_depowd">
							  
							</div>
						</form>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Website
					</div>
					<div class="col-md-8">
						<div class="row" id="website_div_pending_depowd"></div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Bank
					</div>
					<div class="col-md-8">
						<div class="row" id="banks_div_pending_depowd"></div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Type
					</div>
					<div class="col-md-8">
						<div class="row text-center">
							<div class="col-md-6">
								<label style="background-color: lightblue; border-radius: 10px;width: 130px">
									<div class="form-check form-check-inline">
										<input class="form-check-input-money" type="radio" name="inlineRadioOptionsMoneyPending" id="depo" value="deposit">
										<img src="{{ asset("img/moneyIn.png") }}" style="max-width: 25px;margin-top: 5px;">
									</div>
									Deposit
								</label>
							</div>
							<div class="col-md-6">
								<label style="background-color: lightcoral; border-radius: 10px;width: 130px">
									<div class="form-check form-check-inline">
										<input class="form-check-input-money" type="radio" name="inlineRadioOptionsMoneyPending" id="wd" value="withdrawal">
										<img src="{{ asset("img/moneyOut.png") }}" style="max-width: 25px;margin-top: 5px;">
									</div>
									Withdrawal
								</label>
							</div>
						</div>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Amount
					</div>
					<div class="col-md-8">
						<input class="form-control" type="number" name="amount_pending_depowd" id="amount_pending_depowd">
					</div>
				</div>
            </div>
            <div class="modal-footer">
				<input type="hidden" name="pending_trx_id" id="pending_trx_id">
                <button type="button" class="btn btn-secondary depo_wd__pending_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary depo_wd_pending_process">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Coins -->
<div class="modal fade" id="modaladdcoins" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Coins</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-4">
						Website Name
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="web_name_add" id="web_name_add" readonly>
						<input type="hidden"  name="web_id_add" id="web_id_add">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Available Coins
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="avail_coins_add" id="avail_coins_add" readonly>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Add Amount
					</div>
					<div class="col-md-8">
						<input type="number" class="form-control" name="req_amount_add_coin" id="req_amount_add_coin">
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add_coins_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary add_coins_process">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal deduct Coins -->
<div class="modal fade" id="modaldeductcoins" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deduct Coins</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-4">
						Website Name
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="web_name_deduct" id="web_name_deduct" readonly>
						<input type="hidden"  name="web_id_deduct" id="web_id_deduct">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Available Coins
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="avail_coins_deduct" id="avail_coins_deduct" readonly>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Deduct Amount
					</div>
					<div class="col-md-8">
						<input type="number" class="form-control" name="req_amount_deduct_coin" id="req_amount_deduct_coin">
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary deduct_coins_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary deduct_coins_process">Submit</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Balance -->
<div class="modal fade" id="modaladdbalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Balance</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-12" id="web_name_detail_edit">

					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Bank Name
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="bank_name_add" id="bank_name_add" readonly>
						<input type="hidden"  name="bank_id_add" id="bank_id_add">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Account Number
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="acc_no_add" id="acc_no_add" readonly>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Available Balance
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="avail_balance_add" id="avail_balance_add" readonly>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Add Amount
					</div>
					<div class="col-md-8">
						<input type="number" class="form-control" name="req_amount_add_balance" id="req_amount_add_balance">
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary add_balance_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary add_balance_process">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Deduct balance -->
<div class="modal fade" id="modaldeductbalance" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Deduct Balance</h5>
            </div>
            <div class="modal-body">
				<div class="row mb-2">
					<div class="col-md-4">
						Bank Name
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="bank_name_deduct" id="bank_name_deduct" readonly>
						<input type="hidden"  name="bank_id_deduct" id="bank_id_deduct">
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Account Number
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="acc_no_deduct" id="acc_no_deduct" readonly>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Available Balance
					</div>
					<div class="col-md-8">
						<input type="text" class="form-control" name="avail_balance_deduct" id="avail_balance_deduct" readonly>
					</div>
				</div>
				<div class="row mb-2">
					<div class="col-md-4">
						Deduct Amount
					</div>
					<div class="col-md-8">
						<input type="number" class="form-control" name="req_amount_deduct_balance" id="req_amount_deduct_balance">
					</div>
				</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary deduct_balance_close" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary deduct_balance_process">Submit</button>
            </div>
        </div>
    </div>
</div>


<!-- Modal Add Cashback -->
<div class="modal fade" id="modaladdnewcashback" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Submit Cashback</h5>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12">
                        <div class="card card-primary card-tabs">
                          <div class="card-header p-0 pt-1">
                            <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                              <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Single Input</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Multiple Input</a>
                              </li>
                            </ul>
                          </div>
                          <div class="card-body">
                            <div class="tab-content" id="custom-tabs-one-tabContent">
                              <div class="tab-pane fade show active" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                 <div class="row mb-2 mb-2">
                                     <div class="col-md-3">Users</div>
                                     <div class="col-md-9">
                                        <form autocomplete="off">
                                            <div class="autocomplete" style="width:300px;" id="users_div_cashback">
                                              
                                            </div>
                                        </form>
                                     </div>
                                 </div>
                                 {{-- <div class="row mb-2 mb-2">
                                    <div class="col-md-3">Banks</div>
                                    <div class="col-md-9">
                                       <div class="row" id="banks_div_cashback_single"></div>
                                    </div>
                                 </div> --}}
                                 <div class="row mb-2 mb-2">
                                    <div class="col-md-3">Website</div>
                                    <div class="col-md-9">
                                       <div class="row" id="web_div_cashback_single"></div>
                                    </div>
                                 </div>
                                 <div class="row mb-2 mb-2">
                                     <div class="col-md-3">Coins</div>
                                     <div class="col-md-9">
                                         <input class="form-control" type="number" name="amount_add_cashback" id="amount_add_cashback">
                                         
                                     </div>
                                 </div>
                                 <div class="row mb-2-mt-2">
                                    <div class="col-md-12 text-center">
                                        <input type="hidden" name="type" id="cashback_single" value="cb_single">
                                        <button type="button" class="btn btn-primary cashback_single_process">Submit</button>
                                    </div>
                                </div>
                              </div>


                              <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                                    <form method="POST" action="{{route('multi_cashback_process')}}" enctype="multipart/form-data" id="form_cashback_multi">
                                        @csrf
                                        {{-- <div class="row mb-2 mb-2">
                                            <div class="col-md-3">Banks</div>
                                            <div class="col-md-9">
                                                <div class="row" id="banks_div_cashback_multiple"></div>
                                            </div>
                                        </div> --}}
                                        <div class="row mb-2 mb-2">
                                            <div class="col-md-3">Website</div>
                                            <div class="col-md-9">
                                               <div class="row" id="web_div_cashback_multiple"></div>
                                            </div>
                                         </div>
                                        <div class="row mb-2 mb-2">
                                            <div class="col-md-4">Select file</div>
                                            <div class="col-md-8">
                                                <input class="form-control" type="file" name="file_add_cashback" id="file_add_cashback">
                                            </div>
                                            
                                        </div>
                                        <div class="row mb-2-mt-2">
                                            <div class="col-md-12 text-center">
                                                <input type="hidden" name="type" id="cashback_multi" value="cb_multi">
                                                <button type="submit" class="btn btn-primary cashback_multi_process">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary cashback_close" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Cashback Detail -->
<div class="modal fade" id="modalcashbackdetail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashback Detail</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">
                       Transaction Number 
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="trx_number_detail_cashback" id="trx_number_detail_cashback" readonly>
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">
                        User ID
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="user_id_detail_cashback" id="user_id_detail_cashback" readonly>
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">
                        Amount
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="amount_detail_cashback" id="amount_detail_cashback" readonly>
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">
                        Web Name
                    </div>
                    <div class="col-md-8">
                        <input type="text" class="form-control" name="web_name_detail_cashback" id="web_name_detail_cashback" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Add Bank Master -->
<div class="modal fade" id="modaladdnewbankmaster" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Bank Master</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">Bank Master Name</div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="bank_master_name" id="bank_master_name">
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">Bank Master Alias</div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="bank_master_alias" id="bank_master_alias">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary master_bank_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary master_bank_process" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Edit Bank Master -->
<div class="modal fade" id="modalbankmasteredit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cashback Detail</h5>
            </div>
            <div class="modal-body">
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">Bank Master Name</div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="bank_master_name_edit" id="bank_master_name_edit">
                    </div>
                </div>
                <div class="row mt-2 mb-2">
                    <div class="col-md-4">Bank Master Alias</div>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="bank_master_alias_edit" id="bank_master_alias_edit">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="master_bank_edit_id" id="master_bank_edit_id">
                <button type="button" class="btn btn-secondary master_bank_edit_close" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary master_bank_edit_process" data-dismiss="modal">Submit</button>
            </div>
        </div>
    </div>
</div>



@endsection

@section('footer')

<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>    
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.2/datatables.min.js"></script>
{{-- <script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script> --}}

<script>
	function autocomplete(inp, arr) {
			/*the autocomplete function takes two arguments,
			the text field element and an array of possible autocompleted values:*/
			var currentFocus;
			/*execute a function when someone writes in the text field:*/
			inp.addEventListener("input", function(e) {
				var a, b, i, val = this.value;
				/*close any already open lists of autocompleted values*/
				closeAllLists();
				if (!val) { return false;}
				currentFocus = -1;
				/*create a DIV element that will contain the items (values):*/
				a = document.createElement("DIV");
				a.setAttribute("id", this.id + "autocomplete-list");
				a.setAttribute("class", "autocomplete-items");
				/*append the DIV element as a child of the autocomplete container:*/
				this.parentNode.appendChild(a);
				/*for each item in the array...*/
				for (i = 0; i < arr.length; i++) {
					/*check if the item starts with the same letters as the text field value:*/
					if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
					/*create a DIV element for each matching element:*/
					b = document.createElement("DIV");
					/*make the matching letters bold:*/
					b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
					b.innerHTML += arr[i].substr(val.length);
					/*insert a input field that will hold the current array item's value:*/
					b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
					/*execute a function when someone clicks on the item value (DIV element):*/
					b.addEventListener("click", function(e) {
						/*insert the value for the autocomplete text field:*/
						inp.value = this.getElementsByTagName("input")[0].value;
						/*close the list of autocompleted values,
						(or any other open lists of autocompleted values:*/
						closeAllLists();
					});
					a.appendChild(b);
					}
				}
			});
			/*execute a function presses a key on the keyboard:*/
			inp.addEventListener("keydown", function(e) {
				var x = document.getElementById(this.id + "autocomplete-list");
				if (x) x = x.getElementsByTagName("div");
				if (e.keyCode == 40) {
					/*If the arrow DOWN key is pressed,
					increase the currentFocus variable:*/
					currentFocus++;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 38) { //up
					/*If the arrow UP key is pressed,
					decrease the currentFocus variable:*/
					currentFocus--;
					/*and and make the current item more visible:*/
					addActive(x);
				} else if (e.keyCode == 13) {
					/*If the ENTER key is pressed, prevent the form from being submitted,*/
					e.preventDefault();
					if (currentFocus > -1) {
					/*and simulate a click on the "active" item:*/
					if (x) x[currentFocus].click();
					}
				}
			});
			function addActive(x) {
				/*a function to classify an item as "active":*/
				if (!x) return false;
				/*start by removing the "active" class on all items:*/
				removeActive(x);
				if (currentFocus >= x.length) currentFocus = 0;
				if (currentFocus < 0) currentFocus = (x.length - 1);
				/*add class "autocomplete-active":*/
				x[currentFocus].classList.add("autocomplete-active");
			}
			function removeActive(x) {
				/*a function to remove the "active" class from all autocomplete items:*/
				for (var i = 0; i < x.length; i++) {
				x[i].classList.remove("autocomplete-active");
				}
			}
			function closeAllLists(elmnt) {
				/*close all autocomplete lists in the document,
				except the one passed as an argument:*/
				var x = document.getElementsByClassName("autocomplete-items");
				for (var i = 0; i < x.length; i++) {
				if (elmnt != x[i] && elmnt != inp) {
					x[i].parentNode.removeChild(x[i]);
				}
				}
			}
			/*execute a function when someone clicks in the document:*/
			document.addEventListener("click", function (e) {
				closeAllLists(e.target);
			});
	}

    function reload() {
        window.location.reload(false);
    }

    function get_web() {
        $('#tbl_web').empty();
        $.ajax({
            url: "{{route('get_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].web_name + '</td>';
                    html += '<td>' + formatNumber(data[i].init_coin) + '</td>';
                    html += '<td><button class="btn btn-sm btn-primary edit_web" data-id="' + data[i].id +
                        '"data-toggle="modal" data-target="#modaleditweb">Edit</button></td>';
                    html += '<td><button class="btn btn-sm btn-danger del_data" data-id="' + data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    html += '</tr>';
                    no++;
                }
                $('#tbl_web').append(html);
                $("#tbl_web_list").DataTable();
            }
        });
    }

    function get_leader() {
        $('#tbl_leader').empty();
        $.ajax({
            url: "{{route('get_leader')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmlll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmlll += '<tr>';
                    htmlll += '<td>' + no + '</td>';
                    htmlll += '<td>' + data[i].name + '</td>';
                    htmlll += '<td>' + data[i].email + '</td>';
                    htmlll += '<td><button class="btn btn-sm btn-primary edit_leader" data-id="' + data[i]
                        .id + '"data-toggle="modal" data-target="#modaleditleader">Edit</button></td>';
                    htmlll += '<td><button class="btn btn-sm btn-danger del_data" data-id="' + data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmlll += '</tr>';
                    no++;
                }
                $('#tbl_leader').append(htmlll);
                $("#tbl_leader_list").DataTable();
            }
        });
    }

    function get_operator() {
        $('#tbl_operator').empty();
        $.ajax({
            url: "{{route('get_operator')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmlll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmlll += '<tr>';
                    htmlll += '<td>' + no + '</td>';
                    htmlll += '<td>' + data[i].name + '</td>';
                    htmlll += '<td>' + data[i].email + '</td>';
                    htmlll += '<td><button class="btn btn-sm btn-primary edit_operator" data-id="' + data[i]
                        .id + '"data-toggle="modal" data-target="#modaleditoperator">Edit</button></td>';
                    htmlll += '<td><button class="btn btn-sm btn-danger del_data" data-id="' + data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmlll += '</tr>';
                    no++;
                }
                $('#tbl_operator').append(htmlll);
                $("#tbl_operator_list").DataTable();
            }
        });
    }

    function get_customer() {
        $('#tbl_customer').empty();
        $.ajax({
            url: "{{route('get_cust')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].user_id + '</td>';
                    htmll += '<td>' + data[i].name + '</td>';
                    htmll += '<td><button class="btn btn-sm btn-primary edit_cust" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaleditcustomer">Edit</button></td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-danger del_data" data-type="customer" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_customer').append(htmll);
                $("#tbl_customer_list").DataTable();
            }
        });
    }

    function get_bank_master() {
        $('#tbl_bank_master').empty();
        $.ajax({
            url: "{{route('get_bank_master')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].bank_master_name + '</td>';
                    html += '<td>' + data[i].bank_master_alias + '</td>';
                    html += '<td><button class="btn btn-sm btn-primary bank_master_edit" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modalbankmasteredit">Edit</button></td>';	
                    html += '<td><button class="btn btn-sm btn-danger del_data" data-type="bank_master" data-id="' +data[i].id +'"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
					html += '</tr>';
                    no++;
                }
                $('#tbl_bank_master').append(html);
                $("#tbl_bank_master_list").DataTable();
            }
        });
    }
    function get_bank() {
        $('#tbl_bank').empty();
        $.ajax({
            url: "{{route('get_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].bank_name + '</td>';
                    htmll += '<td>' + data[i].acc_no + '</td>';
                    htmll += '<td>' + data[i].holder_name + '</td>';
                    htmll += '<td>' + formatNumber(data[i].saldo) + '</td>';
                    htmll += '<td><button class="btn btn-sm btn-primary edit_bank" data-id="' + data[i].id +
                        '"data-toggle="modal" data-target="#modaleditbank">Edit</button></td>';
                    htmll += '<td><button class="btn btn-sm btn-danger del_data" data-id="' + data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_bank').append(htmll);
                $("#tbl_bank_list").DataTable();
            }
        });
    }

	function get_pending(){
		$('#tbl_pending').empty();
        $.ajax({
            url: "{{route('get_data_pending')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].status + '</td>';
					html += '<td>' + data[i].trx_name + '</td>';
					html += '<td>' + data[i].bank_name + '</td>';
					html += '<td>' + data[i].acc_no + '</td>';
					html += '<td>' + formatNumber(data[i].amount) + '</td>';
					if (data[i].status == "Pending") {
						html += '<td><button class="btn btn-sm btn-primary pending_depowd" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaldepowdpending">Depo/WD</button></td>';
                    	html += '<td><button class="btn btn-sm btn-danger beban_depowd" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modalbeban">Costs</button></td>';	
					} else {
						html += '<td><button class="btn btn-sm btn-primary pending_depowd" data-id="" data-toggle="modal" disabled>Depo/WD</button></td>';
                    	html += '<td><button class="btn btn-sm btn-danger beban_depowd" data-id="" data-toggle="modal" disabled>Costs</button></td>';
					}
                   	html += '</tr>';
                    no++;
                }
                $('#tbl_pending').append(html);
                $("#tbl_pending_list").DataTable();
            }
        });
	}
	function get_add_deduct_coin(){
        $('#tbl_add_deduct_coins').empty();
        $.ajax({
            url: "{{route('get_data_add_deduct_coin')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].web_name + '</td>';
					html += '<td>' + formatNumber(data[i].init_coin) + '</td>';
					html += '<td><button class="btn btn-sm btn-primary add_coins" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaladdcoins">Add Coins</button></td>';
					html += '<td><button class="btn btn-sm btn-danger deduct_coins" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaldeductcoins">Deduct Coins</button></td>';	
					html += '</tr>';
                    no++;
                }
                $('#tbl_add_deduct_coins').append(html);
                $("#tbl_add_deduct_coins_list").DataTable();
            }
        });
	}
	function get_add_deduct_balance(){
		$('#tbl_add_deduct_balance').empty();
        $.ajax({
            url: "{{route('get_data_add_deduct_balance')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].bank_name + '</td>';
                    html += '<td>' + data[i].acc_no + '</td>';
					html += '<td>' + formatNumber(data[i].saldo) + '</td>';
					html += '<td><button class="btn btn-sm btn-primary add_balance" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaladdbalance">Add Balance</button></td>';
					html += '<td><button class="btn btn-sm btn-danger deduct_balance" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaldeductbalance">Deduct Balance</button></td>';	
					html += '</tr>';
                    no++;
                }
                $('#tbl_add_deduct_balance').append(html);
                $("#tbl_add_deduct_balance_list").DataTable();
            }
        });
	}

    function get_cashback_list(){
        $('#tbl_cashback').empty();
        $.ajax({
            url: "{{route('get_cashback')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].trx_number + '</td>';
                    html += '<td><button class="btn btn-sm btn-primary cashback_detail" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modalcashbackdetail">Detail</button></td>';	
					html += '</tr>';
                    no++;
                }
                $('#tbl_cashback').append(html);
                $("#tbl_cashback_list").DataTable();
            }
        });
    }




    $(document).on('click', '.del_data', function () {
        var type = $(this).data("type");
        var id = $(this).data("id");
        $('#type_delete').val(type);
        $('#id_delete').val(id);



    })

    $(document).on('click', '.delete_data', function () {

        var type = $('#type_delete').val();
        var id = $('#id_delete').val();

        if (type == "web") {
            $.ajax({
                url: "{{route('delete_web')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    alert("Success Delete Website");
                    $('.delete_data_close').click();
                    get_web();

                }
            });
        } else if (type == "leader") {
            $.ajax({
                url: "{{route('delete_leader')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    alert("Success Delete Leader");
                    $('.delete_data_close').click();
                    get_leader();

                }
            });
        } else if (type == "operator") {
            $.ajax({
                url: "{{route('delete_operator')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    alert("Success Delete operator");
                    $('.delete_data_close').click();
                    get_operator();

                }
            });
        } else if (type == "customer") {
            $.ajax({
                url: "{{route('delete_customer')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    alert("Success Delete Customer");
                    $('.delete_data_close').click();
                    get_customer();

                }
            });
        } else if (type == "bank") {
            $.ajax({
                url: "{{route('delete_bank')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    alert("Success Delete Bank");
                    $('.delete_data_close').click();
                    get_bank();

                }
            });
        } else if (type == "bank_master"){
            $.ajax({
                url: "{{route('bank_master_delete')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: id
                },
                dataType: "json",
                success: function (data) {
                    alert("Success Delete Bank");
                    $('.delete_data_close').click();
                    get_bank_master();

                }
            });
        }
    })


    $(document).on('click', '.modal1', function () {
        $('#tbl_web').empty();
        $.ajax({
            url: "{{route('get_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].web_name + '</td>';
                    html += '<td>' + formatNumber(data[i].init_coin) + '</td>';
                    html += '<td><button class="btn btn-sm btn-primary edit_web" data-id="' + data[
                            i].id +
                        '"data-toggle="modal" data-target="#modaleditweb">Edit</button></td>';
                    html +=
                        '<td><button class="btn btn-sm btn-danger del_data" data-type="web" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    // html +='<td><a class="btn btn-sm btn-danger del_web" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                    html += '</tr>';
                    no++;
                }
                $('#tbl_web').append(html);
                $("#tbl_web_list").DataTable();
            }
        });
    })
    $(document).on('click', '.add_web', function () {
        var name = $('#web_name').val();
        var coin = $('#init_coin').val();
        $.ajax({
            url: "{{route('add_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                web_name: name,
                init_coin: coin
            },
            dataType: "json",
            success: function (data) {
                if (data.message == "success") {
                    alert("Success Add Website");
                    $('.add_web_close').click();
                    get_web();
                } else {
                    alert(data.data);
                }
            }
        });
    })
    $(document).on('click', '.edit_web', function () {
        var id = $(this).data("id");
        $.ajax({
            url: "{{route('get_web_edit')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                $('#web_name_edit').val(data.data[0].web_name);
                $('#init_coin_edit').val(data.data[0].init_coin);
                $('#id_web_edit').val(data.data[0].id);
            }
        });
    })
    $(document).on('click', '.edit_web_process', function () {
        var id = $('#id_web_edit').val();
        var name = $('#web_name_edit').val();
        var coin = $('#init_coin_edit').val();
        $.ajax({
            url: "{{route('web_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                name: name,
                coin: coin
            },
            dataType: "json",
            success: function (data) {
                alert("Success Edit Website");
                $('.edit_web_close').click();
                get_web();
            }
        });
    })
    $(document).on('click', '.del_web', function () {
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('delete_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                alert("Success Delete Website");
                $('.add_web_close').click();
                get_web();

            }
        });
    })



    $(document).on('click', '.modal2', function () {
        $('#tbl_leader').empty();
        $.ajax({
            url: "{{route('get_leader')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].name + '</td>';
                    htmll += '<td>' + data[i].email + '</td>';
                    htmll += '<td><button class="btn btn-sm btn-primary edit_leader" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaleditleader">Edit</button></td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-danger del_data" data-type="leader" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_leader').append(htmll);
                $("#tbl_leader_list").DataTable();
            }
        });
    })
    $(document).on('click', '.add_leader', function () {
        var leader_name = $('#leader_name').val();
        var leader_email = $('#leader_email').val();
        var leader_pass = $('#leader_pass').val();
        var username = $('#leader_username_apps').val();
        var password_apps = $('#leader_pass_pass').val();

        $.ajax({
            url: "{{route('add_leader')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                name: leader_name,
                email: leader_email,
                password: leader_pass,
                username:username,
                pass_app: password_apps
            },
            dataType: "json",
            success: function (data) {

                if (data.message == "success") {
                    alert("Success Add Leader");
                    $('.add_leader_close').click();
                    get_leader();
                } else {
                    alert(data.data);
                }

            }
        });
    })
    $(document).on('click', '.edit_leader', function () {
        var id = $(this).data("id");
        $.ajax({
            url: "{{route('get_leader_edit')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                $('#leader_name_edit').val(data.data[0].name);
                $('#leader_email_edit').val(data.data[0].email);
                $('#id_leader_edit').val(data.data[0].id);
                $('#leader_username_apps_edit').val(data.data[0].username);
                $('#leader_pass_pass_edit').val(data.data[0].password_apps);
            }
        });
    })
    $(document).on('click', '.edit_leader_process', function () {
        var id = $('#id_leader_edit').val();
        var name = $('#leader_name_edit').val();
        var email = $('#leader_email_edit').val();
        var username = $('#leader_username_apps_edit').val();
        var password_apps = $('#leader_pass_pass_edit').val();
        $.ajax({
            url: "{{route('leader_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                name: name,
                email: email,
                username:username,
                pass_app: password_apps
            },
            dataType: "json",
            success: function (data) {
                alert("Success Edit Leader");
                $('.edit_leader_close').click();
                get_leader();
            }
        });
    })
    $(document).on('click', '.del_leader', function () {
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('delete_leader')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                alert("Success Delete Leader");
                $('.add_leader_close').click();
                get_leader();

            }
        });
    })


    $(document).on('click', '.modal3', function () {
        $('#tbl_operator').empty();
        $.ajax({
            url: "{{route('get_operator')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].name + '</td>';
                    htmll += '<td>' + data[i].email + '</td>';
                    htmll += '<td><button class="btn btn-sm btn-primary edit_operator" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaleditoperator">Edit</button></td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-danger del_data" data-type="operator" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_operator').append(htmll);
                $("#tbl_operator_list").DataTable();
            }
        });
    })
    $(document).on('click', '.add_operator', function () {
        var operator_name = $('#operator_name').val();
        var operator_email = $('#operator_email').val();
        var operator_pass = $('#operator_pass').val();
        var username = $('#operator_username_apps').val();
        var password_apps = $('#operator_pass_pass').val();

        $.ajax({
            url: "{{route('add_operator')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                name: operator_name,
                email: operator_email,
                password: operator_pass,
                username:username,
                pass_app: password_apps
            },
            dataType: "json",
            success: function (data) {

                if (data.message == "success") {
                    alert("Success Add operator");
                    $('.add_operator_close').click();
                    get_operator();
                } else {
                    alert(data.data);
                }

            }
        });
    })
    $(document).on('click', '.edit_operator', function () {
        var id = $(this).data("id");
        $.ajax({
            url: "{{route('get_operator_edit')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                $('#operator_name_edit').val(data.data[0].name);
                $('#operator_email_edit').val(data.data[0].email);
                $('#id_operator_edit').val(data.data[0].id);
                $('#operator_username_apps_edit').val(data.data[0].username);
                $('#operator_pass_pass_edit').val(data.data[0].password_apps);
            }
        });
    })
    $(document).on('click', '.edit_operator_process', function () {
        var id = $('#id_operator_edit').val();
        var name = $('#operator_name_edit').val();
        var email = $('#operator_email_edit').val();
        var username = $('#operator_username_apps_edit').val();
        var password_apps = $('#operator_pass_pass_edit').val();
        $.ajax({
            url: "{{route('operator_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                name: name,
                email: email,
                username:username,
                pass_app: password_apps
            },
            dataType: "json",
            success: function (data) {
                alert("Success Edit operator");
                $('.edit_operator_close').click();
                get_operator();
            }
        });
    })
    $(document).on('click', '.del_operator', function () {
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('delete_operator')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                alert("Success Delete operator");
                $('.add_operator_close').click();
                get_operator();

            }
        });
    })


    $(document).on('click', '.modal4', function () {
        $('#tbl_customer').empty();
        $.ajax({
            url: "{{route('get_cust')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].user_id + '</td>';
                    htmll += '<td>' + data[i].name + '</td>';
                    htmll += '<td><button class="btn btn-sm btn-primary edit_cust" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaleditcustomer">Edit</button></td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-danger del_data" data-type="customer" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_customer').append(htmll);
                $('#tbl_customer_list').DataTable();
            }
        });
    })
	$(document).on('click', '.get_bank_add_cust', function () {
        var user_id = $('#customer_user_id').val('');
        var name = $('#customer_name').val('');
        var address = $('#customer_address').val('');
        var email = $('#customer_email').val('');
        var phone = $('#customer_phone').val('');
        var note = $('#customer_note').val('');
        var bank_name = $('#customer_bank_name').val('');
        var acc_no = $('#customer_bank_acc_no').val('');
        var holder_name = $('#customer_bank_acc_holder').val('');
		var web = $('#banks_div_add_customer').empty();

		$.ajax({
            url: "{{route('get_data_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
				var webs = data.webs;
				var htmll = "";


				htmll += '<select class="form-control" name="web_add_customer" id="web_add_customer">'
					for (i = 0; i < webs.length; i++) {
						htmll += '<option value="'+webs[i]['id']+'"> '+webs[i]['web_name']+' </option>'
					}
				htmll += '</select>'
				
				$('#banks_div_add_customer').append(htmll);
            }
        });
	})
    $(document).on('click', '.add_customer', function () {
        var user_id = $('#customer_user_id').val();
        var name = $('#customer_name').val();
        var address = $('#customer_address').val();
        var email = $('#customer_email').val();
        var phone = $('#customer_phone').val();
        var note = $('#customer_note').val();
        var bank_name = $('#customer_bank_name').val();
        var acc_no = $('#customer_bank_acc_no').val();
        var holder_name = $('#customer_bank_acc_holder').val();
		var web = $('#web_add_customer').val();

        $.ajax({
            url: "{{route('add_cust')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                user_id:user_id,
                name:name,
                address:address,
                email:email,
                phone:phone,
                note:note,
                bank_name:bank_name,
                acc_no:acc_no,
                holder_name:holder_name,
				web:web
            },
            dataType: "json",
            success: function (data) {

                if (data.message == "success") {
                    alert("Success Add customer");
                    $('.add_customer_close').click();
                    get_customer();
                } else {
                    alert(data.data);
                }

            }
        });
    })
    $(document).on('click', '.edit_cust', function () {
		$('#banks_div_add_customer_edit').empty();
        var id = $(this).data("id");
        $.ajax({
            url: "{{route('get_cust_edit')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                $('#user_id_cust_edit').val(data.data[0].user_id);
                $('#name_cust_edit').val(data.data[0].name);
                $('#address_cust_edit').val(data.data[0].address);
                $('#email_cust_edit').val(data.data[0].email);
                $('#phone_cust_edit').val(data.data[0].phone);
                $('#note_cust_edit').val(data.data[0].note);
                $('#bank_name_cust_edit').val(data.data[0].bank_name);
                $('#bank_acc_no_cust_edit').val(data.data[0].acc_no);
                $('#bank_acc_holder_cust_edit').val(data.data[0].acc_holder);
				$('#id_customer_edit').val(data.data[0].id);

				var cek = data.cek;
				var webs = data.webs;
				var htmll = "";

				htmll += '<select class="form-control" name="web_add_customer_edit" id="web_add_customer_edit">'
					for (j = 0; j < webs.length; j++) {
						if (jQuery.inArray(webs[j]['id'].toString(), cek)!== -1) {
							htmll += '<option value="'+webs[j]['id']+'" selected> '+webs[j]['website_name']+' </option>'
						} else {
							htmll += '<option value="'+webs[j]['id']+'"> '+webs[j]['website_name']+' </option>'
						}
					}
				htmll += '</select>'

				$('#banks_div_add_customer_edit').append(htmll);
            }
        });
    })
    $(document).on('click', '.edit_customer_process', function () {
		var id = $('#id_customer_edit').val();
        var user_id = $('#user_id_cust_edit').val();
        var name = $('#name_cust_edit').val();
        var address = $('#address_cust_edit').val();
        var email = $('#email_cust_edit').val();
        var phone = $('#phone_cust_edit').val();
        var note = $('#note_cust_edit').val();
        var bank_name = $('#bank_name_cust_edit').val();
        var acc_no = $('#bank_acc_no_cust_edit').val();
        var holder_name = $('#bank_acc_holder_cust_edit').val();
		var web = $('#web_add_customer_edit').val();
        $.ajax({
            url: "{{route('customer_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                user_id:user_id,
                name:name,
                address:address,
                email:email,
                phone:phone,
                note:note,
                bank_name:bank_name,
                acc_no:acc_no,
                holder_name:holder_name,
				id:id,
				web:web
            },
            dataType: "json",
            success: function (data) {
                alert("Success Edit customer");
                $('.edit_customer_close').click();
                get_customer();
            }
        });
    })
    $(document).on('click', '.del_cust', function () {
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('delete_customer')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                alert("Success Delete Customer");
                $('.add_customer_close').click();
                get_customer();

            }
        });
    })


    $(document).on('click', '.modal5', function () {
        $('#tbl_bank').empty();
        $.ajax({
            url: "{{route('get_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].bank_name + '</td>';
                    htmll += '<td>' + data[i].acc_no + '</td>';
                    htmll += '<td>' + data[i].holder_name + '</td>';
                    htmll += '<td>' + formatNumber(data[i].saldo) + '</td>';
                    // htmll += '<td><button class="btn btn-sm btn-primary edit_bank" data-id="' +data[i].id +'"data-toggle="modal" data-target="#modaleditbank">Edit</button></td>';
                    htmll +='<td><button class="btn btn-sm btn-danger del_data" data-type="bank" data-id="' +data[i].id +'"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_bank').append(htmll);
                $("#tbl_bank_list").DataTable();
            }
        });
    })
    $(document).on('click', '.get_bank_master', function () {
        $('#bank_master_id').empty();
        $.ajax({
            url: "{{route('get_bank_master_data')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var master = data.data;
                var html = "";

                for (let i = 0; i < master.length; i++) {
                    html += '<option value="'+master[i].id+'">'+master[i].bank_master_name+'</option>';   
                }
                $('#bank_master_id').append(html);
            }
        });
    })
    $(document).on('click', '.add_bank', function () {
        var bank_master_id = $('#bank_master_id').val();
        var acc_no = $('#acc_no').val();
        var holder_name = $('#holder_name').val();
        var saldo = $('#saldo').val();
        var login_name = $('#username_ibank').val();
        var login_password = $('#pass_ibank').val();

        $.ajax({
            url: "{{route('add_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                bank_master_id: bank_master_id, 
                acc_no: acc_no,
                holder_name: holder_name,
                saldo: saldo,
                login_name: login_name,
                login_password: login_password
            },
            dataType: "json",
            success: function (data) {

                if (data.message == "success") {
                    alert("Success Add Bank");
                    $('.add_bank_close').click();
                    get_bank();
                } else {
                    alert(data.data);
                }
            }
        });
    })
    $(document).on('click', '.edit_bank', function () {
        $('#bank_master_id_edit').empty();
        var id = $(this).data("id");
        $.ajax({
            url: "{{route('get_bank_edit')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                var master = data.master;
                var html = "";

                for (let i = 0; i < master.length; i++) {
                    html += '<option value="'+master[i].id+'">'+master[i].bank_master_name+'</option>';   
                }

                $('#bank_master_id_edit').append(html);
                $('#bank_master_id_edit').val(data.data[0].bank_master_id);
                $('#acc_no_edit').val(data.data[0].acc_no);
                $('#holder_name_edit').val(data.data[0].holder_name);
                $('#saldo_edit').val(data.data[0].saldo);
                $('#username_ibank_edit').val(data.data[0].login_name);
                $('#pass_ibank_edit').val(data.data[0].login_password);
                $('#id_bank_edit').val(data.data[0].id);
            }
        });
    })
    $(document).on('click', '.edit_bank_process', function () {
        var bank_master_id_edit = $('#bank_master_id_edit').val();
        var acc_no = $('#acc_no_edit').val();
        var holder_name = $('#holder_name_edit').val();
        var saldo = $('#saldo_edit').val();
        var id = $('#id_bank_edit').val();
        var login_name = $('#username_ibank_edit').val();
        var login_password = $('#pass_ibank_edit').val();
        $.ajax({
            url: "{{route('bank_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                bank_master_id_edit: bank_master_id_edit,
                acc_no: acc_no,
                holder_name: holder_name,
                saldo: saldo,
                login_name: login_name,
                login_password: login_password
            },
            dataType: "json",
            success: function (data) {
                alert("Success Edit Bank");
                $('.edit_bank_close').click();
                get_bank();
            }
        });
    })
    $(document).on('click', '.del_bank', function () {
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('delete_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            dataType: "json",
            success: function (data) {
                alert("Success Delete Bank");
                $('.add_bank_close').click();
                get_bank();

            }
        });
    })

    $(document).on('click', '.modal6', function () {
        $('#tbl_assign_bank').empty();
        $.ajax({
            url: "{{route('get_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].bank_name + '</td>';
                    htmll += '<td>' + data[i].acc_no + '</td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-success detail_assign_bank" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldetailassignbank">Detail</button></td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-primary edit_assign_bank" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaleditassignbank">Edit</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_assign_bank').append(htmll);
                $("#tbl_assign_bank_list").DataTable();
            }
        });
    })
	$(document).on('click', '.detail_assign_bank', function(){
		$('#web_assign').empty();
		$('#bank_name_detail').empty();
		$('#acc_no_detail').empty()
		var id = $(this).data("id");

		$.ajax({
            url: "{{route('get_data')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
				var webs = data.data;
				var bank = data.bank;
				var html = "";
				var htmll = "";
				var htmlll = "";
				var no=1;
				htmll += '<h5>Bank Name: '+bank[0]["bank_name"]+'</h5>'
				htmlll += '<h5>Account No: '+bank[0]["acc_no"]+'</h5>'

				for (i = 0; i < webs.length; i++) {
					html += '<tr>'
						html += '<td>'+no+'</td>'
						html += '<td>'+webs[i]['web_name']+'</td>'
					html += '</tr>'
					no++;
				}

                $('#web_assign').append(html);
                $('#bank_name_detail').append(htmll);
                $('#acc_no_detail').append(htmlll);
            }
        });
		
	})
	$(document).on('click', '.edit_assign_bank', function(){
		$('#web_assign_edit').empty();
		$('#bank_name_detail_edit').empty();
		$('#acc_no_detail_edit').empty();
		var id = $(this).data("id");

		$.ajax({
            url: "{{route('get_data_edit')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
				var cek = data.cek;
				var webs = data.webs;
				var leads = data.leads;
				var ops = data.ops;
				var bank = data.bank;
				var html = "";
				var htmll = "";
				var htmlll = "";

				htmll += '<h5>Bank Name: '+bank[0]["bank_name"]+'</h5>'
				htmlll += '<h5>Account No: '+bank[0]["acc_no"]+'</h5>'

				html += '<select multiple class="form-control" name="website_assigning_edit" id="website_assigning_edit">'
					if (bank[0]["website"] == "-") {
						for (i = 0; i < webs.length; i++) {
							html += '<option value="'+webs[i]['id']+'"> '+webs[i]['web_name']+' </option>'
						}
					} else {
						for (j = 0; j < webs.length; j++) {
							if (jQuery.inArray(webs[j]['id'].toString(), cek)!== -1) {
								html += '<option value="'+webs[j]['id']+'" selected> '+webs[j]['web_name']+' </option>'
							} else {
								html += '<option value="'+webs[j]['id']+'"> '+webs[j]['web_name']+' </option>'
							}
						}
					}

						
					
				html +=	'</select>'

                $('#web_assign_edit').append(html);
				$('#bank_name_detail_edit').append(htmll);
                $('#acc_no_detail_edit').append(htmlll);
				$('#web_id').val(id)
            }
        });
	})
	$(document).on('click', '.assign_bank_edit_process', function(){
		var webs = $('#website_assigning_edit').val()
		var web_id = $('#web_id').val()

		$.ajax({
            url: "{{route('process_data')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				website:webs,
				id:web_id
            },
            dataType: "json",
            success: function (data) {
				alert("Success Assign Website to Bank");
				$('.assign_bank_edit_close').click()
            }
        });
	})

    $(document).on('click', '.modal7', function () {
        $('#tbl_assign_bank').empty();
        $.ajax({
            url: "{{route('get_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].web_name + '</td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-success detail_assign_website" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldetailassignwebsite">Detail</button></td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-primary edit_assign_website" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaleditassignwebsite">Edit</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_assign_website').append(htmll);
                $("#tbl_assign_website_list").DataTable();
            }
        });
    })
	$(document).on('click', '.detail_assign_website', function(){
		$('#web_assign_leads').empty();
		$('#web_assign_ops').empty();
		$('#web_name_detail').empty();

		var id = $(this).data("id");

		$.ajax({
            url: "{{route('get_data_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
				var leads = data.leads;
				var ops = data.ops;
				var web = data.web;
				var html = "";
				var htmll = "";
				var htmlll = "";
				var no=1;
				var no1=1;
				for (i = 0; i < leads.length; i++) {
					html += '<tr>'
						html += '<td>'+no+'</td>'
						html += '<td>'+leads[i]['name']+'</td>'
					html += '</tr>'
					no++;
				}

				for (i = 0; i < ops.length; i++) {
					htmll += '<tr>'
						htmll += '<td>'+no1+'</td>'
						htmll += '<td>'+ops[i]['name']+'</td>'
					htmll += '</tr>'
					no1++;
				}

				htmlll += '<h5>Website Name: '+web[0]["web_name"]+'</h5>'

                $('#web_assign_leads').append(html);
                $('#web_assign_ops').append(htmll);
                $('#web_name_detail').append(htmlll);
            }
        });
		
	})
	$(document).on('click', '.edit_assign_website', function(){
		$('#web_assign_edit_leads').empty();
		$('#web_assign_edit_ops').empty();
		$('#web_name_detail_edit').empty();
		var id = $(this).data("id");

		$.ajax({
            url: "{{route('get_data_edit_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
				var leads = data.leads;
				var ops = data.ops;
				var web = data.web;
				var cek_lead = data.cek_lead;
				var cek_op = data.cek_op;
				var web = data.web;
				var html = "";
				var htmll = "";
				var htmlll = "";

				html += '<select multiple class="form-control" name="website_assigning_edit_leads" id="website_assigning_edit_leads">'
					for (i = 0; i < leads.length; i++) {
						if (jQuery.inArray(leads[i]['id'].toString(), cek_lead)!== -1) {
							html += '<option value="'+leads[i]['id']+'" selected> '+leads[i]['name']+' </option>'
						} else {
							html += '<option value="'+leads[i]['id']+'"> '+leads[i]['name']+' </option>'
						}
					}
					
				html +=	'</select>'
				htmll += '<select multiple class="form-control" name="website_assigning_edit_ops" id="website_assigning_edit_ops">'
					for (i = 0; i < ops.length; i++) {
						if (jQuery.inArray(ops[i]['id'].toString(), cek_op)!== -1) {
							htmll += '<option value="'+ops[i]['id']+'" selected> '+ops[i]['name']+' </option>'
						} else {
							htmll += '<option value="'+ops[i]['id']+'"> '+ops[i]['name']+' </option>'
						}
					}
				htmll +=	'</select>'

				htmlll += '<h5>Website Name: '+web[0]["web_name"]+'</h5>'

                $('#web_assign_edit_leads').append(html);
                $('#web_assign_edit_ops').append(htmll);
				$('#web_name_detail_edit').append(htmlll);
				$('#web_id').val(id)
            }
        });
	})
	$(document).on('click', '.assign_website_edit_process', function(){
		var leads = $('#website_assigning_edit_leads').val()
		var ops = $('#website_assigning_edit_ops').val()
		var web_id = $('#web_id').val()

		$.ajax({
            url: "{{route('process_data_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				leaders:leads,
				operators:ops,
				id:web_id
            },
            dataType: "json",
            success: function (data) {
				alert("Success Assign Leaders/Operators to Website");
				$('.assign_website_edit_close').click()
            }
        });
	})


	$(document).on('click', '.modal8', function () {
        $('#tbl_depo_wd').empty();
        $.ajax({
            url: "{{route('get_web')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].web_name + '</td>';
                    html += '<td><button class="btn btn-sm btn-primary detail_depowd" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaldepowd">Depo / WD / Bonus</button></td>';
                    // html += '<td><button class="btn btn-sm btn-success bonus_user" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modalbonus">Bonus</button></td>';
                    // html +='<td><a class="btn btn-sm btn-danger del_web" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                    html += '</tr>';
                    no++;
                }
                $('#tbl_depo_wd').append(html);
                $("#tbl_depo_wd_list").DataTable();
            }
        });
    })
	$(document).on('click', '.detail_depowd', function () {
		$('#banks_div').empty();
		$('#users_div').empty();
		$("input[name='inlineRadioOptionsMoney']").prop('checked', false);
		$('#amount_depowd').empty();
		var id = $(this).data("id");
		var customer = [];
		var bank = [];

		$.ajax({
            url: "{{route('get_data_trx')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
				var banks = data.banks;
				var customers = data.customers;
				var bank = banks; 
				var customer = customers; 
				var html = "";
				var htmll = "";

				html += '<input id="InputUser" class="form-control" type="text" name="InputUser" placeholder="Users">';

				for (let i = 0; i < banks.length; i++) {
					// htmll += '<button class="btn btn-sm btn-bank" style="border=1px solid;"> <img src="{{ asset("img/icon-bank.jpg") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"]+'</button>';
					// htmll += '<label>'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"]+'</label><br>'
					htmll += '<div class="col-md-6">'
						htmll += '<label>';
							htmll += '<div class="form-check form-check-inline">';
								htmll += '<input class="form-check-input" type="radio" name="inlineRadioOptions" id="bank'+i+'" value="'+banks[i]["id"]+'">';
								htmll += '<img src="{{ asset("img/icon-bank.png") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"];
							htmll += '</div>';
						htmll += '</label>';
					htmll += '</div>';
				}



				
				$('#users_div').append(html);
				$('#banks_div').append(htmll);
				$('#web_id_depo_wd').val(id);

				autocomplete(document.getElementById("InputUser"), customer);

            }
        });
	})
	$(document).on('click', '.depo_wd_process', function () {

		var user = $('#InputUser').val();
		var amount = $('#amount_depowd').val();
		var type = $("input[name='inlineRadioOptionsMoney']:checked").val()
		var bank = $("input[name='inlineRadioOptions']:checked").val()
		var web = $('#web_id_depo_wd').val();

		$.ajax({
            url: "{{route('trx_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				web:web,
				user:user,
				amount:amount,
				type:type,
				bank:bank
            },
            dataType: "json",
            success: function (data) {
				alert('Success submit transaction!');
				$('.depo_wd_close').click();

            }
        });
	})

	$(document).on('click', '.modal9', function () {
        $('#tbl_pending').empty();
        $.ajax({
            url: "{{route('get_data_pending')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].status + '</td>';
					html += '<td>' + data[i].trx_name + '</td>';
					html += '<td>' + data[i].bank_name + '</td>';
					html += '<td>' + data[i].acc_no + '</td>';
					html += '<td>' + formatNumber(data[i].amount) + '</td>';
					if (data[i].status == "Pending") {
						html += '<td><button class="btn btn-sm btn-primary pending_depowd" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaldepowdpending">Depo/WD</button></td>';
                    	html += '<td><button class="btn btn-sm btn-danger beban_depowd" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modalbeban">Costs</button></td>';	
					} else {
						html += '<td><button class="btn btn-sm btn-primary pending_depowd" data-id="" data-toggle="modal" disabled>Depo/WD</button></td>';
                    	html += '<td><button class="btn btn-sm btn-danger beban_depowd" data-id="" data-toggle="modal" disabled>Costs</button></td>';
					}
                    
                    // html +='<td><a class="btn btn-sm btn-danger del_web" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                    html += '</tr>';
                    no++;
                }
                $('#tbl_pending').append(html);
                $("#tbl_pending_list").DataTable();
            }
        });
    })
	$(document).on('click', '.modaladdnewpending', function () {
		$('#banks_pending_div').empty();
		$("input[name='inlineRadioOptionsMoney']").prop('checked', false);
		$('#user_pending').empty();
		$('#amount_pending').empty();

		$.ajax({
            url: "{{route('get_data_pending_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
            },
            dataType: "json",
            success: function (data) {
				var banks = data.banks;
				var bank = banks;
				var htmll = "";

				for (let i = 0; i < banks.length; i++) {
					// htmll += '<button class="btn btn-sm btn-bank" style="border=1px solid;"> <img src="{{ asset("img/icon-bank.jpg") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"]+'</button>';
					// htmll += '<label>'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"]+'</label><br>'
					htmll += '<div class="col-md-6">'
						htmll += '<label>';
							htmll += '<div class="form-check form-check-inline">';
								htmll += '<input class="form-check-input" type="radio" name="inlineRadioOptions" id="bank'+i+'" value="'+banks[i]["id"]+'">';
								htmll += '<img src="{{ asset("img/icon-bank.png") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"];
							htmll += '</div>';
						htmll += '</label>';
					htmll += '</div>';
				}
				$('#banks_pending_div').append(htmll);
            }
        });
	})
	$(document).on('click', '.pending_process', function () {

		var user = $('#user_pending').val();
		var amount = $('#amount_pending').val();
		var bank = $("input[name='inlineRadioOptions']:checked").val()

		$.ajax({
			url: "{{route('pending_process')}}",
			type: "POST",
			data: {
				_token: "{{ csrf_token() }}",
				user:user,
				amount:amount,
				bank:bank
			},
			dataType: "json",
			success: function (data) {
				alert('Success submit pending transaction!');
				$('.pending_close').click();
				get_pending();
			}
		});
	})
	$(document).on('click', '.pending_depowd', function () {
		$('#banks_div_pending_depowd').empty();
		$('#users_div_pending_depowd').empty();
		$('#website_div_pending_depowd').empty();
		$("input[name='inlineRadioOptionsMoneyPending']").prop('checked', false);
		$('#amount_pending_depowd').empty();
		var id = $(this).data("id");
		var customer_pending = [];
		var bank = [];

		$.ajax({
            url: "{{route('get_data_pending_depowd')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
				var banks = data.banks;
				var webs = data.website;
				var customers = data.customers;
				var amount = data.amount;
				var bank = banks; 
				var customer_pending = customers;
				var active = data.active_bank;
				var html = "";
				var htmll = "";
				var htmlll = "";

				html += '<input id="InputUserPendingDepoWD" class="form-control" type="text" name="InputUserPendingDepoWD" placeholder="Users">';

				for (let i = 0; i < banks.length; i++) {
					// htmll += '<button class="btn btn-sm btn-bank" style="border=1px solid;"> <img src="{{ asset("img/icon-bank.jpg") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"]+'</button>';
					// htmll += '<label>'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"]+'</label><br>'
					htmll += '<div class="col-md-6">'
						htmll += '<label>';
							htmll += '<div class="form-check form-check-inline">';
								if(banks[i]['id'] == active){
									var status = "checked";
									var attr = "";
								}else{
									var status = "";
									var attr = "disabled";
								}
								htmll += '<input class="form-check-input" type="radio" name="inlineRadioOptionsBankPendingDepoWD" id="bank'+i+'" value="'+banks[i]["id"]+'" '+status+''+attr+'>';
								htmll += '<img src="{{ asset("img/icon-bank.png") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"];
							htmll += '</div>';
						htmll += '</label>';
					htmll += '</div>';
				}
				for (let j = 0; j < webs.length; j++) {

					htmlll += '<div class="col-md-6">'
						htmlll += '<label>';
							htmlll += '<div class="form-check form-check-inline">';
								htmlll += '<input class="form-check-input" type="radio" name="inlineRadioOptionsPendingWeb" id="web'+j+'" value="'+webs[j]["id"]+'"">';
								htmlll += '<img src="{{ asset("img/web-icon.png") }}" style="max-width: 25px;">'+webs[j]["web_name"];
							htmlll += '</div>';
						htmlll += '</label>';
					htmlll += '</div>';
				}


				
				$('#users_div_pending_depowd').append(html);
				$('#banks_div_pending_depowd').append(htmll);
				$('#website_div_pending_depowd').append(htmlll);
				$('#amount_pending_depowd').val(amount);
				$('#pending_trx_id').val(id);

				autocomplete(document.getElementById("InputUserPendingDepoWD"), customer_pending);

            }
        });
	})
	$(document).on('click', '.beban_depowd', function () {
		$('#banks_div_pending_cost').empty();
		$('#users_depowd_pending_div').empty();
		$("input[name='inlineRadioOptionsMoneyPending']").prop('checked', false);
		$('#amount__depowd_pending_').empty();
		var id = $(this).data("id");
		var customer_pending = [];
		var bank = [];

		$.ajax({
            url: "{{route('get_data_pending_cost')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
				var banks = data.banks;
				var webs = data.website;
				var customers = data.customers;
				var amount = data.amount;
				var bank = banks; 
				var customer_pending = customers;
				var active = data.active_bank;
				var html = "";
				var htmll = "";
				var htmlll = "";

				html += '<input id="InputUserPendingDepoWD" class="form-control" type="text" name="InputUserPendingDepoWD" placeholder="Users">';

				for (let i = 0; i < banks.length; i++) {
					htmll += '<div class="col-md-6">'
						htmll += '<label>';
							htmll += '<div class="form-check form-check-inline">';
								if(banks[i]['id'] == active){
									var status = "checked";
									var attr = "";
								}else{
									var status = "";
									var attr = "disabled";
								}
								htmll += '<input class="form-check-input" type="radio" name="inlineRadioOptionsPending" id="bank'+i+'" value="'+banks[i]["id"]+'" '+status+''+attr+'>';
								htmll += '<img src="{{ asset("img/icon-bank.png") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"];
							htmll += '</div>';
						htmll += '</label>';
					htmll += '</div>';
				}



				$('#banks_div_pending_cost').append(htmll);
				$('#amount_pending_cost').val(amount);
				$('#pending_cost_id').val(id);

            }
        });
	})
	$(document).on('click', '.depo_wd_pending_process', function () {
		var id = $('#pending_trx_id').val();
		var user = $('#InputUserPendingDepoWD').val();
		var amount = $('#amount_pending_depowd').val();
		var type = $("input[name='inlineRadioOptionsMoneyPending']:checked").val()
		var bank = $("input[name='inlineRadioOptionsBankPendingDepoWD']:checked").val()
		var web = $("input[name='inlineRadioOptionsPendingWeb']:checked").val()

		$.ajax({
            url: "{{route('pending_depowd_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				web:web,
				user:user,
				amount:amount,
				type:type,
				bank:bank,
				id_pending:id
            },
            dataType: "json",
            success: function (data) {
				alert('Success submit transaction!');
				$('.depo_wd__pending_close').click();
				get_pending();
            }
        });
	})
	$(document).on('click', '.beban_pending_process', function () {
		$('inlineRadioOptionsPending').empty();
		$('amount_pending_cost').empty();
		$('pending_note_cost').empty();

		var id = $('#pending_cost_id').val();
		var note = $('#pending_note_cost').val();
		var amount = $('#amount_pending_cost').val();
		var bank = $("input[name='inlineRadioOptionsPending']:checked").val();

		$.ajax({
            url: "{{route('cost_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				note:note,
				bank:bank,
				amount:amount,
				id_pending:id
            },
            dataType: "json",
            success: function (data) {
				alert('Success submit transaction!');
				$('.beban_pending_close').click();
				get_pending();
            }
        });
	})


	$(document).on('click', '.modal10', function () {
        $('#tbl_add_deduct_coins').empty();
        $.ajax({
            url: "{{route('get_data_add_deduct_coin')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].web_name + '</td>';
					html += '<td>' + formatNumber(data[i].init_coin) + '</td>';
					html += '<td><button class="btn btn-sm btn-primary add_coins" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaladdcoins">Add Coins</button></td>';
					html += '<td><button class="btn btn-sm btn-danger deduct_coins" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaldeductcoins">Deduct Coins</button></td>';	
					html += '</tr>';
                    no++;
                }
                $('#tbl_add_deduct_coins').append(html);
                $("#tbl_add_deduct_coins_list").DataTable();
            }
        });
    })
	$(document).on('click', '.add_coins', function () {
		$('#req_amount_add_coin').val('');
		var id = $(this).data("id");
		$.ajax({
            url: "{{route('get_data_add_deduct_coin_detail')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;

                $('#web_name_add').val(data[0]["web_name"]);
                $("#avail_coins_add").val(formatNumber(data[0]["init_coin"]));
                $("#web_id_add").val(data[0]["id"]);
            }
        });
	})
	$(document).on('click', '.deduct_coins', function () {
		$('#req_amount_deduct_coin').val('');
		var id = $(this).data("id");
		$.ajax({
            url: "{{route('get_data_add_deduct_coin_detail')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;

                $('#web_name_deduct').val(data[0]["web_name"]);
                $("#avail_coins_deduct").val(formatNumber(data[0]["init_coin"]));
                $("#web_id_deduct").val(data[0]["id"]);
            }
        });
	})
	$(document).on('click', '.add_coins_process', function () {
		var id = $("#web_id_add").val();
		var amount = $('#req_amount_add_coin').val();

		$.ajax({
            url: "{{route('add_coin_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id,
				amount:amount
            },
            dataType: "json",
            success: function (data) {
				alert("Success submit request!");
				$('.add_coins_close').click();
				get_add_deduct_coin()
            }
        });
		
		
	})
	$(document).on('click', '.deduct_coins_process', function () {
		var id = $("#web_id_deduct").val();
		var amount = $('#req_amount_deduct_coin').val();
		$.ajax({
            url: "{{route('deduct_coin_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id,
				amount:amount
            },
            dataType: "json",
            success: function (data) {

				if(data.message == "error"){
					alert("Requested amount bigger than available coins!");
				}else{
					alert("Success submit request!");
					$('.deduct_coins_close').click();
					get_add_deduct_coin()
				}

            }
        });
	})

	$(document).on('click', '.modal11', function () {
        $('#tbl_add_deduct_balance').empty();
        $.ajax({
            url: "{{route('get_data_add_deduct_balance')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].bank_name + '</td>';
                    html += '<td>' + data[i].acc_no + '</td>';
					html += '<td>' + formatNumber(data[i].saldo) + '</td>';
					html += '<td><button class="btn btn-sm btn-primary add_balance" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaladdbalance">Add Balance</button></td>';
					html += '<td><button class="btn btn-sm btn-danger deduct_balance" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modaldeductbalance">Deduct Balance</button></td>';	
					html += '</tr>';
                    no++;
                }
                $('#tbl_add_deduct_balance').append(html);
                $("#tbl_add_deduct_balance_list").DataTable();
            }
        });
    })
	$(document).on('click', '.add_balance', function () {
		$('#req_amount_add_balance').val('');
		var id = $(this).data("id");
		$.ajax({
            url: "{{route('get_data_add_deduct_balance_detail')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;

                $('#bank_name_add').val(data[0]["bank_name"]);
                $("#acc_no_add").val(data[0]["acc_no"]);
                $("#bank_id_add").val(data[0]["id"]);
                $("#avail_balance_add").val(formatNumber(data[0]["saldo"]));
            }
        });
	})
	$(document).on('click', '.deduct_balance', function () {
		$('#req_amount_deduct_balance').val('');
		var id = $(this).data("id");
				$.ajax({
            url: "{{route('get_data_add_deduct_balance_detail')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;

                $('#bank_name_deduct').val(data[0]["bank_name"]);
                $("#acc_no_deduct").val(data[0]["acc_no"]);
				$("#bank_id_deduct").val(data[0]["id"]);
                $("#avail_balance_deduct").val(formatNumber(data[0]["saldo"]));
            }
        });
	})
	$(document).on('click', '.add_balance_process', function () {
		var id = $("#bank_id_add").val();
		var amount = $("#req_amount_add_balance").val();
		$.ajax({
            url: "{{route('add_balance_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id,
				amount:amount
            },
            dataType: "json",
            success: function (data) {
				alert("Success submit request!");
				$('.add_balance_close').click();
				get_add_deduct_balance()
            }
        });
	})
	$(document).on('click', '.deduct_balance_process', function () {
		var id = $("#bank_id_deduct").val();
		var amount = $("#req_amount_deduct_balance").val();
		$.ajax({
            url: "{{route('deduct_balance_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:id,
				amount:amount
            },
            dataType: "json",
            success: function (data) {
				if(data.message == "error"){
					alert("Requested amount bigger than available coins!");
				}else{
					alert("Success submit request!");
					$('.deduct_balance_close').click();
					get_add_deduct_balance()
				}
            }
        });
	})

    $(document).on('click', '.modal12', function () {
        $('#tbl_cashback').empty();
        $.ajax({
            url: "{{route('get_cashback')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].trx_number + '</td>';
                    html += '<td><button class="btn btn-sm btn-primary cashback_detail" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modalcashbackdetail">Detail</button></td>';	
					html += '</tr>';
                    no++;
                }
                $('#tbl_cashback').append(html);
                $("#tbl_cashback_list").DataTable();
            }
        });
    })
    $(document).on('click', '.addnewcashback', function () {
        $('#users_div_cashback').empty();
        $('#web_div_cashback_single').empty();
        $('#web_div_cashback_multiple').empty();

        $.ajax({
            url: "{{route('get_data_cashback')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var customers = data.custs;
                var banks = data.banks;
                var webs = data.webs
				var bank = banks;
				var customer = customers;
				var html = "";
				var htmll = "";
				var htmlll = "";

				html += '<input id="InputUser" class="form-control" type="text" name="InputUser" placeholder="Users">';

				for (let i = 0; i < webs.length; i++) {
					htmll += '<div class="col-md-6">'
						htmll += '<label>';
							htmll += '<div class="form-check form-check-inline">';
								htmll += '<input class="form-check-input" type="radio" name="inlineRadioOptionsCashbackSingle" id="web'+i+'" value="'+webs[i]["id"]+'">';
								htmll += '<img src="{{ asset("img/web-icon.png") }}" style="max-width: 25px;">'+webs[i]["web_name"]
							htmll += '</div>';
						htmll += '</label>';
					htmll += '</div>';
				}
				for (let j = 0; j < webs.length; j++) {
					htmlll += '<div class="col-md-6">'
						htmlll += '<label>';
							htmlll += '<div class="form-check form-check-inline">';
								htmlll += '<input class="form-check-input" type="radio" name="inlineRadioOptionsCashbackMulti" id="web'+j+'" value="'+webs[j]["id"]+'">';
								htmlll += '<img src="{{ asset("img/web-icon.png") }}" style="max-width: 25px;">'+webs[j]["web_name"]
							htmlll += '</div>';
						htmlll += '</label>';
					htmlll += '</div>';
				}
				$('#users_div_cashback').append(html);
				$('#web_div_cashback_single').append(htmll);
				$('#web_div_cashback_multiple').append(htmlll);

				autocomplete(document.getElementById("InputUser"), customer);
            }
        });
    })
    $(document).on('click', '.cashback_single_process', function () {
        var user_id = $('#InputUser').val();
        var amount = $('#amount_add_cashback').val();
        var type = $('#cashback_single').val();
        var web = $("input[name='inlineRadioOptionsCashbackSingle']:checked").val();

        $.ajax({
            url: "{{route('single_cashback_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
				id:user_id,
				amount:amount,
				type:type,
				web:web
            },
            dataType: "json",
            success: function (data) {
                alert('Success Submit Cashback');
				$('.cashback_close').click();
				get_cashback_list()
            }
        });
    })
    $(document).on('click', '.cashback_detail', function () {
        $('#trx_number_detail_cashback').val('');
        $('#user_id_detail_cashback').val('');
        $('#amount_detail_cashback').val('');
        $('#web_name_detail_cashback').val('');

        var id = $(this).data("id");

        $.ajax({
            url: "{{route('get_data_cashback_detail')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id:id
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                $('#trx_number_detail_cashback').val(data[0].trx_number);
                $('#user_id_detail_cashback').val(data[0].user_id);
                $('#amount_detail_cashback').val(formatNumber(data[0].amount));
                $('#web_name_detail_cashback').val(data[0].web_name);
            }
        });

    })
    $('#form_cashback_multi').on('submit', function (e) {
        e.preventDefault();
        var type = $('#cashback_multi').val();
        var web = $("input[name='inlineRadioOptionsCashbackMulti']:checked").val();

        $.ajax({
            url: "{{route('multi_cashback_process')}}",
            type: "POST",
            data: new FormData(this),
            dataType: "json",
            contentType:false,
            cache: false,
            processData: false,
            success: function (data) {

            }
        });
    })

    $(document).on('click', '.modal13', function () {
        $('#tbl_bank_master').empty();
        $.ajax({
            url: "{{route('get_bank_master')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}"
            },
            dataType: "json",
            success: function (data) {
                var data = data.data;
                var html = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    html += '<tr>';
                    html += '<td>' + no + '</td>';
                    html += '<td>' + data[i].bank_master_name + '</td>';
                    html += '<td>' + data[i].bank_master_alias + '</td>';
                    html += '<td><button class="btn btn-sm btn-primary bank_master_edit" data-id="' + data[i].id +'"data-toggle="modal" data-target="#modalbankmasteredit">Edit</button></td>';	
                    html += '<td><button class="btn btn-sm btn-danger del_data" data-type="bank_master" data-id="' +data[i].id +'"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
					html += '</tr>';
                    no++;
                }
                $('#tbl_bank_master').append(html);
                $("#tbl_bank_master_list").DataTable();
            }
        });
    })
    $(document).on('click', '.addnewbankmaster', function () {
        $('#bank_master_name').val('');
        $('#bank_master_alias').val('');
    })
    $(document).on('click', '.master_bank_process', function () {
        var bank_master_name = $('#bank_master_name').val();
        var bank_master_alias = $('#bank_master_alias').val();

        $.ajax({
            url: "{{route('add_bank_master')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                bank_master_name: bank_master_name,
                bank_master_alias: bank_master_alias
            },
            dataType: "json",
            success: function (data) {

                if (data.message == "success") {
                    alert("Success Add Bank Master");
                    $('.master_bank_close').click();
                    get_bank_master();
                } else {
                    alert(data.data);
                }
            }
        });
    })
    $(document).on('click', '.bank_master_edit', function () {
        $('#bank_master_name_edit').val('');
        $('#bank_master_alias_edit').val('');
        var id = $(this).data("id");

        $.ajax({
            url: "{{route('get_bank_master_edit')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id:id
            },
            dataType: "json",
            success: function (data) {
                $('#bank_master_name_edit').val(data.data[0].bank_master_name);
                $('#bank_master_alias_edit').val(data.data[0].bank_master_alias);
                $('#master_bank_edit_id').val(data.data[0].id);
            }
        });
    })
    $(document).on('click', '.master_bank_edit_process', function () { 
        var bank_master_name = $('#bank_master_name_edit').val();
        var bank_master_alias = $('#bank_master_alias_edit').val();
        var id = $('#master_bank_edit_id').val();

        $.ajax({
            url: "{{route('get_bank_master_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                bank_master_name: bank_master_name,
                bank_master_alias: bank_master_alias,
                id:id
            },
            dataType: "json",
            success: function (data) {

                if (data.message == "success") {
                    alert("Success Edit Bank Master");
                    $('.master_bank_edit_close').click();
                    get_bank_master();
                } else {
                    alert(data.data);
                }
            }
        });
    })

</script>
@endsection
