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


	// Live preview for comments
	(function () {
		var time = new Date().getTime();

		$('#comment').on('keyup', function (e) {
			var request,
			    comment = $(this).val();

			// Don't request anything if comment is empty
			if (comment === "") {
				return;
			}

			// When last request is a second ago
			if (time + 300 < e.timeStamp) {
				time = e.timeStamp;

				// Request Ajax
				request = $.ajax({
					type: 'POST',
					url: '?markdown',
					data: {
						'text': comment
					}
				}).done(function (html) {

					// Inject HTML if necessary
					if ($('.respond-preview').length < 1) {
						$('#respond').after('<div class="comment respond-preview"><h3>Preview:</h3><div class="comment-preview"></div>');
					}

					// Inject comment
					$('.comment-preview').html(html);
				}).fail(function () {
					$('.respond-preview').remove();
					$('.comment-preview').html('Sorry, request failed.');
				});
			}
		}).on('blur', function () {
			setTimeout(function () {
				$('#comment').trigger('keyup');
			}, 1000);
		});
	}());




}(jQuery));



// Comments
addComment={moveForm:function(d,f,i,c){var m=this,a,h=m.I(d),b=m.I(i),l=m.I("cancel-comment-reply-link"),j=m.I("comment_parent"),k=m.I("comment_post_ID");if(!h||!b||!l||!j){return}m.respondId=i;c=c||false;if(!m.I("wp-temp-form-div")){a=document.createElement("div");a.id="wp-temp-form-div";a.style.display="none";b.parentNode.insertBefore(a,b)}h.parentNode.insertBefore(b,h.nextSibling);if(k&&c){k.value=c}j.value=f;l.style.display="";l.onclick=function(){var n=addComment,e=n.I("wp-temp-form-div"),o=n.I(n.respondId);if(!e||!o){return}n.I("comment_parent").value="0";e.parentNode.insertBefore(o,e);e.parentNode.removeChild(e);this.style.display="none";this.onclick=null;return false};try{m.I("comment").focus()}catch(g){}return false},I:function(a){return document.getElementById(a)}};
