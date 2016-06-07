jQuery( document ).ready( function( $ ) {

  if(window.attachEvent) {
      window.attachEvent('onresize', function() {
          _p619_widget_font_size();
      });
  }
  else if(window.addEventListener) {
      window.addEventListener('resize', function() {
        _p619_widget_font_size();
      }, true);
  }
});

function _p619_widget_font_size() {
  var size_h1 = 7.7;
  var size_p = 3.5;

  $(".widget_p619_text_widget").each(function() {
    var w = $( this ).width();
    $( this ).find( "h1" ).css("font-size", w / 100 * size_h1);
    $( this ).find( "p" ).css("font-size", w / 100 * size_p);
  });
}
