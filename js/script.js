/* Author: 

*/







! function( $, window, document, undefined ) {


// FadeIn Images
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
  })

} ();




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
    var html = $( this ).find( 'pre' ).html().split( /<\/span>/ig ),
        re = /<span(.*)>(.*)/ig;

    for ( i = 0; i < html.length; i++ ) {
      html[i] = html[i].replace( re, '$2' );
    }
    
    html = html.join( '' );
    
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















