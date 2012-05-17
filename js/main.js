/* Author: 

*/







! function( $, window, document, undefined ) {

var isMobile = $(window).width() < 480;


// FadeIn Images
$( 'img' ).addClass( 'show' );



// Close Action
function do_close( action ) {
  log( 'Close: ' + action );
  
  if ( action === "search" ) {
    $( '#misc .search-icon' ).removeClass( 'active' );
    remove_overlay();
    
    $( '#search' ).css({
        '-moz-transform' : 'scale(0)',
          '-o-transform' : 'scale(0)',
     '-webkit-transform' : 'scale(0)',
         '-ms-transform' : 'scale(0)',
             'transform' : 'scale(0)',
      'opacity' : '0'
    });
  } else {
    remove_overlay();
    $( '#markdown' ).fadeOut();
  }

}



// Overlay
function do_overlay( action, transparency ) {
  if ( transparency === undefined ) {
    transparency = false;
  }
  
  if ( $( '#overlay' ).size() < 1 ) {      
    
    var $overlay = $( '<div />', {
        'id' : 'overlay',
        'css' : {
          'display' : 'none'
        }
      });
      
    if ( transparency ) {
      $overlay.addClass( 'transparent' )
    }
    
    $overlay.click( function( e ) {
      e.preventDefault();
      
      location.hash = '#/close/' + action;
    });
    
    $overlay.appendTo( 'body' ).fadeIn();
  } else {
    $( '#overlay' ).fadeIn();
  }
  
  delete $output;

}


// Remove Overlay
function remove_overlay() {
  if ( $( '#overlay' ).size() > 0 ) {
    $( '#overlay' ).fadeOut();
  }
}



// Pressing ESC
! function() {
  $( window ).keyup( function( e ) {
    if ( e.which == 27 && $( '#overlay' ).size() > 0 ) {
      $( '#overlay' ).trigger( 'click' );
    }
  });
} ();







// Init Hash-Listener
var hash = '';
! function hash_listener( ) {
  

  $( window ).bind( 'hashchange', function( e ) {
    hash = location.hash;
    log( hash );
    
    // Search
    if ( hash === "#/search" ) {
      $( '#misc .search-icon' ).addClass( 'active' );
      
      $( '#search' ).css({
          '-moz-transform' : 'scale(1)',
            '-o-transform' : 'scale(1)',
       '-webkit-transform' : 'scale(1)',
           '-ms-transform' : 'scale(1)',
               'transform' : 'scale(1)',
        'opacity' : '1'
      });
      
      do_overlay( 'search', true );
      
      $( '#s' ).focus();
    
    // Close
    } else if ( hash.substr( 0, 7 ) === "#/close") {
      do_close( hash.substr( 8 ) );
    
    // Markdown rules
    } else if ( hash === "#/markdown" ) {
      if ( $( '#markdown' ).size() > 0 ) {
        do_overlay( 'markdown' );
        $( '#markdown' ).fadeIn();
      } else {
        $.get( '?get_markdown', function( data ) {
          $( 'body' ).append( data );
          do_overlay( 'markdown' );
          
          $( '#markdown' ).fadeIn();
        });
      }
    }
  });

  if (location.hash) {
    location.hash = "";
  }

} ();





// Submit a comment
$( '#commentform' ).submit( function() {
  var $el,
      err = false,
      $req = new Array( $( '#author' ), $( '#email' ), $( '#comment' ) );
  
  $.each( $req, function() {
    $el = $( this );
    if ( $el.prop( 'value' ) === "" ) {
      $el.addClass( 'invalid' );
      err = true;
    }
  });
  
  if ( err ) {
    return false;
  }
});




} ( jQuery, window, document );















