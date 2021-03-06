@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if(!\App\Plan::checkLimit('users'))
                <div class="callout callout-warning">
                    <h4>Users Limit!</h4>

                    <p>For a given tariff plan, a maximum of {{ \App\Plan::getLimit('users') }} users</p>
                </div>
            @endif

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of users</h3>
                </div>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs ajax" data-ajaxurl="/ajaxGetUsers">
                        <li class="active"><a href="0" data-toggle="tab" aria-expanded="true">All</a></li>
                        <li class=""><a href="2" data-toggle="tab" aria-expanded="false">Pending</a></li>
                        <li class=""><a href="3" data-toggle="tab" aria-expanded="false">In progress</a></li>
                        <li class=""><a href="4" data-toggle="tab" aria-expanded="false">Rejected</a></li>
                        <li class=""><a href="5" data-toggle="tab" aria-expanded="false">Approved</a></li>
                        <li class=""><a href="1" data-toggle="tab" aria-expanded="false">Not Approved</a></li>
                    </ul>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered"  id="table">
                        <tbody><tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roleName}}</td>
                                <td><span class="label {{Statuses::getClassName($user->statusName)}}">{{$user->statusName}}</span></td>
                                <td>
                                    <a href="/admin/editUser/{{$user->id}}"><span class="label label-warning"><i class="icon fa fa-close"></i> Edit</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="col-md-2">
                        @if(\App\Plan::checkLimit('users'))
                            <a href="{{ url('/admin/addUser') }}" class="btn btn-success" type="button" >Add User</a> <br />
                        @endif

                    </div>
                </div>
            </div>
            {{--
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role_name}}</td>
                            <td>{{$user->status_name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            --}}
        </div>
    </div>
    {{--
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ url('/admin/addUser') }}" ><input class="btn btn-success" type="submit" value="Add User"></a> <br />
            </div>
            <div class="col-md-10">

            </div>
        </div>
    </div>
    --}}
@endsection