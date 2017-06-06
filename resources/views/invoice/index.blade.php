@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form action="" method="post" id="selectInvoiceForm">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Customer</label>
                            {{ Form::select('customerName', [null => 'All'] + $customers->toArray(), 0, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Project</label>
                            {{ Form::select('projectName', [null => 'All'], 0, ['class' => 'form-control']) }}

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>From</label>
                            <div class='input-group date datetimepickerFrom'>
                                <input type='text' class="form-control" name="dateFrom"/>
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>To</label>
                            <div class='input-group date datetimepickerTo'>
                                <input type='text' class="form-control" name="dateTo"/>
                                <span class="input-group-addon">
                                        <span class="glyphicon glyphicon-calendar"></span>
                                    </span>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
        <div class="row">
            <div class="col-md-">
                <label for=""></label>
                <div class="text-right">
                    <button class="btn btn-success col-md-offset-1" id="showInvoiceResult" type="button">Show</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Invoice</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered"  id="table">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Project Name</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Total Time</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-">
                <label for=""></label>
                <div class="text-right">
                    <button class="btn btn-info col-md-offset-1" id="createInvoice" type="button">Create Invoice</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function addOptions(data){
            var $select = $('select[name=projectName]');
            $select.html('');

            $.each(data, function(k,v){
                $select.append($('<option>', {
                    value: v.id,
                    text : v.project_name
                }));
            });
        }

        var timeNotation = "<?= is_null($nominal) ? 'hour' : $nominal ?>";

        var invoiceObj = {
            name: 0,
            project_name: 0,
            from: 0,
            to: 0,
            time: 0,
            price: 0,
        }

        var totalTimeCount = {
            count: 0,
            getTime: function(){
                var sec = this.count ;
                var h = sec/3600 ^ 0 ;
                var m = (sec-h*3600)/60 ^ 0 ;
                var s = sec-h*3600-m*60 ;
                if(timeNotation == 'decimal'){
                    return (h + (m / 60) + (s / 3600)).toFixed(2);
                }
                return ((h<10?"0"+h:h)+":"+(m<10?"0"+m:m));/*+" мин. "+(s<10?"0"+s:s)+" сек.")*/

            }
        };

        function saveFile(response){
            var a = document.createElement("a");
            a.href = response.file;
            a.download = response.name;
            a.classList.add('excelLink');
            document.body.appendChild(a);
            a.click();
            a.remove();
        }

        function sumTime(time){

            var splitTime = time.split(':');

            hours = parseInt(splitTime[0]);

            minute = parseInt(splitTime[1]);

            second = parseInt(splitTime[2]);

            totalTimeCount.count += hours*60*60 + minute*60 + second;

        }

        $(function () {
           $('select[name=customerName]').on('change', function () {
               var value =  $(this).find('option:selected').val();
               if(value){
                   $.post('/ajaxGetProjects/' + $(this).find('option:selected').val(), function(data){
                       addOptions(data);
                   });
               }
           });

            var myDate = new Date();

            $('.datetimepickerFrom').datetimepicker({
                format: 'YYYY-MM-DD',
                defaultDate: new Date(myDate.setDate(myDate.getDate() - 7))
            });

            $('.datetimepickerTo').datetimepicker({
                format: 'YYYY-MM-DD',
                defaultDate: new Date()
            });

            $('#createInvoice').click(function(){

                invoiceObj.price = $('input[name=price]').val();

                $.post('/ajaxCreateInvoice', invoiceObj, function(data){
                    saveFile(data);
                });
            });

            $('#showInvoiceResult').click(function () {

                if(!$(this).hasClass('block')) {
                    $(this).addClass('block');

                    totalTimeCount.count = 0;
                    var selectInvoiceForm = $('#selectInvoiceForm').serialize();

                    $.post('/ajaxGetInvoice', selectInvoiceForm, function (data) {

                        if (data.data.length >= 1) {
                            $.each(data.data, function (key, value) {

                                sumTime(value.worked_time);

                            });

                            invoiceObj.name = data.data[0].name;
                            invoiceObj.project_name = data.data[0].project_name;
                            invoiceObj.from = data.from;
                            invoiceObj.to = data.to;
                            invoiceObj.time = totalTimeCount.getTime();

                            var html = '<tr>'
                                + '<td>' + invoiceObj.name + '</td>'
                                + '<td>' + invoiceObj.project_name + '</td>'
                                + '<td>' + invoiceObj.from + '</td>'
                                + '<td>' + invoiceObj.to + '</td>'
                                + '<td>' + invoiceObj.time + '</td>'
                                + '<td><input name="price" class="form-control"></td>'
                                + '</tr>';

                            $('#table').find('tbody').html(html);
                        }
                        else {
                            $('#table').find('tbody').html('');
                        }

                        $('#showInvoiceResult').removeClass('block');
                    });
                }
            });
        });
    </script>
@endsection