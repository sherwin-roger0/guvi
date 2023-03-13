$('#btn').click(function() {
    jQuery('#btn').val('Please wait...');
    $.post('./php/register.php', { "username":$("#username").val(),"password":$("#password").val(),"age":$("#age").val(),"address":$("#address").val(),"email":$("#email").val() })
    .done(function(response) { 
        localStorage.setItem('userData', $('#username').val());  
        console.log("hi");
        jQuery('#thank_you_msg').html('Thank you');
        window.location.href = "profile.html"
    })
    .fail(function(error) {
        jQuery('#err_msg').html('User Not Found');
        jQuery('#contactForm')['0'].reset();
        jQuery('#btn').val('Submit Now');
        jQuery('#btn').attr('disabled',false);
    });  
});