function back() {
        javascript:history.go(-1);
    }
function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length,c.length);
        }
    }
    return "";
}

function setCookie(cname, cvalue) {
    document.cookie = cname + "=" + cvalue;
}
// jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
        if(location.href.match("ask") !== null) {
        var asker = document.getElementById("asker").value;
        var today = document.getElementById("today").value;
        }
    
        $('.logout').bind('click', function(event) {
            location.href = "http://mastermind.niitportharcourt.com/login";
            event.preventDefault();
        });
         $('.skip').bind('click', function(event) {
            var name = "Guest";
            var randnum = "123456789";
            $.ajax({
                    url: "http://mastermind.niitportharcourt.com/validate.php",
                    type: "POST",
                    data: {
                        name: name,
                        randnum: randnum
                    },
                    success:function(success){
                        console.log(success);
                        if(success) {
                            location.href = "http://mastermind.niitportharcourt.com";
                        }
                    }
                });
            event.preventDefault();
        });
         $('.back').bind('click', function(event) {
            back();
            event.preventDefault();
         });

          $('.staff-btn').bind('click', function(event) {
            location.href = "http://mastermind.niitportharcourt.com/staff/login";
            event.preventDefault();
         });

          $('.btnAsk').bind('click', function(event) {
            var tag = document.getElementById("tag").value;
            var question = document.getElementById("question").value;
            var title = document.getElementById("title").value;
            document.getElementById("asker").value = asker;
            document.getElementById("today").value = today;
            if(tag == "" || question == "" || title == "") {
                event.preventDefault();
                 $('#success').html("<div class='alert alert-danger'>");
                    $('#success > .alert-danger').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                        .append("</button>");
                    $('#success > .alert-danger').append("<strong>Please fields can't be empty.");
                    $('#success > .alert-danger').append('</div>');
            }
         });

         $('.user').bind('click', function(event) {
            location.href = "http://mastermind.niitportharcourt.com/users/";
         });

          $('.dev').bind('click', function(event) {
            location.href = "http://mastermind.niitportharcourt.com/developers";
         });


        $('.assign-submit').bind('click', function(event) {
            location.href = "http://mastermind.niitportharcourt.com/assign_submit?"+$(this).attr("id");
         });



});

// Closes the Responsive Menu on Menu Item Click
$('.navbar-collapse ul li a').click(function() {
  if ($(this).attr('class') != 'dropdown-toggle active' && $(this).attr('class') != 'dropdown-toggle') {
    $('.navbar-toggle:visible').click();
  }
});
