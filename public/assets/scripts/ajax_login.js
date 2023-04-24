/**
 * This function is used to pass the user input data for validation and 
 * redirect to other page after validation.
 */
$(document).ready(function() {
  $('#login').on('click', function() {
    var emailId = $('#email').val();
    var password = $('#password').val();
    $.ajax({
      url: 'login.php',
      type: 'post',
      data: {
        emailId : emailId,
        password : password
      },

      /**
       * This function is used to display the error messages if the input data
       * is not valid or else redirects to another page if input data is valid.
       * 
       *   @param JSON data
       *     Stores the json encoded error message.
       * 
       *   @return void
       *     Redirects to another page if valid or else displays error message
       *     only if the request succeeds.
       */
      success: function(data) {
        var object = JSON.parse(data);
        if (object.status == 0 && object.userName) {
          $('#emailErr').text(object.userName);
        }
        else if (object.status == 0 && object.password) {
          $('#passwordErr').text(object.password);
        }
        else if (object.role == "user") {
          window.location.href = "user_page.php";
        }
        else {
          window.location.href = "admin_page.php";
        }
      }
    });
  });
});
