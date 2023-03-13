$('#btn').click(function() {
    $.post('./php/login.php', { "username":$("#username").val(),"password":$("#password").val() })
    .done(function(response) {    
        localStorage.setItem('userData', $('#username').val());  
        console.log("hi")
        jQuery('#btn').val('Please wait...');  
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