@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @if($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-error">{{ $error }}</div>
                @endforeach
            @endif
            <form action="{{ url('/admin/saveUser') }}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Name</label>
                            {{--<input name="uName" type="text" value="" class="form-control" autofocus required>--}}
                            {{ Form::text('name', '', ['class' => 'form-control', 'required', 'autofocus']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email</label>
                            {{--<input name="email" type="email" value="" class="form-control" required>--}}
                            {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Password</label>
                            {{--<input name="uPassword" type="password" value="" class="form-control" required>--}}
                            {{ Form::password('password', ['class' => 'form-control', 'required']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Department</label>
                            <select name="department" class="form-control">
                                @foreach($departments as $department)
                                    <option value="{{$department->department_id}}">{{$department->department_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Role</label>
                            <select name="role" class="form-control">
                                @foreach($roles as $role)
                                    <option value="{{$role->id}}">{{$role->role_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                @foreach($status as $user_status)
                                    <option value="{{$user_status->id}}">{{$user_status->status_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-6"><span></span>
                    <div class="text-left">
                        <a href="{{url('/admin/showUsers')}}" class="btn btn-warning" type="button">All Users</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-right">
                        <button class="btn btn-success" type="submit">Add User</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    {{--
    <div class="container">
        <div class="row">
            <form action="{{ url('/admin/saveUser') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label>Name</label>
                    <input name="uName" type="text" value="">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="uEmail" type="email" value="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input name="uPassword" type="password" value="">
                </div>
                <div class="form-group">
                    <label>Department</label>
                    <select name="uDepartment">
                        @foreach($departments as $department)
                            <option value="{{$department->id}}">{{$department->department_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="uRole">
                        @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->role_name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Status</label>
                    <select name="uStatus">
                        @foreach($status as $user_status)
                            <option value="{{$user_status->id}}">{{$user_status->status_name}}</option>
                        @endforeach
                    </select>
                </div>

                <input class="btn btn-primary" type="submit" value="Add">
            </form>
        </div>
    </div>

    --}}
@endsection