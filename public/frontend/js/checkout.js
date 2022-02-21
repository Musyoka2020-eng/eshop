$(document).ready(function () {
    $(".razorpay_btn").click(function (e) {
        e.preventDefault();

        var fname = $(".fname").val();
        var lname = $(".lname").val();
        var email = $(".email").val();
        var phone = $(".phone").val();
        var address1 = $(".address1").val();
        var address2 = $(".address2").val();
        var city = $(".city").val();
        var state = $(".state").val();
        var country = $(".country").val();
        var pincode = $(".pincode").val();

        if (!fname) {
            fname_error = "First Name is required";
            $("#fname-error").html("");
            $("#fname-error").html(fname_error);
        } else {
            fname_error = "";
            $("#fname-error").html("");
        }

        if (!lname) {
            lname_error = "Last Name is required";
            $("#lname-error").html("");
            $("#lname-error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname-error").html("");
        }
        if (!email) {
            email_error = "Email is required";
            $("#email-error").html("");
            $("#email-error").html(email_error);
        } else {
            email_error = "";
            $("#email-error").html("");
        }
        if (!phone) {
            phone_error = "Phone  is required";
            $("#phone-error").html("");
            $("#phone-error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone-error").html("");
        }
        if (!address1) {
            address1_error = "Primary Address is required";
            $("#address1-error").html("");
            $("#address1-error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1-error").html("");
        }
        if (!address2) {
            address2_error = "Secondary Address is required";
            $("#address2-error").html("");
            $("#address2-error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2-error").html("");
        }

        if (!city) {
            city_error = "City is required";
            $("#city-error").html("");
            $("#city-error").html(city_error);
        } else {
            city_error = "";
            $("#city-error").html("");
        }
        if (!state) {
            state_error = "State is required";
            $("#state-error").html("");
            $("#state-error").html(state_error);
        } else {
            state_error = "";
            $("#state-error").html("");
        }
        if (!country) {
            country_error = "Country is required";
            $("#country-error").html("");
            $("#country-error").html(country_error);
        } else {
            country_error = "";
            $("#country-error").html("");
        }
        if (!pincode) {
            pincode_error = "Pincode is required";
            $("#pincode-error").html("");
            $("#pincode-error").html(pincode_error);
        } else {
            pincode_error = "";
            $("#pincode-error").html("");
        }

        if (
            fname_error != "" ||
            lname_error != "" ||
            email_error != "" ||
            phone_error != "" ||
            address1_error != "" ||
            address2_error != "" ||
            city_error != "" ||
            state_error != "" ||
            country_error != "" ||
            pincode_error != ""
        ) {
            return false;
        } else {
            var data = {
                fname: fname,
                lname: lname,
                email: email,
                phone: phone,
                address1: address1,
                address2: address2,
                city: city,
                state: state,
                country: country,
                pincode: pincode,
            };

            $.ajax({
                type: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function (response) {
                    // alert(response.total_price)
                    // FjR5ICmZTWK1U6ChhV87msbm

                    var options = {
                        key: "rzp_test_z5PrFeLhYJdD0D", // Enter the Key ID generated from the Dashboard
                        amount: response.total_price*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                        currency: "INR",
                        name: response.fname+' '+response.lname,
                        description: "Thank for choosing Outlets",
                        image: "https://example.com/your_logo",
                        // order_id: "order_9A33XWu170gUtm", //This is a sample Order ID. Pass the `id` obtained in the response of Step 1
                        handler: function (response) {
                            alert(response.razorpay_payment_id);
                        },
                        prefill: {
                            name:  response.fname+' '+response.lname,
                            email: response.email,
                            contact: response.phone,
                        },
                        theme: {
                            color: "#3399cc",
                        },
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                }
            });
        }
    });
});
