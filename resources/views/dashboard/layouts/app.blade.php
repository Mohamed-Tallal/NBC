<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title>NBC</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{asset('dashboard_files/images/Group 1844.png')}}"​>
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard_files/css/main.css')}}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
@yield('style')
<body class="app sidebar-mini">
@include('dashboard.layouts.header')
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('dashboard.layouts._aside')

<main class="app-content">
   @yield('content')

    </div>
</main>
<!-- Essential javascripts for application to work-->
<script src="{{asset('dashboard_files/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/popper.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/bootstrap.min.js')}}"></script>
<script src="{{asset('dashboard_files/js/main.js')}}"></script>
<!-- The javascript plugin to display page loading on top-->
<script src="{{asset('dashboard_files/js/plugins/pace.min.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{asset('dashboard_files/js/plugins/chart.js')}}"></script>
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{asset('dashboard_files/js/plugins/bootstrap-notify.min.js')}}"></script>
<script type="text/javascript" src="{{asset('dashboard_files/js/plugins/sweetalert.min.js')}}"></script>

@yield('scripts')



<script>
    $('.delete').click(function(){
        var that = $(this);
        e.preventDefault();
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover this imaginary file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel plx!",
            closeOnConfirm: false,
            closeOnCancel: false
        }, function(isConfirm) {
            if (isConfirm) {
                swal("Deleted!", "Your imaginary file has been deleted.", "success");
                that.closest('form').submit();
            } else {
                swal("Cancelled", "Your imaginary file is safe :)", "error");
            }
        });
    });

</script>
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>

@include('includes.success')
@include('includes.errors')
@include('includes.warning')
</body>
</html>
