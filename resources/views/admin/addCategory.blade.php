<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 07.03.2017
 * Time: 0:43
 */
?>
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <form action="{{url('/admin/saveCategories')}}" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input name="categoryName" type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category Code</label>
                            <input name="categoryCode" type="text" value="" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Category Description</label>
                            <input name="categoryDescr" type="text" value="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="text-left">
                            <a href="{{url('/admin/showCategories')}}" class="btn btn-warning" type="button">All Categories</a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="text-right">
                            <button class="btn btn-success" type="submit">Add Category</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
