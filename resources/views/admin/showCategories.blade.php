<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 07.03.2017
 * Time: 0:49
 */
?>
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @if(!\App\Plan::checkLimit('categories'))
                <div class="callout callout-warning">
                    <h4>Categories Limit!</h4>

                    <p>For a given tariff plan, a maximum of {{ \App\Plan::getLimit('categories') }} categories</p>
                </div>
            @endif

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Categories</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Actions</th>
                        </tr>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->category_id}}</td>
                                <td>{{$category->code}}</td>
                                <td>{{$category->name}}</td>
                                <td>{{$category->description}}</td>
                                <td>
                                    <a href="/admin/editCategory/{{$category->category_id}}"><span class="label label-warning"><i class="icon fa fa-edit"></i> Edit</span></a>
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
                            @if(\App\Plan::checkLimit('categories'))
                                <a href="{{ url('/admin/addCategories') }}" class="btn btn-success" type="button">Add Category</a> <br />
                            @endif
                        </div>
                    @endif
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
                        <th>Description</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->code}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->description}}</td>
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
                <a href="{{ url('/admin/addCategories') }}" ><input class="btn btn-success" type="submit" value="Add Category"></a> <br />
            </div>
            <div class="col-md-10">

            </div>
        </div>
    </div>
    @endif
    --}}
@endsection

