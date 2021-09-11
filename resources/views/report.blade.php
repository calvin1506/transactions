<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$type}} Report</title>

    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
</head>
<body>
    <div class="container-fluid">
        <div class="row mt-5">
            <div class="card" style="width: 100%">
                <div class="card-header">{{$type}} Report</div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-xl-3">
                            <label>Date range:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control float-right" id="reservation" name="reservation">
            
                            </div>
                        </div>
                        <div class="col-xl-3">
                            @if ($type == "Website")
                                <label>Select Website:</label>
                                <select class="form-control id_input" name="web" id="web">
                                    @foreach ($data as $a)
                                        <option value="{{$a->id}}">{{$a->web_name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="type" id="type" value="Website">
                            @elseif($type == "Bank")
                                <label>Select Bank:</label>
                                <select class="form-control id_input" name="bank" id="bank">
                                    @foreach ($data as $b)
                                        <option value="{{$b->id}}">{{$b->bank_name}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="type" id="type" value="Bank">
                            @elseif($type == "Customer")
                                <label>Select Customer:</label>
                                <select class="form-control id_input" name="cust" id="cust">
                                    @foreach ($data as $c)
                                        <option value="{{$c->id}}">{{$c->user_id}}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="type" id="type" value="Customer">
                            @else
                                <label>Select Website:</label>
                                <select class="form-control id_input" name="web" id="web">
                                    @foreach ($data as $d)
                                        <option value="{{$d->id}}">{{$d->web_name}}</option>
                                    @endforeach
                                </select>

                                <input type="hidden" name="type" id="type" value="Cashback">
                            @endif
                        </div>
                        @if ($type == "Cashback")
                            <div class="col-xl-3">
                                <label>Select Type:</label>
                                <select class="form-control id_input" name="trx" id="trx">
                                    <option value="all">-- All --</option>
                                    <option value="bonus">-- Bonus --</option>
                                    <option value="Cashback">-- Cashback --</option>
                                </select>
                            </div>
                        @endif

                        <div class="col-xl-3">
                            <button class="btn btn-primary submit_report" type="button" style="margin-top: 31px;">Process</button>
                        </div>
                    </div>

                    @if ($type == "Website")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        Website:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_web_name" id="report_web_name" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        Periode:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_web_period" id="report_web_period" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($type == "Bank")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        Nama Bank:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_bank_name" id="report_bank_name" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        Periode:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_bank_period" id="report_bank_period" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        Nama Rekening:
                                    </div>
                                    <div class="col-md-9 text-left">
                                        <input type="text" name="report_holder_name" id="report_holder_name" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-3">
                                        Nomor Rekening:
                                    </div>
                                    <div class="col-md-9">
                                        <input type="text" name="report_bank_acc_no" id="report_bank_acc_no" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>
                    @elseif($type == "Customer")
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-">
                                        User:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_customer_name" id="report_customer_name" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        Periode:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_customer_period" id="report_customer_period" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        Website:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_web_cashback_name" id="report_web_cashback_name" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-2">
                                        Periode:
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" name="report_web_cashback_period" id="report_web_cashback_period" readonly style="border: none;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-12">
                            <div class="div" id="div_table_report"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>    
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/jquery/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/jquery/jszip.min.js')}}"></script>
<script src="{{asset('plugins/jquery/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/jquery/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/jquery/buttons.html5.min.js')}}"></script>

<script>
    $('#reservation').daterangepicker();
    $('#table_report_website').DataTable();
    
    function formatNumber(num) {
      return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
    }

    $(document).on('click', '.submit_report', function(){
        var time = $('#reservation').val();
        var id = $('.id_input').val();
        var type = $('#type').val();
        if (type = "Cashback") {
            var trx = $('#trx').val();
            $.ajax({
                url: "{{route('report_process')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    time:time,
                    id:id,
                    type:type,
                    trx:trx
                },
                dataType: "json",
                success: function (data) {

                    $('#report_web_cashback_name').val('');
                    $('#report_web_cashback_period').val('');
                    $('#table-report').DataTable().destroy();
                    $('#div_table_report').empty();

                    var type = data.type;
                    var period = data.period;
                    var webs = data.webs;
                    var data = data.data;
                    var html = "";
                    var no = 1;

                    // html += ''
                    html += '<div class="row table-responsive mt-5" style="width: 100%;">';
                        html += '<table class="table table-striped" id="table_report">';
                            html += '<thead>';
                                html += '<tr>';
                                    html += '<td>No</td>';
                                    html += '<td>User</td>';
                                    html += '<td>Tanggal Transaksi</td>';
                                    html += '<td>Tipe Transaksi</td>';
                                    html += '<td>Jumlah</td>';
                                html += '</tr>';
                            html += '</thead>';
                            html += '<tbody>';
                                for(var i = 0; i < data.length; i++ ) {
                                    html += '<tr>';
                                        html += '<td>'+no+'</td>';
                                        html += '<td>'+data[i].user_name+'</td>';
                                        html += '<td>'+data[i].created_at+'</td>';
                                        html += '<td>'+data[i].trx_type+'</td>';
                                        html += '<td>'+formatNumber(data[i].amount)+'</td>';
                                    html += '</tr>';
                                    no++;
                                }
                            html += '</tbody>';
                        html += '</table>';
                    html += '</div>';
                    
                    
                    $('#report_web_cashback_name').val(webs[0].web_name);
                    $('#report_web_cashback_period').val(period);
                    $('#div_table_report').append(html);
                    $('#table_report').DataTable({
                        "bInfo": false,
                        "dom" : 'Bfrtip',
                        "buttons" : [
                            'excel'
                        ]
                    });
                }
            });
        } else {
            $.ajax({
                url: "{{route('report_process')}}",
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    time:time,
                    id:id,
                    type:type
                },
                dataType: "json",
                success: function (data) {

                    var type = data.type;
                    var period = data.period;
                    if (type ==  "Website") {
                        $('#report_web_name').val('');
                        $('#report_web_period').val('');
                        $('#table-report').DataTable().destroy();
                        $('#div_table_report').empty();
                        var webs = data.webs;
                        var data = data.data;
                        var html = "";
                        var no = 1;

                        // html += ''
                        html += '<div class="row table-responsive mt-5" style="width: 100%;">';
                            html += '<table class="table table-striped" id="table_report">';
                                html += '<thead>';
                                    html += '<tr>';
                                        html += '<td>No</td>';
                                        html += '<td>User</td>';
                                        html += '<td>Tanggal Transaksi</td>';
                                        html += '<td>Tipe Transaksi</td>';
                                        html += '<td>Jumlah</td>';
                                        html += '<td>Koin Awal</td>';
                                        html += '<td>Koin Akhir</td>';
                                    html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                    for(var i = 0; i < data.length; i++ ) {
                                        html += '<tr>';
                                            html += '<td>'+no+'</td>';
                                            html += '<td>'+data[i].user_name+'</td>';
                                            html += '<td>'+data[i].created_at+'</td>';
                                            html += '<td>'+data[i].trx_type+'</td>';
                                            html += '<td>'+formatNumber(data[i].amount)+'</td>';
                                            html += '<td>'+formatNumber(data[i].old_web_coin)+'</td>';
                                            html += '<td>'+formatNumber(data[i].new_web_coin)+'</td>';
                                        html += '</tr>';
                                        no++;
                                    }
                                html += '</tbody>';
                            html += '</table>';
                        html += '</div>';
                        
                        
                        $('#report_web_name').val(webs[0].web_name);
                        $('#report_web_period').val(period);
                        $('#div_table_report').append(html);
                        $('#table_report').DataTable({
                            "bInfo": false,
                            "dom" : 'Bfrtip',
                            "buttons" : [
                                'excel'
                            ]
                        });

                    } else if (type == "Bank"){
                        $('#report_bank_name').val('');
                        $('#report_holder_name').val('');
                        $('#report_bank_acc_no').val('');
                        $('#report_bank_period').val('');
                        $('#table-report').DataTable().destroy();
                        $('#div_table_report').empty();
                        var banks = data.banks;
                        var data = data.data;
                        var html = "";
                        var no = 1;

                        // html += ''
                        html += '<div class="row table-responsive mt-5" style="width: 100%;">';
                            html += '<table class="table table-striped" id="table_report">';
                                html += '<thead>';
                                    html += '<tr>';
                                        html += '<td>No</td>';
                                        html += '<td>User</td>';
                                        html += '<td>Tanggal Transaksi</td>';
                                        html += '<td>Tipe Transaksi</td>';
                                        html += '<td>Jumlah</td>';
                                        html += '<td>Saldo Awal</td>';
                                        html += '<td>Saldo Akhir</td>';
                                    html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                    for(var i = 0; i < data.length; i++ ) {
                                        html += '<tr>';
                                            html += '<td>'+no+'</td>';
                                            html += '<td>'+data[i].user_name+'</td>';
                                            html += '<td>'+data[i].created_at+'</td>';
                                            html += '<td>'+data[i].trx_type+'</td>';
                                            html += '<td>'+formatNumber(data[i].amount)+'</td>';
                                            html += '<td>'+formatNumber(data[i].old_bank_balance)+'</td>';
                                            html += '<td>'+formatNumber(data[i].new_bank_balance)+'</td>';
                                        html += '</tr>';
                                        no++;
                                    }
                                html += '</tbody>';
                            html += '</table>';
                        html += '</div>';

                        $('#report_bank_name').val(banks[0].bank_name);
                        $('#report_holder_name').val(banks[0].holder_name);
                        $('#report_bank_acc_no').val(banks[0].acc_no);
                        $('#report_bank_period').val(period);
                        $('#div_table_report').append(html);
                        $('#table_report').DataTable({
                            "bInfo": false,
                            "dom" : 'Bfrtip',
                            "buttons" : [
                                'excel'
                            ]
                        });
                    }else{
                        $('#report_customer_name').val('');
                        $('#report_customer_period').val('');
                        $('#table-report').DataTable().destroy();
                        $('#div_table_report').empty();
                        var custs = data.custs;
                        var data = data.data;
                        var html = "";
                        var no = 1;

                        // html += ''
                        html += '<div class="row table-responsive mt-5" style="width: 100%;">';
                            html += '<table class="table table-striped" id="table_report">';
                                html += '<thead>';
                                    html += '<tr>';
                                        html += '<td>No</td>';
                                        html += '<td>Tanggal Transaksi</td>';
                                        html += '<td>Tipe Transaksi</td>';
                                        html += '<td>Jumlah</td>';
                                    html += '</tr>';
                                html += '</thead>';
                                html += '<tbody>';
                                    for(var i = 0; i < data.length; i++ ) {
                                        html += '<tr>';
                                            html += '<td>'+no+'</td>';
                                            html += '<td>'+data[i].created_at+'</td>';
                                            html += '<td>'+data[i].trx_type+'</td>';
                                            html += '<td>'+formatNumber(data[i].amount)+'</td>';
                                        html += '</tr>';
                                        no++;
                                    }
                                html += '</tbody>';
                            html += '</table>';
                        html += '</div>';

                        $('#report_customer_name').val(custs[0].user_id);
                        $('#report_customer_period').val(period);
                        $('#div_table_report').append(html);
                        $('#table_report').DataTable({
                            "bInfo": false,
                            "dom" : 'Bfrtip',
                            "buttons" : [
                                'excel'
                            ]
                        });
                    }
                }
            });
        }
    })
</script>
</body>
</html>