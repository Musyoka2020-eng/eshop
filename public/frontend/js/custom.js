$(document).ready(function () {
    loadcart();
    loadwishlist();

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    function loadcart() {
        $.ajax({
            type: "GET",
            url: "/load-cart-data",
            success: function (response) {
                $('.cart-count').html('');
                $(".cart-count").html(response.count);
                // console.log(response.count)
            },
        });
    }


    function loadwishlist() {
        $.ajax({
            type: "GET",
            url: "/load-wishlist-count",
            success: function (response) {
                $('.wishlist-count').html('');
                $(".wishlist-count").html(response.count);
                // console.log(response.count)
            },
        });
    }

    $(".addToCartBtn").click(function (e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function (response) {
                swal(response.status);
                loadcart();
            },
        });
    });

    $(".addtowishlist").click(function (e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });
        $.ajax({
            type: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function (response) {
                swal(response.status);
                loadwishlist()
            },
        });
    });

    $(document).on('click','.increment-btn', function (e) {

        e.preventDefault();

        var inc_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(document).on('click','.decrement-btn', function (e) {

        e.preventDefault();

        var dec_value = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();
        var value = parseInt(dec_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $(this).closest(".product_data").find(".qty-input").val(value);
        }
    });

    $(document).on('click','.delete-cart-item', function (e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                // window.location.reload();
                loadcart();
              $('.cartitems').load(location.href + " .cartitems");
                swal("", response.status, "success");
            },
        });
    });

    $(document).on('click','.remove-wishlist-item', function (e) {

        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajax({
            type: "POST",
            url: "delete-wishlist-item",
            data: {
                prod_id: prod_id,
            },
            success: function (response) {
                // window.location.reload();
              loadwishlist();
              $('.wishlistitems').load(location.href + " .wishlistitems");
                swal("", response.status, "success");
            },
        });
    });

    $(document).on('click','.changeQuantity', function (e) {

        e.preventDefault();

        $.ajaxSetup({
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
        });

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        var qty = $(this).closest(".product_data").find(".qty-input").val();
        data = {
            prod_id: prod_id,
            prod_qty: qty,
        };

        $.ajax({
            type: "POST",
            url: "update-cart",
            data: data,
            success: function (response) {
                // window.location.reload();
              $('.cartitems').load(location.href + " .cartitems");
            },
        });
    });
});