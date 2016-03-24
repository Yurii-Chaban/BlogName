$(document).ready(function() {
  $('#add_task').click(function() {
    var toAdd = $('input[name=checkListItem]').val();
    if (toAdd.length > 0) {
      $('<div class="item">' + toAdd + ' <span><span class="fa fa-close"></span> </span></div>').hide().appendTo('.list').slideToggle();
      $('input[type=text]').val('');
    }
  });

  $("body").on("click", ".item span", function() {
    // $('.item').slideToggle(300, function() {
    $(this).parent('.item').remove();
  // });
  });
});