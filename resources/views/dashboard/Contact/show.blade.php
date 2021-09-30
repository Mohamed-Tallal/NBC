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
            <h1><i class="fa fa-dashboard"></i> Dashboard</h1>
            <p>A free and open source Bootstrap 4 admin template</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{route('contact.index')}}">Mailbox</a></li>
            <li class="breadcrumb-item"><a href="#">Show</a></li>

        </ul>
    </div>
    <div class="col-md-12">
        <div class="tile">
            <section class="invoice">
                <div class="row mb-4">
                    <div class="col-6">
                        <h2 class="page-header"><i class="fa fa-globe"></i> NBC</h2>
                    </div>
                    <div class="col-6">
                        <h5 class="text-right">{{$offer->created_at->diffForHumans()}}</h5>
                    </div>
                </div>
                <div class="row invoice-info">
                    <div class="col-12 mb-2">
                        <div class="row border-bottom">
                            <div class="col-4"><h6>Client Name : </h6></div>
                            <div class="col-8">{{$offer->name}}</div>
                        </div>
                        <div class="row border-bottom p-1">
                            <div class="col-4"><h6>Client Email : </h6></div>
                            <div class="col-8">{{$offer->email}}</div>
                        </div>
                        <div class="row border-bottom p-1">
                            <div class="col-4"><h6>Client Phone : </h6></div>
                            <div class="col-8">{{$offer->phone}}</div>
                        </div>
                        <div class="row border-bottom p-1">
                            <div class="col-4"><h6>Message : </h6></div>
                            <div class="col-8">{{$offer->message}}</div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
