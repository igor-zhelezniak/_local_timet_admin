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
               <div class="box">
                   <div class="box-header with-border">
                       <h3 class="box-title">Use the form below to edit client information</h3>
                   </div>
               </div>
               <div class="box-body">
                   @if($errors->any())
                       @foreach ($errors->all() as $error)
                           <div class="alert alert-error">{{ $error }}</div>
                       @endforeach
                   @endif
                    <form action="{{url('/admin/saveEditClient')}}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Client name</label>
                                    <input name="id" type="hidden" value="{{Input::old('id', $customer->id)}}" class="form-control">
                                    <input name="name" type="text" value="{{Input::old('name', $customer->name)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Client code</label>
                                    <input name="code" type="text" value="{{Input::old('code', $customer->code)}}" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Status</label>
                                    {{ Form::select('status', $status, $customer->status, ['class' => 'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-left">
                                    <a href="{{url('/admin/showClients')}}" class="btn btn-warning" type="button">All Clients</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-right">
                                    <button class="btn btn-success" type="submit">edit Client</button>
                                </div>
                            </div>
                        </div>

                    </form>
               </div>
           </div>

       </div>
   </div>
{{--
   <div class="container">
       <div class="row">
           <form action="{{'/admin/saveClient'}}" method="post">
               {{ csrf_field() }}
               <div class="row">
                   <div class="form-group">
                       <label>Client name</label>
                       <input name="clientName" type="text" value="">
                   </div>
               </div>

               <div class="row">
                   <div class="form-group">
                       <label>Client code</label>
                       <input name="clientCode" type="text" value="">
                   </div>
               </div>


               <div class="form-group">
                   <label>Status</label>
                   <select name="clientStatus">
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
