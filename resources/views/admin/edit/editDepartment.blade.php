@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Use the form below to edit department information</h3>
                    </div>
                </div>
                <div class="box-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-error">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{url('/admin/saveEditDepartment')}}" method="post">
                        {{ csrf_field() }}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department Name</label>
                                    <input name="depId" type="hidden" value="{{$department->id}}" class="form-control">
                                    <input name="depName" type="text" value="{{$department->department_name}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Department Code</label>
                                    <input name="depCode" type="text" value="{{$department->department_code}}" class="form-control">
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="text-left">
                                <a href="{{url('/admin/showDepartments')}}" class="btn btn-warning" type="button">All Departments</a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <button class="btn btn-success" type="submit">Edit Department</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection