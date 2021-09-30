@extends('dashboard.layouts.app')
@section('style')
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
            <h1><i class="fa fa-dashboard"></i> Our Project </h1>
            <p>Our Project page </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('product.index')}}">Our Project</a></li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="tile mb-4">
        <div class="row line-head d-flex">
            <div class="col-lg-10">
                <div class="page-header ">
                    <p class="mb-3" style="font-size: 20px" id="navs"> Update Project  </p>
                </div>
            </div>
            <div class="col-lg-2">
                <a class="btn ml-auto btn-sm" style="background-color: #009688;color: #ffff" id="navs" href="{{route('product.index')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    All Projects
                </a>
            </div>
        </div>
        <form method="post" class="mt-3" action="{{route('product.update',$product->id)}}" enctype="multipart/form-data">
            @csrf
            {{method_field('PATCH')}}
            <div class="row">
                <div class="col-md-12">
                    <label>Project Name </label>
                    <input class="form-control" type="text" name="name" value="{{$product->name}}" >
                </div>
                <div class="col-md-12">
                    <label>Project Image</label>
                    <input class="form-control" type="file" name="logo" >
                </div>
            </div>


            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
        </form>

    </div>

@endsection
