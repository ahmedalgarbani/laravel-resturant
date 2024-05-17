<script>

    function showLoader(){
        $(".overlay-container").removeClass("d-none");

        $(".overlay").addClass("active");
    }
    function hideLoader(){
        $(".overlay-container").addClass("d-none");
        $(".overlay").removeClass("active");
    }


    function loadidpopup(productId){
        $.ajax({
            url: '{{ route("load.product", ':productId') }}'.replace(':productId', productId),
            method: 'GET',
            beforeSend:function (){
                $(".overlay-container").removeClass("d-none");
                $(".overlay").addClass("active");
                $('#cartModal').modal('show');

            },
            success: function(response) {

                $(".load_product_modal_body").html(response);
                $('#cartModal').modal('show');
                updateSideBarItems()


            },
            error: function(xhr, status, error) {
                console.log(error);
            },
            complete: function (){

                $(".overlay-container").addClass("d-none");

                $(".overlay").removeClass("active");
            }
        });

    }

    function addToWishList(productId){
        $.ajax({
            url: '{{ route("add-to-wishlist", ':productId') }}'.replace(':productId', productId),
            method: 'POST',
            beforeSend:function (){
            showLoader()

            },
            success: function(response) {

            toastr.success(response.message)


            },
            error: function(xhr, status, error) {
                let errors = xhr.responseJSON.errors
                hideLoader()
                $.each(errors,function (index,value){
                    toastr.error(value)
                })

            },
            complete: function (){
            hideLoader()

            }
        });

    }

    function removeWishlist(productId){
        $.ajax({
            url: '{{ route("remove-to-wishlist", ':productId') }}'.replace(':productId', productId),
            method: 'POST',
            beforeSend:function (){
            showLoader()

            },
            success: function(response) {

            toastr.success(response.message)


            },
            error: function(xhr, status, error) {
                let errors = xhr.responseJSON.errors
                hideLoader()
                $.each(errors,function (index,value){
                    toastr.error(value)
                })

            },
            complete: function (){
            hideLoader()

            }
        });

    }

//    card content

        $(document).ready(function (){
        $('input[name="product_size"]').on("change",function (){
        v_updateTotalPrice();
    })

        $('input[name="product_option[]"]').on("change",function (){
            v_updateTotalPrice();
    })

        $('.increment').on("click",function (e){
        e.preventDefault()
        let Quantity = $('#qtr')
        let currentQuantity = parseFloat(Quantity.val())
        Quantity.val(currentQuantity+1)
            v_updateTotalPrice()
    })

        $('.decrement').on("click",function (e){
        e.preventDefault()
        let Quantity = $('#qtr')
        let currentQuantity = parseFloat(Quantity.val())
        if(currentQuantity>1){
        Quantity.val(currentQuantity-1)
            v_updateTotalPrice()
    }
    })

        function v_updateTotalPrice(){
        let basePrice=parseFloat($('input[name="base_price"]').val())
        let selectedSizePrice = 0
        let selectedOptionPrice = 0
        let Quantity = $('#qtr')
        let currentQuantity = parseFloat(Quantity.val())


        let selectedSize = $('input[name="product_size"]:checked')
        if(selectedSize.length >0){
        selectedSizePrice = parseFloat(selectedSize.data("price"))
    }

        let selectedOptions = $('input[name="product_option[]"]:checked');

        selectedOptions.each(function() {
        selectedOptionPrice += parseFloat($(this).data("price"));
    });


        let total = parseFloat((basePrice+selectedSizePrice + selectedOptionPrice)*currentQuantity)

        $('#total').text(`{{config('settings.currency_icon')}}`+total)
            $('#ahmed').val(total)

        }


        /*
        *
        * add to card ajax
        * */



        $("#v_to_card_modal").on("submit",function (e){
        e.preventDefault()
        let formatDate = $(this).serialize()
        $.ajax({
        method:'POST',
        url:'{{route('add-to-card')}}',
        data:formatDate,
        beforeSend:function (){
        $('.add_card_button_modal').html(` <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`)
        $('.add_card_button_modal').attr('disabled',true)
    },
        success:function (response){
        updateSideBarItems()

        toastr.success(response.message)
    },
        error:function (xhr,status,error){
        let errormessage = xhr.responseJSON.message
        toastr.error(errormessage)
    },
        complete:function (){
        $('.add_card_button_modal').html(`add to card`)
        $('.add_card_button_modal').attr('disabled',false)

    }
    })
    })


    })


</script>
