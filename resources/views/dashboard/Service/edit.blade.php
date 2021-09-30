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
            <h1><i class="fa fa-dashboard"></i> Our Service</h1>
            <p> Our Service Page </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('service.index')}}">Service</a></li>
            <li class="breadcrumb-item"><a href="#">Edit</a></li>
        </ul>
    </div>
    <div class="tile mb-3">
        <div class="row line-head d-flex">
            <div class="col-lg-10">
                <div class="page-header ">
                    <p class="mb-3" style="font-size: 20px" id="navs"> Update Services  </p>
                </div>
            </div>
            <div class="col-lg-2">
                <a class="btn ml-auto btn-sm" style="background-color: #009688;color: #ffff" id="navs" href="{{route('service.index')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    All Projects
                </a>
            </div>
        </div>
        <form method="post" action="{{route('service.update',$service->id)}}" enctype="multipart/form-data" class="p-1">
            @csrf
            {{method_field('Put')}}
            <div class="row">
                <div class="col-md-12">
                    <label>Tittle </label>
                    <input class="form-control" type="text" name="tittle" value="{{$service->tittle}}">
                </div>
                <div class="col-md-12">
                    <label>Image</label>
                    <input class="form-control" type="file" name="logo" >
                </div>
                <div class="col-md-12">
                    <label class="control-label">Bio</label>
                    <textarea class="form-control" name="small_desc" rows="4" placeholder="Enter your Bio">{{$service->small_desc}}</textarea>
                </div>
                <div class="col-md-12">
                    <label class="control-label">Description</label>
                    <textarea class="form-control" name="desc" rows="6" placeholder="Enter your Description">{{$service->desc}}</textarea>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
        </form>
    </div>
@endsection
