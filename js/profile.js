$(document).ready(function(){
    console.log("hi");

    $.post('./php/profile.php', { userData: localStorage.getItem("userData") })
    .done(function(response) {   
        console.log(response);
      jQuery('#name').val(response.name);
      jQuery('#email').val(response.email);
      jQuery('#age').val(response.age);
      jQuery('#address').val(response.address);
      try {
        response.list.forEach(function(sess) {
          $('#list').append('<li class="list-group-item text-primary">' + sess + '</li>');
        });
      } catch (error) {
        window.location.href = "register.html";
      }   
    })
    .fail(function(error) {
      window.location.href = "register.html";
    });  


    
  $('#btn').click(function() {
    $.post('./php/delete.php', { "username":$("#name").val(),"email":$("#email").val() })
    .done(function(response) {    
        localStorage.setItem('userData', null);  
        console.log("hi")
        jQuery('#btn').val('Please wait...');  
        window.location.href = "register.html";
    })
  });

});

