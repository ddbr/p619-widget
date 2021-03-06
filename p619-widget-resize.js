var _p619_resizeTimer;

jQuery( document ).ready( function( $ ) {
  //initialize first resize.
  _p619_widget_font_size();

  if(window.attachEvent) {
      window.attachEvent('onresize', function() {
        _p619_setResizeTimeout();
        didResize = true;
      });
  }
  else if(window.addEventListener) {
      window.addEventListener('resize', function() {
        _p619_setResizeTimeout();
        didResize = true;
      });
  }
});

function _p619_setResizeTimeout() {
  clearTimeout(_p619_resizeTimer);
  _p619_resizeTimer = setTimeout(function(){
    _p619_widget_font_size();
  }, 100)
}

function _p619_widget_font_size() {
  var size_h1 = 7.7;
  var size_p = 3.5;

  jQuery(".widget_p619_text_widget").each(function() {
    var w = $( this ).width();
    jQuery( this ).find( "h1" ).css("font-size", w / 100 * size_h1);
    jQuery( this ).find( "p" ).css("font-size", w / 100 * size_p);
  });
}
