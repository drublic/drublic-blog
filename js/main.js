/**
 * For drublic.de/blog
 * @author: Hans Christian Reinl
 */


(function($) {

	"use strict";


	// FadeIn Images
	$('img').addClass( 'show' );


	// Remove Overlay
	function closeOverlay() {
		if ($('#overlay').length > 0) {
			$('#overlay').fadeOut();
		}
	}



	// Overlay
	function showOverlay (action, transparency) {
		var $overlay;

		if ($('#overlay').length < 1) {

			$overlay = $( '<div />', {
					'id' : 'overlay',
					'css' : {
						'display' : 'none'
					}
				});

			if (transparency) {
				$overlay.addClass('transparent');
			}

			$overlay.click( function( e ) {
				e.preventDefault();

				location.hash = '#/close/' + action;
			});

			$overlay.appendTo( 'body' ).fadeIn();
		} else {
			$( '#overlay' ).fadeIn();
		}

		$overlay = null;

	}



	// Pressing ESC
	$(window).keyup( function (e) {
		if (e.which === 27 && $('#overlay').length > 0) {
			$('#overlay').trigger('click');
		}
	});




	// Init Hash-Listener
	$(window).on('hashchange', function () {
		var hash = location.hash;

		// Search
		if (hash === "#/search") {
			$('#search').addClass('active');
			$('#s').focus();

		// Close
		} else if ( hash.substr( 0, 7 ) === "#/close") {
			closeOverlay();
		}
	});

	// If hash is already set, trigger change
	if (location.hash !== "") {
		$(window).trigger('hashchange');
	}


	// Hide Search on blur
	$(document).on('blur', '#s', function () {
		$('#search').removeClass('active');
		location.hash = '#/';
	});





	// Submit a comment
	$( '#commentform' ).submit( function() {
		var $el,
				error = false,
				$required = [ $( '#author' ), $('#email'), $('#comment') ];

		$.each($required, function () {
			$el = $(this);
			$el.removeClass('invalid');

			if ($el.prop('value') === "") {
				$el.addClass('invalid');
				error = true;
			}
		});

		return !error;
	});




	// Enable share-buttons
	if ($('#share-post').length > 0) {
		$('#share-post').before( $('#share-post').html() );
		$.getScript("https://apis.google.com/js/plusone.js");
		$.getScript("http://platform.twitter.com/widgets.js");
	}




}(jQuery));
