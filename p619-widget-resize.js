jQuery( document ).ready( function( $ ) {

  if(window.attachEvent) {
      window.attachEvent('onresize', function() {
          alert('attachEvent - resize');
      });
  }
  else if(window.addEventListener) {
      window.addEventListener('resize', function() {
          console.log('addEventListener - resize');
      }, true);
  }
  else {
      //The browser does not support Javascript event binding
  }

}
