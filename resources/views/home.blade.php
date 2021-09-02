@extends('layouts.app')

@section('content')

<div class="container">
    <h5><b>Initial Setup</b></h5>
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-xl-2">
                        <a href="#modal5" data-toggle="modal" data-target="#modal5" class="small-box-footer modal5">
                            <div class="small-box bg-info"
                                style="background-image: url('https://png.pngtree.com/element_our/png_detail/20181114/bank-icon-png_239804.jpg');background-size: cover;height: 145px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>Banks</h6>
                    </div>
                    <div class="col-xl-2">
                        <a href="#modal1" data-toggle="modal" data-target="#modal1" class="small-box-footer modal1">
                            <div class="small-box bg-info"
                                style="background-image: url('https://thumbs.dreamstime.com/b/www-internet-icon-search-bar-website-eps-148122440.jpg');background-size: cover;height: 145px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>Websites</h6>
                    </div>
                    <div class="col-xl-2">
                        <a href="#modal2" data-toggle="modal" data-target="#modal2" class="small-box-footer modal2">
                            <div class="small-box bg-info"
                                style="background-image: url('https://img.flaticon.com/icons/png/512/30/30355.png?size=1200x630f&pad=10,10,10,10&ext=png&bg=FFFFFFFF');background-size: cover;height: 145px;border-radius:100%;background-position: center;">
                            </div>
                        </a>
                        <h6>Leaders</h6>
                    </div>
                    <div class="col-xl-2">
                        <a href="#modal3" data-toggle="modal" data-target="#modal3" class="small-box-footer modal3">
                            <div class="small-box bg-info"
                                style="background-image: url('https://i.pinimg.com/originals/d5/b0/4c/d5b04cc3dcd8c17702549ebc5f1acf1a.png');background-size: cover;height: 145px;border-radius:100%;background-position: center;">
                            </div>
                        </a>
                        <h6>Operators</h6>
                    </div>
                    <div class="col-xl-2">
                        <a href="#modal4" data-toggle="modal" data-target="#modal4" class="small-box-footer modal4">
                            <div class="small-box bg-info"
                                style="background-image: url('https://cdn3.vectorstock.com/i/1000x1000/33/82/buyer-with-shopping-bags-line-icon-customer-sign-vector-31643382.jpg');background-size: cover;height: 145px;border-radius:100%;background-position: center;">
                            </div>
                        </a>
                        <h6>Customers</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h5><b>Assign</b></h5>
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-xl-2">
                        <a href="#modal6" data-toggle="modal" data-target="#modal6" class="small-box-footer modal6">
                            <div class="small-box bg-info"
                                style="background-image: url('https://png.pngtree.com/element_our/png_detail/20181114/bank-icon-png_239804.jpg');background-size: cover;height: 145px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>Assign Websites to Banks</h6>
                    </div>
					<div class="col-xl-2">
                        <a href="#modal7" data-toggle="modal" data-target="#modal7" class="small-box-footer modal7">
                            <div class="small-box bg-info"
                                style="background-image: url('https://thumbs.dreamstime.com/b/www-internet-icon-search-bar-website-eps-148122440.jpg');background-size: cover;height: 145px;border-radius:100%;">
                            </div>
                        </a>
                        <h6>Assign Leaders/Operators to Websites</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h5><b>Transactions</b></h5>
    <div class="row">
        <div class="card" style="width: 100%">
            <div class="card-body">
                <div class="row text-center">
                    <div class="col-xl-2">
                        <a href="#modal8" data-toggle="modal" data-target="#modal8" class="small-box-footer modal8">
                            <div class="small-box bg-info"
                                style="background-image: url('https://static.thenounproject.com/png/488117-200.png');background-size: cover;height: 145px;background-position: center;border-radius:100%;">
                            </div>
                        </a>
						<h6>Deposit / Withdrawal</h6>
                    </div>
                    <div class="col-xl-2">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>

                                <p>Add / Deduct</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
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
                        <button class="btn btn-sm btn-primary" data-toggle="modal"
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
                        <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewbank">Add
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
                        <input class="form-control" type="number" name="init_coin_edit" id="init_coin_edit">
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
                        <input class="form-control" type="text" name="bank_name" id="bank_name">
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
                        <input class="form-control" type="text" name="bank_name_edit" id="bank_name_edit">
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
				<div class="row mb-2">
					<div class="col-md-4">
						Leaders
					</div>
					<div class="col-md-8">
						<div id="web_assign_edit_leads"></div>
					</div>
				</div>
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
                <h5 class="modal-title" id="exampleModalLabel">Form Depo/WD</h5>
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
							<div class="col-md-6">
								<label style="background-color: lightblue; border-radius: 10px;width: 130px">
									<div class="form-check form-check-inline">
										<input class="form-check-input-money" type="radio" name="inlineRadioOptionsMoney" id="depo" value="deposit">
										<img src="{{ asset("img/moneyIn.png") }}" style="max-width: 25px;margin-top: 5px;">
									</div>
									Deposit
								</label>
							</div>
							<div class="col-md-6">
								<label style="background-color: lightcoral; border-radius: 10px;width: 130px">
									<div class="form-check form-check-inline">
										<input class="form-check-input-money" type="radio" name="inlineRadioOptionsMoney" id="wd" value="withdrawal">
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
						<input class="form-control" type="number" name="amount" id="amount">
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


@endsection

@section('footer')

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
                console.log(data);
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
                console.log(data);
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

        $.ajax({
            url: "{{route('add_leader')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                name: leader_name,
                email: leader_email,
                password: leader_pass
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
            }
        });
    })
    $(document).on('click', '.edit_leader_process', function () {
        var id = $('#id_leader_edit').val();
        var name = $('#leader_name_edit').val();
        var email = $('#leader_email_edit').val();
        $.ajax({
            url: "{{route('leader_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                name: name,
                email: email
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
                console.log(data);
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

        $.ajax({
            url: "{{route('add_operator')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                name: operator_name,
                email: operator_email,
                password: operator_pass
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
            }
        });
    })
    $(document).on('click', '.edit_operator_process', function () {
        var id = $('#id_operator_edit').val();
        var name = $('#operator_name_edit').val();
        var email = $('#operator_email_edit').val();
        $.ajax({
            url: "{{route('operator_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                name: name,
                email: email
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
                $("#tbl_customer_list").DataTable();
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
                holder_name:holder_name
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
				id:id
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
                console.log(data);
                var htmll = "";
                var no = 1;

                for (i = 0; i < data.length; i++) {
                    htmll += '<tr>';
                    htmll += '<td>' + no + '</td>';
                    htmll += '<td>' + data[i].bank_name + '</td>';
                    htmll += '<td>' + data[i].acc_no + '</td>';
                    htmll += '<td>' + data[i].holder_name + '</td>';
                    htmll += '<td>' + formatNumber(data[i].saldo) + '</td>';
                    htmll += '<td><button class="btn btn-sm btn-primary edit_bank" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaleditbank">Edit</button></td>';
                    htmll +=
                        '<td><button class="btn btn-sm btn-danger del_data" data-type="bank" data-id="' +
                        data[i].id +
                        '"data-toggle="modal" data-target="#modaldelete">Delete</button></td>';
                    htmll += '</tr>';
                    no++;
                }
                $('#tbl_bank').append(htmll);
                $("#tbl_bank_list").DataTable();
            }
        });
    })
    $(document).on('click', '.add_bank', function () {
        var bank_name = $('#bank_name').val();
        var acc_no = $('#acc_no').val();
        var holder_name = $('#holder_name').val();
        var saldo = $('#saldo').val();

        $.ajax({
            url: "{{route('add_bank')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                bank_name: bank_name,
                acc_no: acc_no,
                holder_name: holder_name,
                saldo: saldo
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
                $('#bank_name_edit').val(data.data[0].bank_name);
                $('#acc_no_edit').val(data.data[0].acc_no);
                $('#holder_name_edit').val(data.data[0].holder_name);
                $('#saldo_edit').val(data.data[0].saldo);
                $('#id_bank_edit').val(data.data[0].id);
            }
        });
    })
    $(document).on('click', '.edit_bank_process', function () {
        var bank_name = $('#bank_name_edit').val();
        var acc_no = $('#acc_no_edit').val();
        var holder_name = $('#holder_name_edit').val();
        var saldo = $('#saldo_edit').val();
        var id = $('#id_bank_edit').val();
        $.ajax({
            url: "{{route('bank_edit_process')}}",
            type: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                bank_name: bank_name,
                acc_no: acc_no,
                holder_name: holder_name,
                saldo: saldo
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
					for (i = 0; i < webs.length; i++) {
						html += '<option value="'+webs[i]['id']+'"> '+webs[i]['web_name']+' </option>'
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
				console.log(leads);
				console.log(ops);
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
				var html = "";
				var htmll = "";
				var htmlll = "";

				html += '<select multiple class="form-control" name="website_assigning_edit_leads" id="website_assigning_edit_leads">'
					for (i = 0; i < leads.length; i++) {
						html += '<option value="'+leads[i]['id']+'"> '+leads[i]['name']+' </option>'
					}
				html +=	'</select>'
				htmll += '<select multiple class="form-control" name="website_assigning_edit_ops" id="website_assigning_edit_ops">'
					for (i = 0; i < ops.length; i++) {
						htmll += '<option value="'+ops[i]['id']+'"> '+ops[i]['name']+' </option>'
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
                    html += '<td><button class="btn btn-sm btn-primary detail_depowd" data-id="' + data[
                            i].id +
                        '"data-toggle="modal" data-target="#modaldepowd">Depo/WD</button></td>';
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
		$('#amount').empty();
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
								htmll += '<img src="{{ asset("img/icon-bank.jpg") }}" style="max-width: 25px;">'+banks[i]["bank_name"]+' - '+banks[i]["acc_no"];
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
		var amount = $('#amount').val();
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



</script>
@endsection
