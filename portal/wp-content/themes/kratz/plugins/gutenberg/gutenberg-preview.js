/* global jQuery:false */
/* global KRATZ_STORAGE:false */

jQuery( window ).on( 'load', function() {
	"use strict";
	kratz_gutenberg_first_init();
	// Create the observer to reinit visual editor after switch from code editor to visual editor
	var kratz_observers = {};
	if (typeof window.MutationObserver !== 'undefined') {
		kratz_create_observer('check_visual_editor', jQuery('.block-editor').eq(0), function(mutationsList) {
			var gutenberg_editor = jQuery('.edit-post-visual-editor:not(.kratz_inited)').eq(0);
			if (gutenberg_editor.length > 0) kratz_gutenberg_first_init();
		});
	}

	function kratz_gutenberg_first_init() {
		var gutenberg_editor = jQuery( '.edit-post-visual-editor:not(.kratz_inited)' ).eq( 0 );
		if ( 0 == gutenberg_editor.length ) {
			return;
		}
		jQuery( '.editor-block-list__layout' ).addClass( 'scheme_' + KRATZ_STORAGE['color_scheme'] );
		gutenberg_editor.addClass( 'sidebar_position_' + KRATZ_STORAGE['sidebar_position'] );
		if ( KRATZ_STORAGE['expand_content'] > 0 ) {
			gutenberg_editor.addClass( 'expand_content' );
		}
		if ( KRATZ_STORAGE['sidebar_position'] == 'left' ) {
			gutenberg_editor.prepend( '<div class="editor-post-sidebar-holder"></div>' );
		} else if ( KRATZ_STORAGE['sidebar_position'] == 'right' ) {
			gutenberg_editor.append( '<div class="editor-post-sidebar-holder"></div>' );
		}

		gutenberg_editor.addClass('kratz_inited');
	}

	// Create mutations observer
	function kratz_create_observer(id, obj, callback) {
		if (typeof window.MutationObserver !== 'undefined' && obj.length > 0) {
			if (typeof kratz_observers[id] == 'undefined') {
				kratz_observers[id] = new MutationObserver(callback);
				kratz_observers[id].observe(obj.get(0), { attributes: false, childList: true, subtree: true });
			}
			return true;
		}
		return false;
	}
} );
