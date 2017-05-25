@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Use the form below to select and upload user profile image</h3>
                </div>
                <div class="box-body">
                    {!! Form::open(['url' => 'uploadUserPhoto', 'files'=>true]) !!}
                    {{ Form::hidden('userId', $user_id) }}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Form::file('userProfileFile') !!}
                        </div>
                        <div class="col-md-6">
                            {!! Form::submit('Upload', array('class'=>'btn btn-primary')) !!}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>


        </div>

        <div class="row">

            <div class="box">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Use the form below to edit user information</h3>
                    </div>
                </div>
                <div class="box-body">
                    <form action="{{ url('/admin/saveEditUser/')}}" method="post">
                        {{ csrf_field() }}
                        <input name="uId" type="hidden" value="{{$user_id}}">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input name="uName" type="text" value="{{$user_name}}" class="form-control" autofocus required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input name="uEmail" type="email" value="{{$user_email}}" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input name="uPassword" type="password" value="" class="form-control" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Department</label>
                                    <select name="uDepartment" class="form-control">
                                        @foreach($departments as $department)
                                            <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Role</label>
                                    <select name="uRole" class="form-control">
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    <select name="uStatus" class="form-control">
                                        @foreach($status as $user_status)
                                            <option value="{{$user_status->id}}">{{$user_status->status_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="text-left">
                                <a href="{{url('/admin/showUsers')}}" class="btn btn-warning" type="button">All Users</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <button class="btn btn-success" type="submit">Edit User</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection