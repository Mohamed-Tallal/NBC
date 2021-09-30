@if(session('warning'))
<script>
    $.notify({
        title: "Update Complete : ",
        message: "Something cool is just updated!",
        icon: 'fa fa-exclamation'
    },{
        type: "warning"
    });
</script>



@endif
