/**
 * This function is used to pass the input data for the new player to be added
 * in the database and return the message whether the player is added or not.
 */
$(document).ready(function() {
  $('#add').on('click', function() {
    var id = $('#Id').val();
    var name = $('#name').val();
    var type = $('#type').val();
    var points = $('#points').val();
    $.ajax({
      url: "addPlayer.php",
      type: "post",
      data: {
        id : id,
        name : name,
        type : type,
        points : points
      },

      /**
       * This function is used to display the message whether the player is
       * added or not only if the request succeeds.
       * 
       *   @param JSON data
       *     Stores the message.
       */
      success: function(data) {
        var object = JSON.parse(data);
        $('#message').text(object.message);
      }
    });
  });
});