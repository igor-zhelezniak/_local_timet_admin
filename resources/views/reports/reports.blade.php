<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 15.03.2017
 * Time: 13:08
 */
?>

@extends('layouts.app')

@section('content')
    <style>
        .box-body p.text-center {
            background-color: lavender;
        }
    </style>

    <div class="container">
        <div class="row">
            <form action="" method="post" id="selectReportForm">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>User name</label>

                            <select class="form-control" name="userName">
                                <option value="">All</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Customer</label>

                            <select class="form-control" name="customerName">
                                <option value="">All</option>
                                @foreach($customers as $customer)
                                    <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Project</label>

                            <select class="form-control" name="projectName">
                                <option value="">All</option>
                                @foreach($projects as $project)
                                    <option value="{{$project->id}}">{{$project->project_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Categories</label>

                            <select class="form-control" name="categoriesName">
                                <option value="">All</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->category_id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Group By</label>

                            {{ Form::select('groupBy', $groupBy, null, ['class' => 'form-control']) }}

                        </div>
                    </div>

                    <div class="col-md-2">
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
                    <div class="col-md-2">
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
                    <div class="col-md-5">
                        <label for=""></label>
                        <div class="text-right">
                            <button class="btn btn-primary" id="exportToPdf" type="button">Export to Pdf</button>
                            <button class="btn btn-info" id="exportToExcel" type="button">Export to Excel</button>
                            <button class="btn btn-success col-md-offset-1" id="showReportsResult" type="button">Show</button>
                        </div>
                    </div>
                </div>

                    <script type="text/javascript">

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
                        }

                        var timeNotation = "<?= is_null($nominal) ? 'hour' : $nominal ?>";

                        function saveFile(response){
                            var a = document.createElement("a");
                            a.href = response.file;
                            a.download = response.name;
                            a.classList.add('excelLink');
                            document.body.appendChild(a);
                            a.click();
                            a.remove();
                        }

                        $(function () {

                            var myDate = new Date();


                            $('.datetimepickerFrom').datetimepicker({
                                format: 'YYYY-MM-DD',
                                defaultDate: new Date(myDate.setDate(myDate.getDate() - 7))
                            });

                            $('.datetimepickerTo').datetimepicker({
                                format: 'YYYY-MM-DD',
                                defaultDate: new Date()
                            });

                            $('#exportToExcel').click(function(){
                                var selectReportForm = $('#selectReportForm').serialize();
                                $.post('/showReportResult/excel/' + timeNotation, selectReportForm, function(response){
                                    saveFile(response);
                                });
                            });

                            $('#exportToPdf').click(function(){
                                var selectReportForm = $('#selectReportForm').serialize();
                                $.post('/showReportResult/pdf/' + timeNotation, selectReportForm, function(response){
                                    saveFile(response);
                                });
                            });

                            $('#showReportsResult').click(function () {

                                if(!$(this).hasClass('block')){
                                    $(this).addClass('block');


                                    $('#reportResultTable tfoot tr td').empty();
                                    totalTimeCount.count = 0;
                                    var selectReportForm = $('#selectReportForm').serialize();
                                    $.post('/showReportResult/json/' + timeNotation , selectReportForm, function (data) {

                                        var html = '';

                                        $('.box-body').html(html);

                                        var totalTimeCountHours = 0;
                                        var totalTimeCountMinutes = 0;

                                        switch (data.groupBy){
                                            case true: {
                                                createAdminTable(data, '.box-body', {
                                                    type: 'time',
                                                    label: 'total time',
                                                    index: 'time'
                                                });
                                            } break;
                                            case false: {
                                                createAdminTable(data, '.box-body', {
                                                    type: 'time',
                                                    label: 'total time',
                                                    index: 'worked_time'
                                                });
                                            } break;
                                            case 'user-project': {
                                                $.each(data.data, function(k,v){
                                                    $('.box-body').append(wrapTag(wrapTag(k, 'strong'), 'p', 'text-center'));
                                                    createAdminTable({
                                                        data: v,
                                                        status: true,
                                                        titles: data.titles
                                                    }, '.box-body', {

                                                        type: 'time',
                                                        label: 'total time',
                                                        index: 'time'

                                                        }
                                                    );
                                                });
                                            } break;
                                        }

                                        /*if(data.groupBy){
                                            createAdminTable(data, '.box-body', {
                                                type: 'time',
                                                label: 'total time',
                                                index: 'time'
                                            });
                                        }
                                        else {

                                            createAdminTable(data, '.box-body', {
                                                type: 'time',
                                                label: 'total time',
                                                index: 'worked_time'
                                            });

                                            /!*$.each(data.data,function(key, value){

                                                html += "<tr><td>" + value.logged_date + "</td>" +
                                                    "<td>" + value.userName + "</td>" +
                                                    "<td>" + value.projectName + "</td>" +
                                                    "<td>" + value.categoryName + "</td>" +
                                                    "<td>" + value.description + "</td>" +
                                                    "<td>" + prettyTime(value.worked_time, true) + "</td>" +
                                                    "</tr>";
                                                sumTime(value.worked_time);
                                            });

                                            $('#reportResultTable tbody').html(html);*!/
                                        }*/



                                        if(data.data.length >= 1){
                                            $('#reportResultTable tfoot tr td').html('total <span>' + totalTimeCount.getTime() + '</span>');

                                        }
                                        $('#showReportsResult').removeClass('block');
                                    });
                                    //console.log(selectReportForm);
                                }
                            });
                        });

                        function sumTime(time){

                            var splitTime = time.split(':');

                            hours = parseInt(splitTime[0]);
                            //console.log(hours);

                            minute = parseInt(splitTime[1]);
                            /*minute = minute%60;*/

                            second = parseInt(splitTime[2]);
                            /*minute = minute + second/60;
                            second = second%60;*/

                           // moment.duration("12:10:12", "HH:mm:ss");

                           // console.log(hours + ':' + minute + ':' + second);

                            totalTimeCount.count += hours*60*60 + minute*60 + second;

                        }

                        function prettyTime(time, showZero) {
                            time = time.toString().replace(/,/g, '.').replace(/;/g, ':');
                            if (time != '') {
                                if (timeNotation == 'decimal') {
                                    if (time == "0") {
                                        time = "0:00";
                                    }
                                    if (time.indexOf('.') == -1) {
                                        // van 'hour' naar 'decimal'
                                        var colon = time.indexOf(':');
                                        if (colon == 0) {
                                            time = "0" + time;
                                        }
                                        var timeArray = time.split(':');
                                        var hours = parseInt(timeArray[0], 10);
                                        var minutes = (timeArray[1] ? parseInt(timeArray[1], 10) : 0);
                                        if (isNaN(hours) || isNaN(minutes)) {
                                            return '';
                                        } else {
                                            time =  hours + (minutes/60);
                                        }
                                    }
                                    time = Math.round(time*100)/100;
                                    if (time == parseInt(time)) {
                                        time = time+".00";
                                    }
                                    var timeArray = time.toString().split('.');
                                    if (timeArray[1].length == 1) {
                                        time = time+"0";
                                    }
                                    /*
                                     if (currentLanguage == 'nl') {
                                     time = time.toString().replace('.', ',');
                                     }
                                     */
                                } else if (timeNotation == 'hour') {
                                    if (time.indexOf(':') == -1) {
                                        // van 'decimal' naar 'hour'
                                        var point = time.indexOf('.');
                                        if (point == 0) {
                                            time = "0" + time;
                                        }
                                        var timeArray = time.split('.');
                                        var hours = parseInt(timeArray[0], 10);
                                        var minutes = Math.round((time - hours)*100);
                                        minutes = Math.round(minutes * 0.6);
                                        if (isNaN(hours) || isNaN(minutes)) {
                                            return '';
                                        } else {
                                            if (minutes == 60) {
                                                hours++;
                                                minutes = 0;
                                            }
                                            if (minutes.toString().length == 0) {
                                                minutes = '00';
                                            } else if (minutes.toString().length == 1) {
                                                minutes = '0' + minutes;
                                            }
                                            time = hours + ":" + minutes;
                                        }
                                    } else {
                                        var timeArray = time.split(':');
                                        var hours = parseInt(timeArray[0], 10);
                                        if (isNaN(hours)) {
                                            hours = 0;
                                        }
                                        var minutes = (timeArray[1] ? parseInt(timeArray[1], 10) : 0);
                                        if (minutes > 60) {
                                            var moreHours = parseInt(minutes/60);
                                            hours += moreHours;
                                            minutes = minutes - (moreHours*60);
                                        }
                                        if (minutes == 60) {
                                            hours++;
                                            minutes = 0;
                                        }
                                        if (minutes.toString().length == 0) {
                                            minutes = '00';
                                        } else if (minutes.toString().length == 1) {
                                            minutes = '0' + minutes;
                                        }
                                        time = hours + ":" + minutes;
                                    }
                                }
                            }
                            if ((time == '0.00' || time == '0:00') && !showZero) {
                                time = '';
                            }

                            //console.log(time + " tt");

                            return time;
                        }
                    </script>
            </form>
        </div>

        <div class="row">
        <!--Result table start-->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Result Table</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    {{--<table class="table table-bordered" id="reportResultTable">
                        <thead>
                        <tr>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Project</th>
                            <th>Categories</th>
                            <th>Description</th>
                            <th>Time</th>
                        </tr>
                        </thead>

                        <tbody>

                        </tbody>

                        <tfoot>
                        <tr>
                            <td colspan="6" class="text-right">

                            </td>
                        </tr>
                        </tfoot>
                    </table>--}}
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>
@endsection