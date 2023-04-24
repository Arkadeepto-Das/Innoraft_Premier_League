/**
 * This function is used to display the player list.
 */
$(document).ready(function() {
  $.ajax({
    url: "playerList.php",
    datatype: "html",
    success: function(data) {
      $('.container').html(data);
    }
  });
});