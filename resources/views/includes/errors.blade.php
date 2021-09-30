@php
    function isJSON($jsonobj){
    return is_string($jsonobj) && is_array(json_decode($jsonobj, true)) ? 1 : 0;
    }
@endphp

@if(session('errors'))
        @foreach(json_decode(session('errors')) as $key => $value) {
        <script>
            $.notify({
                title: "Something Wrong : ",
                message: "{{$value[0]}}",
                icon: 'fa fa-exclamation-circle'
            },{
                type: "danger"
            });
        </script>
        @endforeach

@endif



