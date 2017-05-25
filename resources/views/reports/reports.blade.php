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
                    <div class="col-md-6">
                        <label for=""></label>
                        <div class="text-right">
                            <button class="btn btn-success" id="showReportsResult" type="button">Show</button>
                        </div>
                    </div>
                </div>

                    <script type="text/javascript">


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

                            $('#showReportsResult').click(function () {
                                var selectReportForm = $('#selectReportForm').serialize();
                                $.post('/showReportResult', selectReportForm, function (data) {

                                    var html = '';
                                    var totalTimeCount = 0;
                                    var totalTimeCountHours = 0;
                                    var totalTimeCountMinutes = 0;
                                    $.each(data.result,function(key, value){

                                        html += "<tr><td>" + value.logged_date + "</td>" +
                                            "<td>" + value.userName + "</td>" +
                                            "<td>" + value.projectName + "</td>" +
                                            "<td>" + value.categoryName + "</td>" +
                                            "<td>" + value.description + "</td>" +
                                            "<td>" + prettyTime(value.worked_time, 'hour', true) + "</td>" +
                                            "</tr>"
                                        totalTimeCount += sumTime(value.worked_time);

                                    });

                                    $('#reportResultTable tbody').html(html);
                                    $('#reportResultTable tfoot tr td span').text(totalTimeCount);
                                });
                                //console.log(selectReportForm);
                            });
                        });

                        function sumTime(time){

                            var splitTime = time.split(':');

                            totalTimeCount = 0;
                            hours = parseInt(splitTime[0]);
                            console.log(hours);

                            minute = parseInt(splitTime[1]);
                            minute = minute%60;


                            second = parseInt(splitTime[2]);
                            minute = minute + second/60;
                            second = second%60;


                            totalTimeCount += hours;
                            console.log(+hours+':'+minute+':'+second + 'sum = ' + totalTimeCount);

                            return hours + ':' + minute;
                        }

                        function prettyTime(time, timeNotation, showZero) {
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

                            console.log(time + " tt");

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
                    <table class="table table-bordered" id="reportResultTable">
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
                                total <span></span>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-right">
                        <li><a href="#">«</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection