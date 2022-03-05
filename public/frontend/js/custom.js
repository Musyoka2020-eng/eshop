$(document).ready(function() {
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
            success: function(response) {
                $(".cart-count").html("");
                $(".cart-count").html(response.count);
                // console.log(response.count)
            },
        });
    }

    function loadwishlist() {
        $.ajax({
            type: "GET",
            url: "/load-wishlist-count",
            success: function(response) {
                $(".wishlist-count").html("");
                $(".wishlist-count").html(response.count);
                // console.log(response.count)
            },
        });
    }

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $(".addToCartBtn").click(function(e) {
        e.preventDefault();
        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();
        var product_qty = $(this)
            .closest(".product_data")
            .find(".qty-input")
            .val();

        $.ajax({
            type: "POST",
            url: "/add-to-cart",
            data: {
                product_id: product_id,
                product_qty: product_qty,
            },
            success: function(response) {
                swal(response.status).then((value) =>
                    loadcart());
            },
        });
    });

    $(".addtowishlist").click(function(e) {
        e.preventDefault();

        var product_id = $(this)
            .closest(".product_data")
            .find(".prod_id")
            .val();

        $.ajax({
            type: "POST",
            url: "/add-to-wishlist",
            data: {
                product_id: product_id,
            },
            success: function(response) {
                swal(response.status).then((value) =>
                    loadwishlist());
            },
        });
    });

    $(document).on("click", ".increment-btn", function(e) {
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

    $(document).on("click", ".decrement-btn", function(e) {
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

    $(document).on("click", ".delete-cart-item", function(e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajax({
            type: "POST",
            url: "delete-cart-item",
            data: {
                prod_id: prod_id,
            },
            success: function(response) {
                // window.location.reload();
                loadcart();
                $(".cartitems").load(location.href + " .cartitems");
                swal("", response.status, "success");
            },
        });
    });

    $(document).on("click", ".remove-wishlist-item", function(e) {
        e.preventDefault();

        var prod_id = $(this).closest(".product_data").find(".prod_id").val();
        $.ajax({
            type: "POST",
            url: "delete-wishlist-item",
            data: {
                prod_id: prod_id,
            },
            success: function(response) {
                // window.location.reload();
                loadwishlist();
                $(".wishlistitems").load(location.href + " .wishlistitems");
                swal("", response.status, "success");
            },
        });
    });

    $(document).on("click", ".changeQuantity", function(e) {
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
            success: function(response) {
                // window.location.reload();
                $(".cartitems").load(location.href + " .cartitems");
            },
        });
    });

});

// owlCarousel
$(document).ready(function() {
    // owl carousel category
    var owl = $('.category-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        dots: false,
        smartSpeed: true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
    });
    $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
    })
});
$(document).ready(function() {
    // featured products carousel
    var owl = $('.featured-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        dots: false,
        smartSpeed: true,
        slideSpeed: 1000,
        autoplaySpeed: 2000,

    });
    owl.on('mousewheel', '.owl-stage', function(e) {
        if (e.deltaY > 0) {
            owl.trigger('next.owl');
        } else {
            owl.trigger('prev.owl');
        }
        e.preventDefault();
    });
});
$(document).ready(function() {
    // owl carousel
    var owl = $('.rated-carousel');
    owl.owlCarousel({
        items: 4,
        loop: true,
        margin: 10,
        dots: false,
        smartSpeed: true,
        autoplay: true,
        autoplayTimeout: 1000,
        autoplayHoverPause: true
    });
    $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
    })
    $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
    })
});