/* Author: 

*/







! function( $, window, document, undefined ) {



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
  }

}



// Overlay
function do_overlay( action, transparency ) {
  if ( transparency === undefined ) {
    transparency = false;
  }
  
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
  
  if ( $( '#overlay' ).size() == 0 ) {
    $overlay.appendTo( 'body' ).fadeIn();
  }
  
  delete $output;

}


// Remove Overlay
function remove_overlay() {
  if ( $( '#overlay' ).size() > 0 ) {
    $( '#overlay' ).fadeOut( function() {
      $( this ).remove();
    });
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





// Helper for search
function str_replace( search, replace, val ) {
  return val.split( search ).join( replace );
}


// Save URL-Search value
function save_search( val ) {
  val = str_replace( ' ', '-', val )
  val = str_replace( '.', '-', val )
  val = str_replace( ':', '-', val )
  val = str_replace( ',', '-', val )
  val = str_replace( ';', '-', val )
  val = str_replace( '/', '-', val )
  val = str_replace( '\\', '-', val )
  val = str_replace( '!', '-', val )
  val = str_replace( '?', '-', val )
  val = str_replace( '(', '-', val ),
  val = str_replace( ')', '-', val );
           
  return val;
}




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
    
    }
  })

} ();






// Search
! function() {
  $( '#search form' ).submit( function( e ) {
    e.preventDefault();
    
    var new_value = $( '#s' ).prop( 'value' );
    location.hash = $( this ).attr( 'action' ) + save_search( new_value );
    
    do_search( new_value );
  
  });
} ();







} ( jQuery, window, document );















