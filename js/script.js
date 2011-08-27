/* Author: 

*/







! function( $, window, document, undefined ) {


// Images loaded
$( 'img' ).addClass( 'show' );


// About Column
$( '.about-img img' ).eq( 0 ).addClass( 'front' );

$( '.about-img img' ).click( function() {
  var $el = $( this );

  $el.removeClass( 'front' );
  setTimeout( function() {
    if( $el.next().size() > 0 ) {
      $el.next().addClass( 'front' );
    } else {
      $( '.about-img img' ).eq( 0 ).addClass( 'front' );
    }
  }, 300);

});



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
$( '#search form' ).submit( function( e ) {
  /*e.preventDefault();
  
  var new_value = $( '#s' ).prop( 'value' );
  location.hash = $( this ).attr( 'action' ) + save_search( new_value );
  
  do_search( new_value );*/

});


/**
 * Replaces searched value
 *
 * @param _test - RegEx to test for
 * @param _with - New string for replacement
 * @param haystack - String to search
 *
 */
function str_replace( _test, _with, haystack ) {
  while( haystack.search( _test ) > -1 ) {
    haystack = haystack.replace( _test, _with );
  }
  return haystack;
}





/* Syntax Highlighter */
$( '.wp_syntax' ).each( function() {
  if ( $( this ).find( '.raw' ).size() < 1 ) {
    var $raw = $( '<a />', {
        'class' : 'raw',
        'title' : 'Copy raw code',
        'href' : '#/copy-snippet',
        'html' : 'Copy raw code',
      });
    
    $raw.appendTo( $( this ) );
    
    // Copy to clipboard
    var html = $( this ).find( 'pre' ).html();
        html = str_replace( /\<span.*\"\>/g, '', html );
        html = str_replace( /\<\/span>/g, '', html );
    
    var clip = new ZeroClipboard.Client();
    clip.glue( $raw[0] );
    clip.setText( html );
    $( clip.div ).attr( 'title', 'Copy to Clipboard' );
    
    // After copy is completed
    clip.addEventListener( 'complete', function( client, text ) {
      if ( $( '#copied-notice' ).size() > 0 ) {
        $( '#copied-notice' ).remove();
      }
      $( '<div />', {
        'id' : 'copied-notice',
        'html' : 'The snippet was copied to your clipboard.'
      }).appendTo( 'body' ).fadeIn( 200, function() {
        $( this ).delay( 1000 ).fadeOut();
      });
    });

  }
});



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















