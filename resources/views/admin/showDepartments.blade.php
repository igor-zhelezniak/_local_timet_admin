@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Departments</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{$department->department_id}}</td>
                                <td>{{$department->department_code}}</td>
                                <td>{{$department->department_name}}</td>
                                <td>
                                    <a href="/admin/editDepartment/{{$department->department_id}}"><span class="label label-warning"><i class="icon fa fa-edit"></i> Edit</span></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    @if(Auth::user()->hasRole(1))
                            <div class="col-md-2">
                                <a href="{{ url('/admin/addDepartments') }}" class="btn btn-success" type="button" >Add Department</a> <br />
                            </div>
                    @endif
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
                        <th>Code</th>
                        <th>Name</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                            <tr>
                                <td>{{$department->id}}</td>
                                <td>{{$department->department_code}}</td>
                                <td>{{$department->department_name}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            --}}
        </div>
    </div>
    {{--
    @if(Auth::user()->hasRole(1))
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <a href="{{ url('/admin/addDepartments') }}" ><input class="btn btn-success" type="submit" value="Add Department"></a> <br />
            </div>
            <div class="col-md-10">

            </div>
        </div>
    </div>
    @endif
    --}}
@endsection