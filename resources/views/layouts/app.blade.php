<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 04.05.2017
 * Time: 0:23
 */
?>
        <!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @if (!(Auth::guest()))
        <title>{{Statuses::getCompanyName(Auth::user()->company_id)}}</title>
    @else
        <title>{{ config('app.name', 'Page Title') }}</title>
    @endif

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/AdminLTE.min.css") }}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="{{ asset("/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css") }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


    <link href="{{ asset("/css/bootstrap-datepaginator.css") }}" rel="stylesheet">
    <link href="{{ asset("/vendor/bootstrap-datepicker/css/bootstrap-datetimepicker.css") }}" rel="stylesheet">

    <!-- Scripts -->

    <!-- jQuery 2.2.3 -->
    <script src="{{ asset("/bower_components/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js") }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-migrate/3.0.0/jquery-migrate.js"></script>
    <script src="{{ asset("/js/app.js") }}"></script>

    <script src="/js/cropper.js"></script>
    <link  href="/css/cropper.css" rel="stylesheet">

    <!-- Bootstrap 3.3.6 -->
    <script src="{{ asset("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo  -->


        @if(!empty(Statuses::getLogoImage(Auth::user()->company_id)))

        <a href="/" class="logo" style="background-color: #ffffff;">
            <img src="{{asset('uploads/company/logo/' . Auth::user()->company_id.'/'.Statuses::getLogoImage(Auth::user()->company_id))}}">
        @else
        <a href="/" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini">{{Statuses::getCompanyName(Auth::user()->company_id)}}</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg">{{Statuses::getCompanyName(Auth::user()->company_id)}}</span>
        @endif
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->

                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    {{--<li class="dropdown messages-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the messages -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                                            </div>
                                            <!-- Message title and timestamp -->
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <!-- The message -->
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                                <!-- /.menu -->
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- /.messages-menu -->

                    <!-- Notifications Menu -->
                    <li class="dropdown notifications-menu">
                        <!-- Menu toggle button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- Inner Menu: contains the notifications -->
                                <ul class="menu">
                                    <li><!-- start notification -->
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <!-- end notification -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks Menu -->
                    <li class="dropdown tasks-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- Inner menu: contains the tasks -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <!-- Task title and progress text -->
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <!-- The progress bar -->
                                            <div class="progress xs">
                                                <!-- Change the css width attribute to simulate progress -->
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    --}}
                    <!-- User Account Menu -->


                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            @if(!empty(UserInfo::getUserProfilePhoto(Auth::user()->id)))
                                <img src="{{asset('uploads/users/profile') . '/' . Auth::user()->company_id . '/'
                                . Auth::user()->id . '/' . UserInfo::getUserProfilePhoto(Auth::user()->id)}}?{{ rand() }}"
                                     class="user-image" alt="{{UserInfo::getUserName(Auth::user()->id)}}">
                            @else
                                <img src="{{asset('uploads/users/profile/no-profile-photo.png')}}"
                                     class="user-image" alt="{{UserInfo::getUserName(Auth::user()->id)}}">
                            @endif

                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">{{UserInfo::getUserName(Auth::user()->id)}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                @if(!empty(UserInfo::getUserProfilePhoto(Auth::user()->id)))
                                <img src="{{asset('uploads/users/profile') . '/' . Auth::user()->company_id . '/'
                                    . Auth::user()->id . '/' . UserInfo::getUserProfilePhoto(Auth::user()->id)}}?{{ rand() }}"
                                     class="img-circle" alt="{{UserInfo::getUserName(Auth::user()->id)}}">
                                @else
                                    <img src="{{asset('uploads/users/profile/no-profile-photo.png')}}"
                                         class="user-image" alt="{{UserInfo::getUserName(Auth::user()->id)}}">
                                @endif

                                <p>
                                    {{UserInfo::getUserName(Auth::user()->id)}} - {{UserInfo::getUserDepartment(Auth::user()->id)}}
                                    {{--<small>Member since Nov. 2012</small>--}}
                                </p>
                            </li>
                            <!-- Menu Body -->
                            {{--
                            <li class="user-body">
                                <div class="row">
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Followers</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Sales</a>
                                    </div>
                                    <div class="col-xs-4 text-center">
                                        <a href="#">Friends</a>
                                    </div>
                                </div>
                                <!-- /.row -->
                            </li>
                            --}}
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{url('profile')}}" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{ url('/logout') }}" class="btn btn-default btn-flat" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="{{ url('/logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out"></i>
                        </a>

                        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>
            </div>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 20px;">
                <li><a href="#"><span class="glyphicon glyphicon-usd"></span> {{ isset($company_plan) ? $company_plan : 'Free' }}</a></li>
            </ul>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            {{--<div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>--}}

            <!-- search form (Optional) -->
            {{--<form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>--}}
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            @include('layouts.general_menu')

            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            {{--
            <h1>
                Page Header
                <small>Optional description</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
                <li class="active">Here</li>
            </ol>
            --}}
        </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Created by <a href="{{url('http://aspins.org')}}" target="_blank">Aspins</a>
        </div>
        <!-- Default to the left -->

        <strong>Copyright &copy; 2017 <a href="{{config('app.url')}}" target="_blank">{{ config('app.name') }}</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.6 -->
<script src="{{ asset("/bower_components/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("/bower_components/AdminLTE/dist/js/app.min.js") }}"></script>



<script src="{{ asset("/js/moment.js") }}"></script>
<script src="{{ asset("/js/bootstrap-datepicker.js") }}"></script>
<script src="{{ asset("/js/bootstrap-datepaginator.js") }}"></script>
<script src="{{ asset("/vendor/bootstrap-datepicker/js/bootstrap-datetimepicker.min.js") }}"></script>

<script>
    function wrapTag(res, tag, className){
        res == null ? res = '' : res = res;
        if(className) {
            return "<" + tag + " class='" + className + "'>" + res + "</" + tag + ">";
        }
        return "<" + tag + ">" + res + "</" + tag + ">";
    }

    var statuses = {
        notapproved :'label-warning',
        pending :'label-warning',
        inprogress :'label-warning',
        rejected :'label-danger',
        approved :'label-success'
    };

    function getStatus(statusName){
        var key = statusName.replace(' ', '').toLowerCase();

        return wrapTag(statusName, 'span', 'label ' + statuses[key]);
    }

    function getCrudLinks(userId, links){
        return '<a href="' + links.edit + userId + '"><span class="label label-warning"><i class="icon fa fa-close"></i> Edit</span></a>'
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
    }

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


    var timeNotation = "<?= isset($nominal) ? is_null($nominal) ? 'hour' : $nominal : 'hour' ?>";


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

    /*
        @sum | object
            {
                type : string (time or price)
                label : string
                index : int

            }
     */

    function createAdminTable(data, resultHtml, sum) {

        if(data.status){

            var thead = '';
            var tbody = '';
            var tfoot = '';
            var sumTotal = '';
            var footLabel = '';
            $.each(data.titles, function (i, item) {
                thead += wrapTag(item,'th');
            });

            $.each(data.data, function (i, item) {
                var td = '';
                if(sum){
                    if(sum.label){
                        footLabel = sum.label;
                    }
                    switch (sum.type){
                        case 'time':
                            sumTime(item[sum.index]);
                            break;
                        case 'price':
                            break;
                    }
                }
               $.each(item,function(k,v){
                   if(v !== null){
                       if(k == 'status_name'){

                           v = getStatus(v);
                           td += wrapTag(v,'td');

                           td += wrapTag(getCrudLinks(item.id,data.links),'td');

                       }
                       else {
                           if(v.toString().split(':').length == 3){
                               td += wrapTag(prettyTime(v, true),'td');
                           }
                           else {
                               td += wrapTag(v,'td');
                           }
                       }
                   }else{
                       td += wrapTag('','td');
                   }


               });
                tbody += wrapTag(td,'tr');
            });
            if(sum && data.data[0]) {
                tfoot += wrapTag('<tr><td class="text-right" colspan=' + data.titles.length + '>' + footLabel + ': ' + wrapTag(totalTimeCount.getTime(), 'strong') + '</td></tr>', 'tfoot');
            }
            var tableHtml = wrapTag(wrapTag(wrapTag(thead,'tr'),'thead') + wrapTag(tbody,'tbody') + tfoot,'table', 'table table-bordered');
            $(resultHtml).append(tableHtml);

        }
        else
            $(resultHtml).html(wrapTag('Empty', 'div'));
    }

    function readURL(input,call) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.profile-user-img').attr('src', e.target.result);
                call();
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    var object = {
        x: 0,
        y: 0,
        width: 0,
        height: 0,
        rotate: 0,
        scaleX: 0,
        scaleY: 0
    };

    $(function(){
        $('.ajax [data-toggle="tab"]').click(function(e) {
            var $this = $(this),
                loadurl = $this.attr('href'),
                url     = $this.parent('li').parent('ul').attr('data-ajaxurl');

            $.get(url + '/' + loadurl, function(data) {
                createAdminTable(data, '.box-body');
            });

            $this.tab('show');
            return false;
        });


        $('#userPhoto').on('submit', setImg);


        $('input[name=userProfileFile]').on('change', function () {

            readURL(this,function () {
                $('.profile-user-img').cropper('destroy').cropper({
                    aspectRatio: 1,
                    crop: function(e) {
                        object.x = e.x;
                        object.y = e.y;
                        object.width = e.width;
                        object.height = e.height;
                        object.rotate = e.rotate;
                        object.scaleX = e.scaleX;
                        object.scaleY = e.scaleY;
                    }
                });

            });
        });
    });

    function setImg () {
        var newSaveData = new FormData();


       $('input[type=file]').each(function(key, value){
            if(value.files[0]){
                newSaveData.append('user_photo',value.files[0]);
            }
        });

        $.each(object,function (k,v) {
            newSaveData.append(k,v);
        });

        $.ajax({
            url: '/uploadUserPhoto' ,
            type: 'POST',
            processData: false,
            contentType: false,
            success: function(data){
                $('.profile-user-img').removeClass('cropper-hidden');
                $('.img-circle').attr('src', data + "?timestamp=" + new Date().getTime());
                $('.user-image').attr('src', data + "?timestamp=" + new Date().getTime());
                $('.cropper-container').remove();
                $('input[type=file]').val('');
            },
            data : newSaveData
        });

        return false;
    }

</script>

</body>
</html>

