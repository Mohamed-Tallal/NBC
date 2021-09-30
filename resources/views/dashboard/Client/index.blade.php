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
            <form class="d-flex" action="{{route('client.index')}}" method="get">
                <input class="form-control w-75" id="exampleInputPassword1" name="search" type="text" placeholder="Search">
                <button class="btn btn-info ml-3" type="submit">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    Search
                </button>
            </form>
        </div>
    </div>
    <div class="tile mb-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-header">
                    <p class="mb-3 line-head" style="font-size: 20px" id="navs">Client Offers </p>
                </div>
            </div>
        </div>
        @if($clients->count() >0)
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
                                                <th style="width: 253px;">Client Name</th>
                                                <th style="width: 108px;">Client Email</th>
                                                <th style="width: 108px;">Project Type</th>
                                                <th style="width: 108px;">Budget</th>
                                                <th style="width: 108px;">Control</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($clients as $index=>$brand)
                                                <tr role="row" class="odd">
                                                    <td>{{++$index}}</td>
                                                    <td>{{$brand->name}}</td>
                                                    <td>{{$brand->email}}</td>
                                                    <td>{{$brand->type}}</td>
                                                    <td>{{$brand->cost_from}} , {{$brand->cost_to}}</td>
                                                    <td class="d-flex">
                                                        <a class="btn btn-warning mr-2 d-flex" href="{{route('client.show',$brand->id)}}" style="color: #fff" type="button">
                                                            <i class="fa fa-eye iStyle" style="color: #efe4c4" aria-hidden="true"></i>
                                                            Show
                                                        </a>
                                                        <form method="post" action="{{route('client.destroy',$brand->id)}}">
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
                                        {{$clients->appends(request()->query())->links('dashboard.mailpaginate')}}
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <h4 style="text-align: center;">There are no Client Offers</h4>
        @endif

    </div>

@endsection
