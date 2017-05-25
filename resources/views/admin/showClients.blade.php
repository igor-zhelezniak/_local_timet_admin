<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 24.02.2017
 * Time: 21:12
 */
?>

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Clients</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($clients as $client)
                            <tr>
                                <td>{{$client->id}}</td>
                                <td>{{$client->code}}</td>
                                <td>{{$client->name}}</td>
                                <td><span class="label {{Statuses::getClassName($client->status_name)}}">{{$client->status_name}}</span></td>
                                <td>
                                    <a href="/admin/editClient/{{$client->id}}"><span class="label label-warning"><i class="icon fa fa-edit"></i> Edit</span></a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <div class="col-md-2">
                        <a href="{{ url('/admin/addClient') }}" class="btn btn-success" type="button">Add Client</a> <br />
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
                        <th>Code</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>{{$client->id}}</td>
                            <td>{{$client->code}}</td>
                            <td>{{$client->name}}</td>
                            <td>{{$client->status_name}}</td>
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
                <a href="{{ url('/admin/addClient') }}" ><input class="btn btn-success" type="submit" value="Add Client"></a> <br />
            </div>
            <div class="col-md-10">

            </div>
        </div>
    </div>
--}}
@endsection