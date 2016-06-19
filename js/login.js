$(function() {

    $("#loginForm input,#loginForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function($form, event, errors) {
            // additional error messages or events
        },
        submitSuccess: function($form, event) {

            // Prevent spam click and default submit behaviour
            $("#btnSubmit").attr("disabled", true);
            event.preventDefault();
            var name = $("input#name").val(); 
                
                var url = "http://mastermind.niitportharcourt.com/staff/validate_staff.php";
                var randnum = $("input#password").val();
                
             
       
            if(typeof($(".login-staff").attr("class")) == "undefined") {
            var url = "http://mastermind.niitportharcourt.com/validate.php";
            // get values from FORM
           
            var randnum = $("input#randnum").val(); 
       }
            var firstName = name; // For Success/Failure Message
            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    name: name,
                    randnum: randnum
                },
                cache: false,
                success: function(result) {

                    // Enable button & show success message
                    $("#btnSubmit").attr("disabled", false);
                        console.log(result);
                    if(result == "staff_true") {
                        location.href = "http://mastermind.niitportharcourt.com/staff";
                    }

                    if(result == "true") {
                        location.href = "http://mastermind.niitportharcourt.com/";
                    } else {
                        if(firstName.toLowerCase() == "admin") {
                            $('#success').html("<div class='alert alert-success'>");
                            $('#success > .alert-success').append("<strong>Sorry, we don't think you're registered. If you're an admin contact the site Maintainer.");
                            //login fail due to incorrect details
                        } else if(result !== "staff_true"){
                            $('#success').html("<div class='alert alert-danger'>");
                            $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", we don't think you're registered. Or you've given us wrong details.");
                        }
                    }
                },
                error: function() {
                    // Fail message
                    $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Sorry " + firstName + ", it seems that the server isn't responding. Please try again later!");
                    $('#success > .alert-danger').append('</div>');
                    //clear all fields
                    $('#contactForm').trigger("reset");
                },
            })
        },
        filter: function() {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function(e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

// When clicking on Full hide fail/success boxes
$('#name').focus(function() {
    $('#success').html('');
});
