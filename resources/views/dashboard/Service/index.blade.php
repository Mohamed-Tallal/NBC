@extends('dashboard.layouts.app')
@section('style')
<style>
    .iStyle{
        padding-top: 3px;
    }
</style>
@stop
@section('content')
    <div class="row d-flex mb-4" >
        <div class="col col-lg-8">
            <form class="d-flex" action="{{route('service.index')}}" method="get">
                <input class="form-control w-75" id="exampleInputPassword1" name="search" type="text" placeholder="Search">
                <button class="btn btn-info ml-3" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Search
                </button>
            </form>
        </div>
        <div class="col col-lg-4" style="margin-left: -80px">

            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#staticBackdrop">
                <i class="fa fa-user-plus" aria-hidden="true"></i>
               Add Service
            </button>
        </div>
    </div>
    <div class="tile mb-4">
        <div class="row">
            <div class="col-lg-12">
                @if(isset($message))
                    <div class="bs-component">
                        <div class="alert alert-dismissible alert-success">
                            <button class="close" type="button" data-dismiss="alert">×</button>
                            {{$message}}
                        </div>
                    </div>
                @endif

                <div class="page-header">
                    <p class="mb-3 line-head" style="font-size: 20px" id="navs">Our Services </p>
                </div>
            </div>
        </div>
        @if($services->count() >0)
            <div class="row">
                <div class="col-md-12">
                    <div class="tile-body">
                        <div class="table-responsive">
                            <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover table-striped no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                                            <thead>
                                            <tr role="row">
                                                <th style="width: 150px;">#</th>
                                                <th style="width: 253px;">Tittle</th>
                                                <th style="width: 108px;">Image</th>
                                                <th style="width: 108px;">Description</th>
                                                <th style="width: 108px;">Control</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($services as $index=>$brand)
                                                <tr role="row" class="odd ">
                                                    <td>{{++$index}}</td>
                                                    <td>{{$brand->tittle}}</td>
                                                    <td><img src="{{asset('uploads/service/'.$brand->img)}}" style="height: 60px;text-align: center"></td>
                                                    <td>{{$brand->small_desc}}</td>
                                                    <td class="d-flex">
                                                        <a class="btn btn-primary mr-2 d-flex" href="{{route('service.edit',$brand->id)}}" style="color: #fff" type="button">
                                                            <i class="fa fa-pencil iStyle" aria-hidden="true"></i>
                                                            Update
                                                        </a>

                                                        <form method="post" action="{{route('service.destroy',$brand->id)}}">
                                                            @csrf
                                                            {{method_field('delete')}}
                                                            <button class="btn btn-danger d-flex" type="submit">
                                                                <i class="fa fa-user-times iStyle" aria-hidden="true"></i>
                                                                Delete
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div style="margin-top: -6px" class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite"></div>
                                    </div>
                                    <div class="col-sm-12 col-md-7" >
                                        {{$services->appends(request()->query())->links('dashboard.paginate')}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h4 style="text-align: center;">There are no Services</h4>
        @endif

    </div>
    <div class="modal fade" id="staticBackdrop" data-backdrop="static"
         data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add New Service </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <label>Tittle </label>
                                <input class="form-control" type="text" name="tittle" >
                            </div>
                            <div class="col-md-12">
                                <label>Image</label>
                                <input class="form-control" type="file" name="logo" >
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Bio</label>
                                <textarea class="form-control" name="small_desc" rows="4" placeholder="Enter your Bio"></textarea>
                            </div>
                            <div class="col-md-12">
                                <label class="control-label">Description</label>
                                <textarea class="form-control" name="desc" rows="6" placeholder="Enter your Description"></textarea>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection
