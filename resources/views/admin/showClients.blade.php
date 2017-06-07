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

            @if(!\App\Plan::checkLimit('clients'))
                <div class="callout callout-warning">
                    <h4>Clients Limit!</h4>

                    <p>For a given tariff plan, a maximum of {{ \App\Plan::getLimit('clients') }} clients</p>
                </div>
            @endif

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Clients</h3>
                </div>
                <!-- /.box-header -->
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs ajax" data-ajaxurl="/ajaxGetClients">
                        <li class="active"><a href="0" data-toggle="tab" aria-expanded="true">All</a></li>
                        <li class=""><a href="2" data-toggle="tab" aria-expanded="false">Pending</a></li>
                        <li class=""><a href="3" data-toggle="tab" aria-expanded="false">In progress</a></li>
                        <li class=""><a href="4" data-toggle="tab" aria-expanded="false">Rejected</a></li>
                        <li class=""><a href="5" data-toggle="tab" aria-expanded="false">Approved</a></li>
                        <li class=""><a href="1" data-toggle="tab" aria-expanded="false">Not Approved</a></li>
                    </ul>
                </div>
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
                        @if(\App\Plan::checkLimit('clients'))
                            <a href="{{ url('/admin/addClient') }}" class="btn btn-success" type="button">Add Client</a> <br />
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