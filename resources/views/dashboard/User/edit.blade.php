@extends('dashboard.layouts.app')
@section('style')
    <style>
        .iStyle{
            padding-top: 3px;
        }
    </style>
@stop
@section('content')

    <div class="app-title">
        <div>
            <h1><i class="fa fa-dashboard"></i> Admins</h1>
            <p>Admin Pages </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('user.index')}}">Admins</a></li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="tile mb-3">
        <div class="row line-head d-flex">
            <div class="col-lg-10">
                <div class="page-header ">
                    <p class="mb-3" style="font-size: 20px" id="navs"> Update Admins  </p>
                </div>
            </div>
            <div class="col-lg-2">
                <a class="btn ml-auto " style="background-color: #009688;color: #ffff" id="navs" href="{{route('service.index')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    All Admins
                </a>
            </div>
        </div>
        <form method="post" action="{{route('user.update',$user->id)}}" enctype="multipart/form-data" class="p-1">
            @csrf
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-12">
                    <label>Admin Name</label>
                    <input class="form-control" type="text" name="name" value="{{$user->name}}">
                </div>
                <div class="col-md-12">
                    <label>Email</label>
                    <input class="form-control" type="email"  name="email" value="{{$user->email}}" >
                </div>
                <div class="col-md-12">
                    <label>Photo</label>
                    <input class="form-control" type="file"  name="logo">
                </div>
                <div class="col-md-12">
                    <label class="control-label">Password</label>
                    <input class="form-control" type="password"  name="password" >
                </div>
                <div class="col-md-12">
                    <label class="control-label">Confirm Password</label>
                    <input class="form-control" type="password"  name="password_confirmation" >
                </div>

            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
        </form>
    </div>
@endsection
