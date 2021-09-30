@if(session('success'))

    <script>
        $.notify({
            title: "Success : ",
            message: "{{session('success')}}",
            icon: 'fa fa-check-circle-o'
        },{
            type: "success"
        });
    </script>



@endif
