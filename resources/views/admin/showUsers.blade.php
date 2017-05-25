@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of users</h3>
                </div>
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">All</a></li>
                        <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">Active</a></li>
                        <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Inactive</a></li>
                        <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Not Approved</a></li>
                    </ul>
                </div>
                <!-- /.box-header -->
                <div class="box-body">

                    <table class="table table-bordered">
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
                        <a href="{{ url('/admin/addUser') }}" class="btn btn-success" type="button" >Add User</a> <br />
                    </div>
                    <div class="col-md-10">
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