/**
 * customizer.js
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	var myCustomizer = window.parent.window.wp.customize;

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	
	// Header text hide and show and text color.
	wp.customize( 'header_textcolor', function( value ) {
		if(value() == 'blank'){
			myCustomizer.control('fameup_title_font_size').container.hide();
			myCustomizer.control('header_textcolor_dark_layout').container.hide();
		}else{
			myCustomizer.control('fameup_title_font_size').container.show();
			myCustomizer.control('header_textcolor_dark_layout').container.show();
		}
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
				$( '.site-branding-text ' ).addClass('d-none');
				myCustomizer.control('fameup_title_font_size').container.hide();
				myCustomizer.control('header_textcolor_dark_layout').container.hide();
			} else {
				$('.site-title').css('position', 'unset');
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-branding-text ' ).removeClass('d-none');
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
				myCustomizer.control('fameup_title_font_size').container.show();
				myCustomizer.control('header_textcolor_dark_layout').container.show();
			}
		} );
	} );
	
	// Site Title Font Size.
	wp.customize( 'fameup_title_font_size', function( value ) {
		value.bind( function( newVal ) {
			$( '.site-title a' ).css( {
				'font-size': newVal+'px',
			} );
		} );
	} );

	// Footer all Text color.
	wp.customize( 'fameup_footer_column_layout', function( value ) {
		var colum = 12 / value();
		var wclass = $('.animated.bs-widget');
		if(wclass.hasClass('col-md-12')){
			wclass.removeClass('col-md-12');
		}else if(wclass.hasClass('col-md-6')){
			wclass.removeClass('col-md-6');
		}else if(wclass.hasClass('col-md-4')){
			wclass.removeClass('col-md-4');
		}else if(wclass.hasClass('col-md-3')){
			wclass.removeClass('col-md-3');
		}
		wclass.addClass(`col-md-${colum}`);

		value.bind( function( newVal ) {
			colum = 12 / newVal;
			wclass = $('.animated.bs-widget');
			if(wclass.hasClass('col-md-12')){
				wclass.removeClass('col-md-12');
			}else if(wclass.hasClass('col-md-6')){
				wclass.removeClass('col-md-6');
			}else if(wclass.hasClass('col-md-4')){
				wclass.removeClass('col-md-4');
			}else if(wclass.hasClass('col-md-3')){
				wclass.removeClass('col-md-3');
			}
			wclass.addClass(`col-md-${colum}`);
		} );
	} );

	myCustomizer.state( 'previewedDevice' ).bind( function( device ) {
		if(device == 'desktop'){
			wp.customize( 'fameup_title_font_size', function( value ) {
				$( '.site-title a' ).css( {
					'font-size': value()+'px',
				} );
			} );
		} else if(device == 'tablet' || device == 'mobile'){
			var element = document.querySelector('.site-title a');
			element.style.removeProperty('font-size');
		}
	});
	
	// Footer Background Image
	wp.customize( 'fameup_footer_widget_background', function( value ) {
		value.bind( function( newVal ) {
			if(newVal !== ''){
				$('footer.footer').css('background-image', 'url(' + newVal + ')'); 
			}else{
				$('footer.footer').removeAttr('style');
			}
		});
	});
	wp.customize( 'scrollup_layout', function( value ) {
		value.bind( function( newVal ) {
			$('.bs_upscr i').removeClass();
			$('.bs_upscr i').addClass(newVal);
		});
	});
	function customizePreviewStyle(settingId, selector, property) {
		wp.customize(settingId, function(value) {
			value.bind(function(newVal) {
				let cssProperties = {};
				cssProperties[property] = newVal;
				$(selector).css(cssProperties);
			});
		});
	}
	customizePreviewStyle('fameup_footer_overlay_color', 'footer .overlay', 'background');
	customizePreviewStyle('fameup_footer_text_color', 'footer .bs-widget p, .site-title-footer a, .site-title-footer a:hover, .site-description-footer, .site-description-footer:hover, footer .bs-widget h6, footer bs_contact_widget .bs-widget h6, footer .bs-widget ul li a', 'color');
	customizePreviewStyle('top_bar_header_background_color', '.bs-head-detail', 'background');
	customizePreviewStyle('top_bar_header_color', '.bs-head-detail .top-date, .bs-head-detail', 'color');
	customizePreviewStyle('breaking_news_background_color', '.bs-latest-news .bs-latest-news-slider', 'background');
	customizePreviewStyle('breaking_news_color', '.bs-latest-news .bs-latest-news-slider a', 'color');
} )( jQuery );
