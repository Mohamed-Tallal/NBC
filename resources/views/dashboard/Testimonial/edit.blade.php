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
            <h1><i class="fa fa-dashboard"></i> Testimonial</h1>
            <p>Customer reviews Pages </p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('testimonial.index')}}">Testimonial</a></li>
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
                <a class="btn ml-auto " style="background-color: #009688;color: #ffff" id="navs" href="{{route('service.index')}}">
                    <i class="fa fa-home" aria-hidden="true"></i>
                    All Testimonial
                </a>
            </div>
        </div>
        <form method="post" action="{{route('testimonial.update',$testimonial->id)}}" enctype="multipart/form-data" class="p-1">
            @csrf
            {{method_field('PUT')}}
            <div class="row">
                <div class="col-md-12">
                    <label>Client Name</label>
                    <input class="form-control" type="text" name="name" value="{{$testimonial->name}}" >
                </div>
                <div class="col-md-12">
                    <label>Rat</label>
                    <input class="form-control" type="number" min="0" max="5" name="rate" value="{{$testimonial->rate}}">
                </div>

                <div class="col-md-12">
                    <label class="control-label">Message</label>
                    <textarea class="form-control" name="message" rows="6" placeholder="Enter your Description">{{$testimonial->message}}</textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
            </div>
        </form>
    </div>
@endsection
