@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-5">
        <div class="col-xl-2">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$count_web}}</h3>
  
                  <p>Banks</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#modal5" data-toggle="modal" data-target="#modal5" class="small-box-footer modal5">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>        
        </div>        
        <div class="col-xl-2">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$count_web}}</h3>
  
                  <p>Websites</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#modal1" data-toggle="modal" data-target="#modal1" class="small-box-footer modal1">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>        
        </div>        
        <div class="col-xl-2">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$count_leader}}</h3>
  
                  <p>Leaders</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#modal2" data-toggle="modal" data-target="#modal2" class="small-box-footer modal2">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$ops_count}}</h3>
  
                  <p>Operators</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#modal3" data-toggle="modal" data-target="#modal3" class="small-box-footer modal3">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>{{$cust_count}}</h3>
  
                  <p>Customers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#modal4" data-toggle="modal" data-target="#modal4" class="small-box-footer modal4">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
  
                  <p>DEPO / WD</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
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
        <div class="col-12"></div>
    </div>
</div>




<!-- Modal 1 -->
<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Websites</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12 text-right">
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewweb">Add New Website</button>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-12 text-right">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewleader">Add New Leader</button>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12 text-right">
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewoperator">Add New Operator</button>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12 text-right">
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewcustomer">Add New Customer</button>
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
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
              <div class="col-md-12 text-right">
                  <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaladdnewbank">Add New Bank</button>
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











<!-- Modal Add Web -->
<div class="modal fade" id="modaladdnewweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Website</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
<div class="modal fade" id="modaleditweb" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Website</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
<div class="modal fade" id="modaladdnewleader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Website</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
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
<div class="modal fade" id="modaleditleader" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Leader</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
<div class="modal fade" id="modaladdnewoperator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
<div class="modal fade" id="modaleditoperator" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Operator</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
<div class="modal fade" id="modaladdnewcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
                  <h6>Email</h6>
              </div>
              <div class="col-md-10">
                  <input class="form-control" type="email" name="customer_email" id="customer_email">
              </div>
          </div>
          <div class="row mt-1">
              <div class="col-md-2">
                  <h6>Password</h6>
              </div>
              <div class="col-md-10">
                  <input class="form-control" type="password" name="customer_pass" id="customer_pass">
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
<div class="modal fade" id="modaleditcustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Customer</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row mb-1">
            <div class="col-md-2">
                <h6>Customer Name</h6>
            </div>
            <div class="col-md-10">
                <input class="form-control" type="text" name="customer_name_edit" id="customer_name_edit">
            </div>
        </div>
        <div class="row mt-1">
            <div class="col-md-2">
                <h6>Email</h6>
            </div>
            <div class="col-md-10">
                <input class="form-control" type="email" name="customer_email_edit" id="customer_email_edit">
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
<div class="modal fade" id="modaladdnewbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Bank Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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
<div class="modal fade" id="modaleditbank" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Bank</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
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

@endsection

@section('footer')

    <script>
        function reload(){
          window.location.reload(false); 
        }
        function get_web(){
            $('#tbl_web').empty();
            $.ajax({
                url: "{{route('get_web')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    var html = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        html +='<tr>';
                            html +='<td>'+no+'</td>';
                            html +='<td>'+data[i].web_name+'</td>';
                            html +='<td>'+formatNumber(data[i].init_coin)+'</td>';
                            html +='<td><button class="btn btn-sm btn-primary edit_web" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditweb">Edit</button></td>';
                            html +='<td><a class="btn btn-sm btn-danger del_web" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                        html +='</tr>';
                        no++;
                    }
                    $('#tbl_web').append(html);
                    $("#tbl_web_list").DataTable();
                }
            });
        }
        function get_leader(){
            $('#tbl_leader').empty();
            $.ajax({
                url: "{{route('get_leader')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    var htmlll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmlll +='<tr>';
                            htmlll +='<td>'+no+'</td>';
                            htmlll +='<td>'+data[i].name+'</td>';
                            htmlll +='<td>'+data[i].email+'</td>';
                            htmlll +='<td><button class="btn btn-sm btn-primary edit_leader" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditleader">Edit</button></td>';
                            htmlll +='<td><a class="btn btn-sm btn-danger del_leader" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete Leader?`)">Delete</a></td>';
                        htmlll +='</tr>';
                        no++;
                    }
                    $('#tbl_leader').append(htmlll);
                    $("#tbl_leader_list").DataTable();
                }
            });
        }
        function get_operator(){
            $('#tbl_operator').empty();
            $.ajax({
                url: "{{route('get_operator')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    var htmlll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmlll +='<tr>';
                            htmlll +='<td>'+no+'</td>';
                            htmlll +='<td>'+data[i].name+'</td>';
                            htmlll +='<td>'+data[i].email+'</td>';
                            htmlll +='<td><button class="btn btn-sm btn-primary edit_operator" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditoperator">Edit</button></td>';
                            htmlll +='<td><a class="btn btn-sm btn-danger del_operator" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete operator?`)">Delete</a></td>';
                        htmlll +='</tr>';
                        no++;
                    }
                    $('#tbl_operator').append(htmlll);
                    $("#tbl_operator_list").DataTable();
                }
            });
        }
        function get_customer(){
            $('#tbl_customer').empty();
            $.ajax({
                url: "{{route('get_cust')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    var htmlll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmlll +='<tr>';
                            htmlll +='<td>'+no+'</td>';
                            htmlll +='<td>'+data[i].name+'</td>';
                            htmlll +='<td>'+data[i].email+'</td>';
                            htmlll +='<td><button class="btn btn-sm btn-primary edit_cust" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditcustomer">Edit</button></td>';
                            htmlll +='<td><a class="btn btn-sm btn-danger del_cust" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete operator?`)">Delete</a></td>';
                        htmlll +='</tr>';
                        no++;
                    }
                    $('#tbl_customer').append(htmlll);
                    $("#tbl_customer_list").DataTable();
                }
            });
        }
        function get_bank(){
          $('#tbl_bank').empty();
            $.ajax({
                url: "{{route('get_bank')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    console.log(data);
                    var htmll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmll +='<tr>';
                            htmll +='<td>'+no+'</td>';
                            htmll +='<td>'+data[i].bank_name+'</td>';
                            htmll +='<td>'+data[i].acc_no+'</td>';
                            htmll +='<td>'+data[i].holder_name+'</td>';
                            htmll +='<td>'+formatNumber(data[i].saldo)+'</td>';
                            htmll +='<td><button class="btn btn-sm btn-primary edit_bank" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditbank">Edit</button></td>';
                            htmll +='<td><a class="btn btn-sm btn-danger del_bank" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                        htmll +='</tr>';
                        no++;
                    }
                    $('#tbl_bank').append(htmll);
                    $("#tbl_bank_list").DataTable();
                }
            });
        }
        

        $(document).on('click', '.modal1', function(){
            $('#tbl_web').empty();
            $.ajax({
                url: "{{route('get_web')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    var html = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        html +='<tr>';
                            html +='<td>'+no+'</td>';
                            html +='<td>'+data[i].web_name+'</td>';
                            html +='<td>'+formatNumber(data[i].init_coin)+'</td>';
                            html +='<td><button class="btn btn-sm btn-primary edit_web" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditweb">Edit</button></td>';
                            html +='<td><a class="btn btn-sm btn-danger del_web" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                        html +='</tr>';
                        no++;
                    }
                    $('#tbl_web').append(html);
                    $("#tbl_web_list").DataTable();
                }
            });
        })
        $(document).on('click', '.add_web', function(){
            var name = $('#web_name').val();
            var coin = $('#init_coin').val();
            $.ajax({
                url: "{{route('add_web')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", web_name:name, init_coin:coin},
                dataType: "json",
                success: function(data) {
                    if(data.message == "success"){
                        alert("Success Add Website");
                        $('.add_web_close').click();
                        get_web();
                    }else{
                        alert(data.data);
                    }
                }
            });
        })        
        $(document).on('click', '.edit_web', function(){
            var id = $(this).data("id");
            $.ajax({
                url: "{{route('get_web_edit')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    $('#web_name_edit').val(data.data[0].web_name);
                    $('#init_coin_edit').val(data.data[0].init_coin);
                    $('#id_web_edit').val(data.data[0].id);
                }
            });
        })
        $(document).on('click', '.edit_web_process', function(){
            var id = $('#id_web_edit').val();
            var name = $('#web_name_edit').val();
            var coin = $('#init_coin_edit').val();
            $.ajax({
                url: "{{route('web_edit_process')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id, name:name, coin:coin},
                dataType: "json",
                success: function(data) {
                    alert("Success Edit Website");
                    $('.edit_web_close').click();
                    get_web();
                }
            });
        })
        $(document).on('click', '.del_web', function(){
            var id = $(this).data("id");

            $.ajax({
                url: "{{route('delete_web')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    alert("Success Delete Website");
                    $('.add_web_close').click();
                    get_web();

                }
            });
        })



        $(document).on('click', '.modal2', function(){
            $('#tbl_leader').empty();
            $.ajax({
                url: "{{route('get_leader')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    console.log(data);
                    var htmll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmll +='<tr>';
                            htmll +='<td>'+no+'</td>';
                            htmll +='<td>'+data[i].name+'</td>';
                            htmll +='<td>'+data[i].email+'</td>';
                            htmll +='<td><button class="btn btn-sm btn-primary edit_leader" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditleader">Edit</button></td>';
                            htmll +='<td><a class="btn btn-sm btn-danger delete_leader" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                        htmll +='</tr>';
                        no++;
                    }
                    $('#tbl_leader').append(htmll);
                    $("#tbl_leader_list").DataTable();
                }
            });
        }) 
        $(document).on('click', '.add_leader', function(){
            var leader_name = $('#leader_name').val();
            var leader_email = $('#leader_email').val();
            var leader_pass = $('#leader_pass').val();

            $.ajax({
                url: "{{route('add_leader')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", name:leader_name, email:leader_email, password:leader_pass},
                dataType: "json",
                success: function(data) {

                    if(data.message == "success"){
                        alert("Success Add Leader");
                        $('.add_leader_close').click();
                        get_leader();
                    }else{
                        alert(data.data);
                    }

                }
            });
        })
        $(document).on('click', '.edit_leader', function(){
            var id = $(this).data("id");
            $.ajax({
                url: "{{route('get_leader_edit')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    $('#leader_name_edit').val(data.data[0].name);
                    $('#leader_email_edit').val(data.data[0].email);
                    $('#id_leader_edit').val(data.data[0].id);
                }
            });
        })
        $(document).on('click', '.edit_leader_process', function(){
            var id = $('#id_leader_edit').val();
            var name = $('#leader_name_edit').val();
            var email = $('#leader_email_edit').val();
            $.ajax({
                url: "{{route('leader_edit_process')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id, name:name, email:email},
                dataType: "json",
                success: function(data) {
                    alert("Success Edit Leader");
                    $('.edit_leader_close').click();
                    get_leader();
                }
            });
        })
        $(document).on('click', '.del_leader', function(){
            var id = $(this).data("id");

            $.ajax({
                url: "{{route('delete_leader')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    alert("Success Delete Leader");
                    $('.add_leader_close').click();
                    get_leader();

                }
            });
        })


        $(document).on('click', '.modal3', function(){
            $('#tbl_operator').empty();
            $.ajax({
                url: "{{route('get_operator')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    console.log(data);
                    var htmll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmll +='<tr>';
                            htmll +='<td>'+no+'</td>';
                            htmll +='<td>'+data[i].name+'</td>';
                            htmll +='<td>'+data[i].email+'</td>';
                            htmll +='<td><button class="btn btn-sm btn-primary edit_operator" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditoperator">Edit</button></td>';
                            htmll +='<td><a class="btn btn-sm btn-danger delete_operator" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                        htmll +='</tr>';
                        no++;
                    }
                    $('#tbl_operator').append(htmll);
                    $("#tbl_operator_list").DataTable();
                }
            });
        }) 
        $(document).on('click', '.add_operator', function(){
            var operator_name = $('#operator_name').val();
            var operator_email = $('#operator_email').val();
            var operator_pass = $('#operator_pass').val();

            $.ajax({
                url: "{{route('add_operator')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", name:operator_name, email:operator_email, password:operator_pass},
                dataType: "json",
                success: function(data) {

                    if(data.message == "success"){
                        alert("Success Add operator");
                        $('.add_operator_close').click();
                        get_operator();
                    }else{
                        alert(data.data);
                    }

                }
            });
        })
        $(document).on('click', '.edit_operator', function(){
            var id = $(this).data("id");
            $.ajax({
                url: "{{route('get_operator_edit')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    $('#operator_name_edit').val(data.data[0].name);
                    $('#operator_email_edit').val(data.data[0].email);
                    $('#id_operator_edit').val(data.data[0].id);
                }
            });
        })
        $(document).on('click', '.edit_operator_process', function(){
            var id = $('#id_operator_edit').val();
            var name = $('#operator_name_edit').val();
            var email = $('#operator_email_edit').val();
            $.ajax({
                url: "{{route('operator_edit_process')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id, name:name, email:email},
                dataType: "json",
                success: function(data) {
                    alert("Success Edit operator");
                    $('.edit_operator_close').click();
                    get_operator();
                }
            });
        })
        $(document).on('click', '.del_operator', function(){
            var id = $(this).data("id");

            $.ajax({
                url: "{{route('delete_operator')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    alert("Success Delete operator");
                    $('.add_operator_close').click();
                    get_operator();

                }
            });
        })


        $(document).on('click', '.modal4', function(){
            $('#tbl_customer').empty();
            $.ajax({
                url: "{{route('get_cust')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    console.log(data);
                    var htmll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmll +='<tr>';
                            htmll +='<td>'+no+'</td>';
                            htmll +='<td>'+data[i].name+'</td>';
                            htmll +='<td>'+data[i].email+'</td>';
                            htmll +='<td><button class="btn btn-sm btn-primary edit_cust" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditcustomer">Edit</button></td>';
                            htmll +='<td><a class="btn btn-sm btn-danger del_cust" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                        htmll +='</tr>';
                        no++;
                    }
                    $('#tbl_customer').append(htmll);
                    $("#tbl_customer_list").DataTable();
                }
            });
        })
        $(document).on('click', '.add_customer', function(){
            var customer_name = $('#customer_name').val();
            var customer_email = $('#customer_email').val();
            var customer_pass = $('#customer_pass').val();

            $.ajax({
                url: "{{route('add_cust')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", name:customer_name, email:customer_email, password:customer_pass},
                dataType: "json",
                success: function(data) {

                    if(data.message == "success"){
                        alert("Success Add customer");
                        $('.add_customer_close').click();
                        get_customer();
                    }else{
                        alert(data.data);
                    }

                }
            });
        }) 
        $(document).on('click', '.edit_cust', function(){
            var id = $(this).data("id");
            $.ajax({
                url: "{{route('get_cust_edit')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    $('#customer_name_edit').val(data.data[0].name);
                    $('#customer_email_edit').val(data.data[0].email);
                    $('#id_customer_edit').val(data.data[0].id);
                }
            });
        })
        $(document).on('click', '.edit_customer_process', function(){
            var id = $('#id_customer_edit').val();
            var name = $('#customer_name_edit').val();
            var email = $('#customer_email_edit').val();
            $.ajax({
                url: "{{route('customer_edit_process')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id, name:name, email:email},
                dataType: "json",
                success: function(data) {
                    alert("Success Edit customer");
                    $('.edit_customer_close').click();
                    get_customer();
                }
            });
        })
        $(document).on('click', '.del_cust', function(){
            var id = $(this).data("id");

            $.ajax({
                url: "{{route('delete_customer')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    alert("Success Delete Customer");
                    $('.add_customer_close').click();
                    get_customer();

                }
            });
        })


        $(document).on('click', '.modal5', function(){
            $('#tbl_bank').empty();
            $.ajax({
                url: "{{route('get_bank')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}"},
                dataType: "json",
                success: function(data) {
                    var data = data.data;
                    console.log(data);
                    var htmll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmll +='<tr>';
                            htmll +='<td>'+no+'</td>';
                            htmll +='<td>'+data[i].bank_name+'</td>';
                            htmll +='<td>'+data[i].acc_no+'</td>';
                            htmll +='<td>'+data[i].holder_name+'</td>';
                            htmll +='<td>'+formatNumber(data[i].saldo)+'</td>';
                            htmll +='<td><button class="btn btn-sm btn-primary edit_bank" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditbank">Edit</button></td>';
                            htmll +='<td><a class="btn btn-sm btn-danger del_bank" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete content?`)">Delete</a></td>';
                        htmll +='</tr>';
                        no++;
                    }
                    $('#tbl_bank').append(htmll);
                    $("#tbl_bank_list").DataTable();
                }
            });
        })
        $(document).on('click', '.add_bank', function(){
            var bank_name = $('#bank_name').val();
            var acc_no = $('#acc_no').val();
            var holder_name = $('#holder_name').val();
            var saldo = $('#saldo').val();

            $.ajax({
                url: "{{route('add_bank')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", bank_name:bank_name, acc_no:acc_no, holder_name:holder_name, saldo:saldo},
                dataType: "json",
                success: function(data) {

                    if(data.message == "success"){
                        alert("Success Add Bank");
                        $('.add_bank_close').click();
                        get_bank();
                    }else{
                        alert(data.data);
                    }
                }
            });
        }) 
        $(document).on('click', '.edit_bank', function(){
            var id = $(this).data("id");
            $.ajax({
                url: "{{route('get_bank_edit')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    $('#bank_name_edit').val(data.data[0].bank_name);
                    $('#acc_no_edit').val(data.data[0].acc_no);
                    $('#holder_name_edit').val(data.data[0].holder_name);
                    $('#saldo_edit').val(data.data[0].saldo);
                    $('#id_bank_edit').val(data.data[0].id);
                }
            });
        })
        $(document).on('click', '.edit_bank_process', function(){
            var bank_name = $('#bank_name_edit').val();
            var acc_no = $('#acc_no_edit').val();
            var holder_name = $('#holder_name_edit').val();
            var saldo = $('#saldo_edit').val();
            var id = $('#id_bank_edit').val();
            $.ajax({
                url: "{{route('bank_edit_process')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id, bank_name:bank_name, acc_no:acc_no, holder_name:holder_name, saldo:saldo},
                dataType: "json",
                success: function(data) {
                    alert("Success Edit Bank");
                    $('.edit_bank_close').click();
                    get_bank();
                }
            });
        })
        $(document).on('click', '.del_bank', function(){
            var id = $(this).data("id");

            $.ajax({
                url: "{{route('delete_bank')}}",
                type: "POST",
                data: {_token:"{{ csrf_token() }}", id:id},
                dataType: "json",
                success: function(data) {
                    alert("Success Delete Bank");
                    $('.add_bank_close').click();
                    get_bank();

                }
            });
        })

    </script>
@endsection
