<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script>
    $(document).ready(function(){

        // Add Product

       $(document).on('click','.add_product',function(event){
        event.preventDefault();
        const name = $('#name').val();
        const price = $('#price').val();

        const productInfo = {
            name,
            price
        }

        console.log(productInfo)

        $.ajax({
            url: "{{route('add.product')}}",
            method:'POST',
            data:{name:name ,price:price},
            success:function(res){
                if(res.status === 'success'){
                    $('#add_product_form')[0].reset()
                    $('#addProductModal').click()
                    $('table').load(location.href+' table')
                    Command: toastr["success"](`Product has been added successfully`, "Product Added")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            },
            error:function(err){
                const error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.error_container').append("<span class='font-bold text-red-600'>"+value+'</span>'+'</br>' )
                });
            }
        })

       })

    //    update Product Form fillup

    $(document).on('click','#updateProductBtn',function(){

        const id = $(this).data('id')
        const name = $(this).data('name')
        const price = $(this).data('price')

        console.log({id,name,price})

        $('#up_id').val(id)
        $('#up_name').val(name)
        $('#up_price').val(price)
    })

    $(document).on('click','.update_product',function(event){
        event.preventDefault()
        const up_id = $('#up_id').val()
        const up_name = $('#up_name').val()
        const up_price = $('#up_price').val()


        const updatingInfo = {
            up_id,
            up_name,
            up_price
        }



        $.ajax({
            url : '{{route('update.product')}}',
            method:'POST',
            data:updatingInfo,
            success:function(res){
                if(res.status === 'success'){
                    $('#update_product_form')[0].reset();
                    $('#updateProductModal').click();
                    $('table').load(location.href+' table')
                    Command: toastr["info"](`Product has been updated successfully`, "Product Updated")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            },
            error:function(err){
                const error = err.responseJSON;
                $.each(error.errors,function(index,value){
                    $('.error_container').append("<span class='font-bold text-red-600'>"+value+'</span>'+'</br>' )
                });
            }
        })
    })

    $(document).on('click','#deleteBtn',function(){
        const productId = $(this).data('id')
        const productName = $(this).data('name')

        if(confirm(`Are tou sure to delete ${productName} ?`)){
            $.ajax({
            url:'{{ route('delete.product') }}',
            method:'DELETE',
            data:{productId},
            success:function(res){
                console.log(res)
                if(res.status === 'success'){
                    $('table').load(location.href+' table')
                    Command: toastr["warning"](`${productName} has been deleted successfully`, "Product Deleted ")
                    toastr.options = {
                        "closeButton": true,
                        "debug": false,
                        "newestOnTop": false,
                        "progressBar": true,
                        "positionClass": "toast-top-right",
                        "preventDuplicates": false,
                        "onclick": null,
                        "showDuration": "300",
                        "hideDuration": "1000",
                        "timeOut": "5000",
                        "extendedTimeOut": "1000",
                        "showEasing": "swing",
                        "hideEasing": "linear",
                        "showMethod": "fadeIn",
                        "hideMethod": "fadeOut"
                    }
                }
            }

        })
        }

    })


    })
</script>
