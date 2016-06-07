jQuery( document ).ready( function( $ ) {

  if(window.attachEvent) {
      window.attachEvent('onresize', function() {
          alert('attachEvent - resize');
      });
  }
  else if(window.addEventListener) {
      window.addEventListener('resize', function() {
          console.log('addEventListener - resize');

          var size_h1 = 10;
          var size_p = 3;

          $(".widget_p619_text_widget").each(function() {
            var w = $( this ).width;
            $( this ).find( "h1" ).css("font-size", fwidth / 100 + size_h1);
            $( this ).find( "p" ).css("font-size", fwidth / 100 + size_p);
          });
      }, true);
  }
  else {
      //The browser does not support Javascript event binding
  }

});
