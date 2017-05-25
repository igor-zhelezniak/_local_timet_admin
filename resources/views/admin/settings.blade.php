<?php
/**
 * Created by PhpStorm.
 * User: Dima
 * Date: 18.04.2017
 * Time: 22:22
 */
?>
@extends('layouts.app')

@section('content')
    Setting page
    <form action="{{url('/admin/uploadLogo')}}" method="POST" enctype="multipart/form-data">
        {{csrf_field()}}
        <input name="userFile" type="file">
        <button class="btn btn-success" type="submit">Upload</button>
    </form>
@endsection
