@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row mt-5">
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
                  <h3>150</h3>
  
                  <p>Operators</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#modal3" data-toggle="modal" data-target="#modal3" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <div class="col-xl-2">
            <div class="small-box bg-info">
                <div class="inner">
                  <h3>150</h3>
  
                  <p>Customers</p>
                </div>
                <div class="icon">
                  <i class="ion ion-bag"></i>
                </div>
                <a href="#modal4" data-toggle="modal" data-target="#modal4" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal 3</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
          <h5 class="modal-title" id="exampleModalLabel">Modal 4</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                    console.log(data);
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
                    $("tbl_web_list").dataTable();
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
                    console.log(data);
                    var htmlll = "";
                    var no = 1;
                    
                    for(i=0;i<data.length;i++){
                        htmlll +='<tr>';
                            htmlll +='<td>'+no+'</td>';
                            htmlll +='<td>'+data[i].name+'</td>';
                            htmlll +='<td>'+data[i].email+'</td>';
                            htmlll +='<td><button class="btn btn-sm btn-primary edit_leader" data-id="'+data[i].id+'"data-toggle="modal" data-target="#modaleditleader">Edit</button></td>';
                            htmlll +='<td><a class="btn btn-sm btn-danger del_web" data-id="'+data[i].id+'" onclick="return confirm(`Want to delete Leader?`)">Delete</a></td>';
                        htmlll +='</tr>';
                        no++;
                    }
                    $('#tbl_leader').append(htmlll);
                    $("tbl_leader_list").dataTable();
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
                    $("tbl_web_list").dataTable();
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
                    $("tbl_leader_list").dataTable();
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
        $(document).on('click', '.delete_leader', function(){
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
    </script>
@endsection
