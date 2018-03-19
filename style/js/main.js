$(document).ready(function () {
    $body = $("body");
    var modal = document.getElementById('myModal');
    var btn = document.getElementById("myBtn");
    var span = document.getElementsByClassName("close")[0];

    btn.onclick = function () {
        modal.style.display = "block";
    }

    span.onclick = function () {
        closePopup();
    }

    window.onclick = function (event) {
        if (event.target == modal) {            
            closePopup();
        }
    }

    function openPopup(heading, message, status) {
        if (status == "error") {
            heading = '<img class = "modal-icon" src = "assets/icon/error.jpg" />' + heading;
        }
        else if (status == "question") {
            heading = '<img class = "modal-icon" src = "assets/icon/question.png" />' + heading;
        }
        else if (status == "ok") {
            heading = '<img class = "modal-icon" src = "assets/icon/tick.png" />' + heading;
        }

        $("#modal-heading").html(heading);
        $("#modal-message").html(message);
        $("#myModal").css("display", "block");
        // modal.style.display = "block";
    }
    function toTitleCase(str)
    {
        return str.replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();});
    }
    function closePopup() {
        $("#myModal").css("display", "none");
        $("#modal-heading").html("");
        $("#modal-message").html("");
    }
    
    var init = 0;
    $(document).on({
        ajaxStart: function() { $body.addClass("loading");    },
        ajaxStop: function() { $body.removeClass("loading"); }    
    });


    $('input[name = "date_today"').val($.datepicker.formatDate('mm-dd-yy', new Date()));
    
    

    

    var errorMsg;

    var year_model_select = $('select[name="year_model"]');
    var make_select = $('select[name="make"]');
    var current_step = 1;

    var date_today = "";
    var same_sale_date = null;
    var date_sold = "";

    var form_completed_by = "";
    var number_of_seller = $('select[name="number_of_seller"]').val();
    var buyer_or_seller_attach_file = null;
    var dealer_name = "";
    var dealer_number = "";
    var sellers_last_name1 = "";
    var sellers_middle_name1 = "";
    var sellers_first_name1 = "";
    var sellers_last_name2 = "";
    var sellers_middle_name2 = "";
    var sellers_first_name2 = "";


    var seller_street_address = "";
    var seller_address_line_2 = "";
    var seller_city = "";
    var seller_state = "";
    var seller_zip = "";
    var seller_phone = "";
    var seller_email_address = "";

    var vin_number = "";
    var year_model = "";
    var make = "";
    var older_year = "";
    var other_make = "";
    var license_plate = "";
    var vehicle_attach_doc = null;

    var is_vehicle_gift = "";
    var gift_reason_relationship = "";
    var value_of_gift = "";


    var buyer_last_name = "";
    var buyer_middle_name = "";
    var buyer_first_name = "";
    var buyer_street_address = "";
    var buyer_address_line_2 = "";
    var buyer_city = "";
    var buyer_zip = "";
    var buyer_state = "";
    var buyer_phone = "";
    var buyer_email = "";
    var step2initialized = false;


    initDataBinding();

    showNextStep(0);
    function showNextStep(step) {
        step++;        
        init++;
        if (init < 1) return;

        if (step > 6 || step < 0) return;        

        for (var i = 1; i <= 6; i++) {
            if (i == step) {
                var id = "#step" + i;
                $(id).show();
                if (step == 2) {
                    initstep2();
                    $('select[name = form_completed_by]').val('seller');
                    $('select[name = form_completed_by]').trigger('change');
                }


                current_step = step;
                continue;
            }
            else {
                $("#step" + i).hide()
            }
        }
    }

    function showPreviousStep(step) {//return;
        step--;
        if (step > 6 || step < 1) return;

        if (init < 1) return;

        for (var i = 1; i <= 6; i++) {
            if (i == step) {
                var id = "#step" + i;
                $(id).show();
                if (step == 2) {
                    initstep2();
                }

                current_step = step;
                continue;
            }
            else {
                $("#step" + i).hide()
            }
        }
    }



    $(".submit_button").click(function () {
        var data = $(this).attr('id').split("-");
        if (data[0] == "next" && validate(parseInt(data[1]))) {
            showNextStep(parseInt(data[1]));
        }
        else if (data[0] == "prev") {
            showPreviousStep(parseInt(data[1]));
        }
    });


    $('#FSForm').submit(function() {
        //return false;
    });

    $("input[name='vin_number']").keyup(function () {
        year_model_select.val("");
        make_select.val("");
        console.log("key up");
    });

    $("input[name='vin_number']").blur(function () {
        var data = $(this).val();
        if (data == "") {
            return;
        }

        $.post("https://vpic.nhtsa.dot.gov/api/vehicles/DecodeVINValuesBatch/",
            {
                data: data,
                format: "json"
            },
            function (data, status) {
                if (status != "success") { alert("Error retriving car information"); }
                if (data.Count != 1) { alert("No car info found") }
                var car = data.Results[0];

                if (car.ModelYear < 1951) {
                    year_model_select.append($('<option>', {
                        value: car.ModelYear,
                        text: car.ModelYear
                    }));
                }
                year_model = car.ModelYear;
                $('select[name="year_model"]').val(car.ModelYear);
                // $('select[name="year_model"]').trigger("change");

                make_select.append($('<option>', {
                    value: car.Make,
                    text: car.Make
                }));

                make = car.Make;
                $('select[name="make"]').val(car.Make);
                // $('select[name="make"]').trigger('change');
                // alert($('select[name="year_model"]').val());
            }
        );

    });

    $("#seller-verify-button").click(function (e) {
        if (!validate(3)) {
            return;
        }

        var userId = "069AUTOR3846";
        seller_street_address = $('input[name="seller_street_address"]').val();
        seller_address_line_2 = $('input[name="seller_address_line_2"]').val();
        seller_city = $('input[name="seller_city"]').val();
        seller_state = $('select[name="seller_state"]').val();
        seller_zip = $('input[name="seller_zip"]').val();

        var zip4 = "";
        var zip5 = "";
        if (seller_zip.length == 4) {
            zip4 = seller_zip;
        }
        else if (seller_zip.length == 5) {
            zip5 = seller_zip;
        }
   
        $.post("test.php",
            {
                seller_street_address: seller_street_address,
                seller_address_line_2: seller_address_line_2,
                seller_city: seller_city,
                seller_state: seller_state,
                seller_zip4: zip4,
                seller_zip5: zip5,
            },
            function (data, status) {
                console.log(data);
                if (status != "success" ) { alert("Error verifying address"); }
                data = data.Address;
                try {
                    openPopup("Error", data.Error.Description, "error");
                }
                catch(e) {
                    $("#next-3").attr("disabled", false);
                    getAddress(data)
                }

            }
        );

    });

    $("#buyer-verify-button").click(function (e) {
        if (!validate(6)) {
            return;
        }

        var userId = "069AUTOR3846";
        seller_street_address = $('input[name="buyer_street_address"]').val();
        seller_address_line_2 = $('input[name="buyer_address_line_2"]').val();
        seller_city = $('input[name="buyer_city"]').val();
        seller_state = $('select[name="buyer_state"]').val();
        seller_zip = $('input[name="buyer_zip"]').val();

        var zip4 = "";
        var zip5 = "";
        if (buyer_zip.length == 4) {
            zip4 = buyer_zip;
        }
        else if (buyer_zip.length == 5) {
            zip5 = buyer_zip;
        }
   
        $.post("test.php",
            {
                seller_street_address: seller_street_address,
                seller_address_line_2: seller_address_line_2,
                seller_city: seller_city,
                seller_state: seller_state,
                seller_zip4: zip4,
                seller_zip5: zip5,
            },
            function (data, status) {
                console.log(data);
                if (status != "success" ) { alert("Error verifying address"); }
                data = data.Address;
                try {
                    openPopup("Error", data.Error.Description, "error");
                }
                catch(e) {
                    $("#modal-next-button").hide();
                    // $("#modal-submit-button").show();
                    // $("#modal-submit-button").click(function() {
                    //     $("#final-submit-button").trigger('click');
                    // });
                    $("#final-submit-button").attr("disabled", false);
                    getAddress(data);
                }                

            }
        );

    });



    $('input:radio[name="same_sale_date_radio"]').change(function () {
        if ($(this).val() == 'yes') {
            $("#div-sold-date").show();
        } else {
            $("input[name=date_sold]").val("");
            $("#div-sold-date").hide();
        }
    });

    $('input:checkbox[name="bypass_verification_checkbox"]').change(function () {
        if(this.checked) {
            $("#seller-verify-button").attr("disabled", "disabled");
            $("#next-3").attr("disabled", false);
        } else {
            $("#next-3").attr("disabled", "disabled");
            $("#seller-verify-button").attr("disabled", false);
        }
    });

    $('input:checkbox[name="bypass_verification_checkbox_buyer"]').change(function () {
        if(this.checked) {
            $("#buyer-verify-button").attr("disabled", "disabled");
            $("#final-submit-button").attr("disabled", false);
        } else {
            $("#final-submit-button").attr("disabled", "disabled");
            $("#buyer-verify-button").attr("disabled", false);
        }
    });

    $("#final-submit-button").click(function() {
        // var frm = document.getElementsByName('bill-form');
        $('form#FSForm').submit();
        // $('form#FSForm')[0].reset();
        // frm.reset();  // Reset all form data
        return true;
    });


    $('input.name').keypress(function (e) {
        var regex = new RegExp("^[a-zA-Z .]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        // alert('Please Enter Alphabate');
        return false;
        }
    });

    $('input.phone').keypress(function (e) {
        var regex = new RegExp("^[0-9-+ ]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        // alert('Please Enter Alphabate');
        return false;
        }
    });

    $('input.number').keypress(function (e) {
        var regex = new RegExp("^[0-9]+$");
        var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        if (regex.test(str)) {
            return true;
        }
        else
        {
        e.preventDefault();
        // alert('Please Enter Alphabate');
        return false;
        }
    });

    function isEmail(email) {
        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return regex.test(email);
    }
    

    $("select[name = buyer_seller_attach_file]").change(function() {
        let selected = $(this).val();
        if (selected == "no") {
            $("#div-result-file-upload-buyer-seller").hide();
        }
        else {
            $("#div-result-file-upload-buyer-seller").show();
        }
    });
    $("select[name = vehicle_attach_doc]").change(function() {
        let selected = $(this).val();
        if (selected == "no") {
            $("#vehicle_attachment_div").hide();
        }
        else {
            $("#vehicle_attachment_div").show();
        }
    });

    

    



    // STEP 5





    // STEP 5 Ends

    $('select[name="is_vehicle_gift"]').change(function () {
        var selected = $(this).val();
        if (selected == 'yes') {
            $("#gift-reason-relationship").show();
        }
        else {
            $("#gift-reason-relationship").hide();
        }
    });

    $('select[name="seller_state"]').change(function () {
        seller_state = $(this).val();
    });




    // STEP 4

    $('select[name="year_model"]').change(function () {
        var selected = $(this).val();
        if (selected == 'older') {
            $("#older-year").show();
        }
        else {
            $("#older-year").hide();
        }
    });

    $('select[name="make"]').change(function () {
        var selected = $(this).val();
        if (selected == 'other') {
            $("#other-make").show();
        }
        else {
            $("#other-make").hide();
        }
    });




    // STEP $ ENDS




    // STEP 2
    $('select[name="form_completed_by"]').change(function () {
        let selected = $(this).val();
        form_completed_by = selected;
        if (selected == 'seller') {
            filledBySeller();
        }
        else if (selected == "dealer") {
            filledByDealer();
        }
        else {
            initstep2();
        }
    });

    $('select[name="number_of_seller"]').change(function () {
        var selected = $(this).val();
        number_of_seller = selected;
        if (selected == '2') {
            $("#additional-seller-heading").show();
            $("#div-sellers-last-name1").show();
            $("#div-sellers-middle-name1").show();
            $("#div-sellers-first-name1").show();
            $("#div-sellers-last-name2").show();
            $("#div-sellers_middle-name2").show();
            $("#div-sellers-first-name2").show();

        }
        else {
            $("#first-seller-heading").show();
            $("#div-sellers-last-name1").show();
            $("#div-sellers-middle-name1").show();
            $("#div-sellers-first-name1").show();
            $("#div-sellers-last-name2").hide();
            $("#div-sellers_middle-name2").hide();
            $("#div-sellers-first-name2").hide();
            $("#additional-seller-heading").hide();
        }
    });

    function filledBySeller() {
        $("#first-seller-heading").show();
        $("#div-form-completed-by").show();
        $("#div-attach-file").show();
        $("#div-number-of-seller").show();
        $("#div-sellers-last-name1").show();
        $("#div-sellers-middle-name1").show();
        $("#div-sellers-first-name1").show();



        $("#additional-seller-heading").hide();
        $("#div-attached-doc").hide();
        $("#div-attached-doc").hide();
        // $("#div-result-file-upload-1").hide();
        $("#div-result-file-upload-2").hide();
        $("#div-dealer-name").hide();
        $("#div-dealer-number").hide();
        $("#div-sellers-last-name2").hide();
        $("#div-sellers_middle-name2").hide();
        $("#div-sellers-first-name2").hide();
    }

    function filledByDealer() {
        $("#div-form-completed-by").show();
        $("#div-attach-file").show();
        $("#div-dealer-name").show();
        $("#div-dealer-number").show();

        $("#first-seller-heading").hide();
        $("#div-number-of-seller").hide();
        $("#div-sellers-last-name1").hide();
        $("#div-sellers-middle-name1").hide();
        $("#div-sellers-first-name1").hide();
        $("#div-attached-doc").hide();
        $("#div-attached-doc").hide();
        // $("#div-result-file-upload-1").hide();
        $("#div-result-file-upload-2").hide();
        $("#div-sellers-last-name2").hide();
        $("#div-sellers_middle-name2").hide();
        $("#div-sellers-first-name2").hide();
    }

    function initstep2() {
        if (step2initialized) {
            return;
        }
        $("#div-form-completed-by").show();
        $("#div-attach-file").show();

        $("#div-number-of-seller").hide();
        $("#div-result-file-upload-buyer-seller").hide();
        $("#div-attached-doc").hide();
        $("#div-result-file-upload-1").hide();
        $("#div-result-file-upload-2").hide();
        $("#div-dealer-name").hide();
        $("#div-dealer-number").hide();
        $("#div-sellers-last-name1").hide();
        $("#div-sellers-middle-name1").hide();
        $("#div-sellers-first-name1").hide();
        $("#div-sellers-last-name2").hide();
        $("#div-sellers_middle-name2").hide();
        $("#div-sellers-first-name2").hide();

        step2initialized = true;
    }


    function initDataBinding() {
        $('input').keyup(function () {
            // alert($(this).attr('name') + " = '" + $(this).val() + "'");return;
            eval($(this).attr('name') + " = '" + $(this).val() + "'");
            //console.log($(this).attr('name') + " => " + eval($(this).attr('name')));
        });
        $('input').blur(function () {
            // alert($(this).attr('name') + " = '" + $(this).val() + "'");return;
            eval($(this).attr('name') + " = '" + $(this).val() + "'");
            // console.log($(this).attr('name') + " => " + eval($(this).attr('name')));
        });
        $('select').change(function () {
            // alert($(this).attr('name') + " = '" + $(this).val() + "'");return;
            eval($(this).attr('name') + " = '" + $(this).val() + "'");
            //console.log($(this).attr('name') + " => " + eval($(this).attr('name')));
        });
    }



    

    
    function getAddress_backup(data) {
        var html = "";
        if (typeof(data.Address1) != 'undefined') { html += "<b>Address Line 1: </b>" + data.Address1 + "<br>"}
        if (typeof(data.Address2) != 'undefined')  { html += "<b>Address Line 2: </b>" + data.Address2 + "<br>"}
        if (typeof(data.City) != 'undefined')  { html += "<b>City: </b>" + data.City + "<br>"}
        if (typeof(data.State) != 'undefined')  { html += "<b>State: </b>" + data.State + "<br>"}
        if (typeof(data.Zip4) != 'undefined')  { html += "<b>Zip: </b>" + data.Zip4 + "<br>"}
        if (typeof(data.Zip5) != 'undefined')  { html += "<b>Zip5: </b>" + data.Zip5 + "<br>"}

        if (typeof(data.ReturnText) != 'undefined') { html += "<br><b>" + data.ReturnText + "</b>"}

        return html;        
    }

    function getAddress(data) {
        var address = [];
        // var addressString = "Please review your address and make any necessary changes<br><br>";
        var addressString = "";

        if (typeof(data.Address1) != 'undefined') { address.push(toTitleCase(data.Address1)) }
        if (typeof(data.Address2) != 'undefined')  { address.push(toTitleCase(data.Address2)) }
        
        if (typeof(data.City) != 'undefined')  { address.push(toTitleCase(data.City)) }
        if (typeof(data.State) != 'undefined')  { address.push(data.State) }
        if (typeof(data.Zip4) != 'undefined')  {
            if (seller_zip == data.Zip4) {
                address.push(toTitleCase(data.Zip4));
            }
        }
        else if (typeof(data.Zip5) != 'undefined')  {
            if (seller_zip == data.Zip5) {
                address.push(toTitleCase(data.Zip5));
            }
        }
        if (typeof(data.Zip5) != 'undefined')  { address.push(toTitleCase(data.Zip5)) }

        addressString += address.join(", ");

        if (typeof(data.ReturnText) != 'undefined') { 
            addressString = "Address correct<br>However-Missing Apt Number, Suite or Box Number";
            openPopup("Address", addressString, "question");
            return;
        }

        openPopup("Address", "Correct Address<br>" + addressString, "ok");       
    }

    $("#modal-next-button").click(function() {       
        closePopup(); 
        showNextStep(parseInt(current_step));
    });

    $("#stay-here-button").click(function() {
        // alert();
        closePopup();
    });


    $(".calendar_field").click(function(event) {
        $(this).next().trigger('click');
    });



    function validate(step) {
        $('input[type=text], input[type=number], input[type=email], input[type=date]').each(function(){
            //alert($(this).attr('name'));
            eval($(this).attr('name') + " = '" + $(this).val() + "'");
        })

        $('select').each(function(){
            try {
                eval($(this).attr('name') + " = '" + $(this).val() + "'");
            }
            catch(e) {
                alert(JSON.stringify($(this)));
            }
            
        })


        var errorMsg = [];
        if (step == 1) {
            if ($('input[name = "date_today"').val() == "") {
                errorMsg.push("Today's date not selected");
            }
            
            if ($('input[name = same_sale_date_radio]:checked').val() == "yes" &&
                $('input[name = "date_sold"').val() == "") {
                errorMsg.push("Please review the form and correct the missing date");
            }
        }

        else if (step == 2) {//alert(number_of_seller);return;
            let selected = $('select[name = form_completed_by]').val();
            if (selected == "") {
                errorMsg.push("Please select if it's dealer or seller");
            }
            else if(selected == "seller") {
                if (number_of_seller == 1) {
                    if (sellers_first_name1 == "") {
                        errorMsg.push("Enter seller's first name");
                    }
                    if (sellers_last_name1 == "") {
                        errorMsg.push("Enter seller's last name");
                    }                    
                }
                else if (number_of_seller == 2) {
                    if (sellers_first_name1 == "") {
                        errorMsg.push("Enter first seller's first name");
                    }
                    if (sellers_last_name1 == "") {
                        errorMsg.push("Enter first seller's last name");
                    }
                    if (sellers_first_name2 == "") {
                        errorMsg.push("Enter second seller's first name");
                    }
                    if (sellers_last_name2 == "") {
                        errorMsg.push("Enter second seller's last name");
                    }
                }
            }
            else if(selected == "dealer") {
                if (dealer_name == "") {
                    errorMsg.push("Enter dealer's name");
                }
                if (dealer_number == "") {
                    errorMsg.push("Enter dealer number");
                }
            }
            
            if (buyer_seller_attach_file == "yes" && $("input[name=buyer_or_seller_attached_file]").val() == '') {
                errorMsg.push("Please choose a file");
            }
        }

        else if (step == 3) {
            if (seller_street_address == "") {
                errorMsg.push("Enter street address");
            }
            if (seller_city == "") {
                errorMsg.push("Enter city");
            }
            if (seller_state == "") {
                errorMsg.push("Select state");
            }
            if (seller_zip == "") {
                errorMsg.push("Enter ZIP code");
            }
            if (seller_phone == "") {
                errorMsg.push("Enter phone number");
            }
            if (seller_email_address == "") {
                errorMsg.push("Enter email address");
            }
            else if (!isEmail(seller_email_address)) {
                errorMsg.push("Invalid email address");
            }
            
        }

        else if (step == 4) {
            if (vin_number == "") {
                errorMsg.push("Enter VIN correctly");
            }
            else if (year_model == "" || make == "") {
                errorMsg.push("Could not validate VIN");
            }

            if (license_plate == "") {
                errorMsg.push("Enter license plate number");
            }
            if (vehicle_attach_doc == "yes" && $("input[name=vehicle_attached_file]").val() == '') {
                errorMsg.push("Please choose a file");
            }            
        }

        else if (step == 5) {
            if (is_vehicle_gift == "yes") {
                if (gift_reason_relationship == "") {
                    errorMsg.push("Enter the relationship");
                }
                if (value_of_gift == "") {
                    errorMsg.push("Enter the gift value");
                }
                                
            }
            else {
                if (value_of_gift == "") {
                    errorMsg.push("Enter the current value");
                }
            }         
        }

        else if (step == 6) {
            if (buyer_last_name == "") {
                errorMsg.push("Enter buyer's first name");
            }
            if (buyer_first_name == "") {
                errorMsg.push("Enter buyer's last name");
            }

            if (buyer_street_address == "") {
                errorMsg.push("Enter street address");
            }
            if (buyer_city == "") {
                errorMsg.push("Enter city");
            }
            if (buyer_state == "") {
                errorMsg.push("Select state");
            }
            if (buyer_zip == "") {
                errorMsg.push("Enter ZIP code");
            }
            if (buyer_phone == "") {
                errorMsg.push("Enter phone number");
            }
            if (buyer_email == "") {
                errorMsg.push("Enter email address");
            }else if (!isEmail(buyer_email)) {
                errorMsg.push("Invalid email address");
            }
            
        }




        if (errorMsg.length == 0) {
            console.log("No Error");
            $("#modal-submit-button").hide();
            // $("#modal-next-button").show();
            return true;
        }
        else {
            $("#modal-next-button").hide();
            openPopup("Error", errorMsg.join("<br>"), "error");
            return false;
        }
    }

});
