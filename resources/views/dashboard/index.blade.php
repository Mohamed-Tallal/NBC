@extends('dashboard.layouts.app')
@section('content')


<div class="row">
        <div class="col-md-6 col-lg-3">
            <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Users</h4>
                    <p><b>{{$user}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small info coloured-icon"><i class="icon fa fa-tasks fa-3x"></i>
                <div class="info">
                    <h4>Our Project</h4>
                    <p><b>{{$product}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-briefcase fa-3x"></i>
                <div class="info">
                    <h4>Our services</h4>
                    <p><b>{{$service}}</b></p>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-3">
            <div class="widget-small danger coloured-icon"><i class="icon fa fa-microphone fa-3x"></i>
                <div class="info">
                    <h4>Testimonial</h4>
                    <p><b>{{$testmioinal}}</b></p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Monthly Projects</h3>
                <div class="embed-responsive embed-responsive-16by9">
                    <canvas class="embed-responsive-item" id="lineChartDemo"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <h3 class="tile-title">Edit Your Profile</h3>
                <form method="post" action="{{route('user.update',auth()->user()->id)}}" enctype="multipart/form-data">
                    @csrf
                    {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-12">
                            <label>Name </label>
                            <input class="form-control" type="text" name="name"  value="{{auth()->user()->name}}">
                        </div>
                        <div class="col-md-12">
                            <label>Email </label>
                            <input class="form-control" type="email" name="email" value="{{auth()->user()->email}}" >
                        </div>
                        <div class="col-md-12">
                            <label>Image</label>
                            <input class="form-control" type="file" name="logo" >
                        </div>
                        <div class="col-md-12">
                            <label>Password </label>
                            <input class="form-control" type="password" name="password" >
                        </div>
                        <div class="col-md-12">
                            <label>Confirm Password </label>
                            <input class="form-control" type="password" name="password_confirmation" >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
                    </div>
                </form>

            </div>
        </div>
@endsection
@section('scripts')
            <script type="text/javascript">
                var data = {
                    labels: ["January", "February", "March", "April", "May","June","July","August","September","October","November","December"],
                    datasets: [
                        {
                            label: "My Second dataset",
                            fillColor: "rgba(151,187,205,0.2)",
                            strokeColor: "rgba(151,187,205,1)",
                            pointColor: "rgba(151,187,205,1)",
                            pointStrokeColor: "#fff",
                            pointHighlightFill: "#fff",
                            pointHighlightStroke: "rgba(151,187,205,1)",
                            data: [
                                @foreach($post as $p)
                                     {{$p->sum .','}}
                                    @endforeach
                            ]
                        },
                    ]
                };
                var ctxl = $("#lineChartDemo").get(0).getContext("2d");
                var lineChart = new Chart(ctxl).Line(data);

            </script>
@endsection
