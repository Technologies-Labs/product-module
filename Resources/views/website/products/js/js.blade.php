<script>
    $(document).on('click','#save-product',function(w){
        w.preventDefault();
        var formData= new FormData($('#create-product-form')[0]);
        $.ajax({
            type:'post',
            enctype:"multipart/form-data",
            url:"{{route('products.store')}}",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            success: function(data){
                if(data.status==true){
                    $("#create_product").modal('hide');
                    $("#create-product-form")[0].reset();
                }
            },
            error: function(response){
                $('#error-msg').text(response.responseJSON.errors.name);
            },
        });
    });


    $(document).on('click','#update-product',function(w){
        w.preventDefault();
        var formData= new FormData($('#update-product-form')[0]);

        $.ajax({
            type:'put',
            enctype:"multipart/form-data",
            url:"{{route('products.update',3)}}",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            success: function(data){
                if(data.status==true){
                    $("#update_product").modal('hide');
                }
            },
            error: function(response){
                $('#error-msg').text(response.responseJSON.errors.name);
            },
        });
    });

    $(document).on('click','#-product',function(w){
        w.preventDefault();
        var formData= new FormData($('#update-product-form')[0]);

        $.ajax({
            type:'put',
            enctype:"multipart/form-data",
            url:"{{route('products.update',3)}}",
            data:formData,
            processData:false,
            contentType:false,
            cache:false,
            success: function(data){
                if(data.status==true){
                    $("#update_product").modal('hide');
                }
            },
            error: function(response){
                $('#error-msg').text(response.responseJSON.errors.name);
            },
        });
    });


</script>
