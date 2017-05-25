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
            <div class="box">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Use the form below to edit category information</h3>
                    </div>
                </div>
                <div class="box-body">
                    @if($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="alert alert-error">{{ $error }}</div>
                        @endforeach
                    @endif
                    <form action="{{url('/admin/saveEditCategory')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input name="categoryName" type="text" value="{{Input::old('categoryName',$category->name)}}" class="form-control">
                                    <input name="categoryId" type="hidden" value="{{$category->id}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category Code</label>
                                    <input name="categoryCode" type="text" value="{{Input::old('categoryCode',$category->code)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Category Description</label>
                                    <input name="categoryDescr" type="text" value="{{ Input::old('categoryDescr',$category->description) }}" class="form-control">
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
                                    <button class="btn btn-success" type="submit">Edit Category</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
