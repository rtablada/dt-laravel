(function() {
  var closeNotifications = $('.close-notification');

  closeNotifications.on('click', function(ev) {
    var parent = $(this).parents('.notification-item');

    parent.slideUp(function() {
      // parent.remove();
    });
  });
})();
