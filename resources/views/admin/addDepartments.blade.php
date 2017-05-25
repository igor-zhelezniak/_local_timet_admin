@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <form action="{{url('/admin/saveDepartments')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department Name</label>
                            <input name="depName" type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Department Code</label>
                            <input name="depCode" type="text" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-left">
                            <a href="{{url('/admin/showDepartments')}}" class="btn btn-warning" type="button">All Departments</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <button class="btn btn-success" type="submit">Add Department</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection