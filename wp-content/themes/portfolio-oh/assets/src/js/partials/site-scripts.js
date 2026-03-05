/**
 * Sticky Header
 * Adds a class to header on scroll
 */
import magnificPopup from '../vendors/jquery-magnificpopup';
import organicTabs from '../vendors/organic-tab';
import slick from '../vendors/slick.min';
jQuery( document ).on( 'scroll', function() {
	if ( jQuery( document ).scrollTop() > 0 ) {
		jQuery( 'header, body' ).addClass( 'shrink' );
	} else {
		jQuery( 'header, body' ).removeClass( 'shrink' );
	}
} );

jQuery( function() {
	/**
	 * Header Wrapper Height Calculation for Navigation Overlay
	 */

	if ( jQuery( '.header-wrapper' ).length > 0 ) {
		function updateHeaderHeight() {
			jQuery( '.header-wrapper' ).each( function() {
				jQuery( this ).css( '--gb_header-wrapper-default', jQuery( this ).outerHeight() + 'px' );
			} );
		}
		updateHeaderHeight();
		jQuery( window ).resize( updateHeaderHeight );
	}

	/**
	 * Toggle menu for mobile
	 */
	const navOverlay = jQuery( '.nav-overlay' );
	const htmlBody = jQuery( 'html, body' );

	jQuery( '.menu-btn' ).on( 'click', function() {
		jQuery( this ).toggleClass( 'active' );
		navOverlay.toggleClass( 'open' );
		htmlBody.toggleClass( 'no-overflow' );
		jQuery( '.header-nav ul li.active' ).removeClass( 'active' );
		jQuery( '.header-nav ul.sub-menu' ).slideUp();
	} );

	/**
	 * Add span tag to multi-level accordion menu for mobile menus
	 */

	jQuery( '.menu-item-has-children > a:first-child' ).each( function() {
		jQuery( this ).after( '<span class="submenu-icon"></span>' );
	} );

	/**
	 * Slide Up/Down internal sub-menu when mobile menu arrow clicked
	 */

	jQuery( '.header-nav' ).on( 'click', '.submenu-icon', function() {
		const parentLi = jQuery( this ).closest( 'li' );

		parentLi.siblings( '.active' )
			.removeClass( 'active' )
			.find( 'ul' ).slideUp();

		parentLi.toggleClass( 'active' ).find( 'ul' ).stop( true, true ).slideToggle();
		parentLi.parents( 'ul' ).toggleClass( 'disabled-menu', parentLi.hasClass( 'active' ) );
	} );

	/**
	 *  Accessibility for Simple menu & Mega menu
	 */
	jQuery( '.menu-item-has-children > a' ).on( 'focus blur', function( event ) {
		jQuery( this ).siblings( '.sub-menu, .mega-menu' ).toggleClass( 'focused', event.type === 'focus' );
	} );

	jQuery( '.sub-menu a, .mega-menu a' ).on( 'focus blur', function( event ) {
		jQuery( this ).closest( '.sub-menu, .mega-menu' ).toggleClass( 'focused', event.type === 'focus' );
	} );

	/**
	 * Script for Accessibility of html Tags
	 */
	jQuery( 'h1, h2, h3, h4, h5, h6,p,li,blockquote,cite,strong,dt,dd,th,td,b,i,u,s,em,small,sup,del,ins,abbr,mark,details,pre,kbd,samp,var,address,code,q,figure,figcaption,caption,.top-bar-text,.top-bar-cross,.copy-right,.post-author-img,.post-author-name,.post-meta-date,.post-date' ).each( function() {
		jQuery( this ).attr( {
			tabindex: 0,
		} );
	} );
	jQuery( '.header-nav li, .blog-nav li, .footer-nav li, .legal-nav li' ).each( function() {
		const link = jQuery( this ).find( 'a' );
		if ( link.length > 0 ) {
			jQuery( this ).removeAttr( 'tabindex' );
		} else {
			jQuery( this ).attr( 'tabindex', '0' );
		}
	} );
	jQuery( 'form p' ).each( function() {
		jQuery( this ).removeAttr( 'tabindex' );
	} );

	jQuery( 'a,button:not([href])' ).each( function() {
		jQuery( this ).attr( {
			tabindex: 0,
		} );
	} );

	setTimeout( () => {
		jQuery( '#daextlwcnf-cookie-notice-button-1' ).attr( 'role', 'button' );
		jQuery( '#daextlwcnf-cookie-notice-button-2' ).attr( 'role', 'button' );
		jQuery( '#daextlwcnf-cookie-settings-button-1' ).attr( 'role', 'button' );
		jQuery( '#daextlwcnf-cookie-settings-button-2' ).attr( 'role', 'button' );
	}, 500 );

	autosize();
	function autosize() {
		const text = jQuery( 'textarea' );

		text.each( function() {
			jQuery( this ).attr( 'rows', 5 );
			resize( jQuery( this ) );
		} );

		text.on( 'input', function() {
			resize( jQuery( this ) );
		} );

		function resize( $text ) {
			$text.css( 'min-height', 'auto' );
			$text.css( 'min-height', $text[ 0 ].scrollHeight + 'px' );
		}
	}
	// Faqs

	if ( jQuery( '.faqs-main' ).length ) {
		jQuery( '.single-faq-head' ).on( 'click', function() {
			const head = jQuery( this );
			const faq = head.closest( '.single-faq' );
			const content = head.siblings( '.faq-content' );

			if ( head.hasClass( 'active' ) ) {
				head.removeClass( 'active' );
				faq.removeClass( 'active' );
				content.slideUp( 400 );
			} else {
				jQuery( '.single-faq-head.active' ).removeClass( 'active' );
				jQuery( '.single-faq.active' ).removeClass( 'active' );
				jQuery( '.faq-content' ).slideUp( 400 );

				head.addClass( 'active' );
				faq.addClass( 'active' );
				content.slideDown( 400 );
			}
		} );
	}
	// Tabs
	if ( jQuery( '.tabs-ctn' ).length ) {
		jQuery( function() {
			const container = jQuery( '.tabs-ctn' );
			if ( ! container.length ) {
				return;
			}

			const tabs = jQuery( '.tab-item' );
			const contents = jQuery( '.tab-item-content' );
			const images = jQuery( '.tabs-image .tab-image' );

			let currentIndex = 0;
			let timer = null;
			const delay = 2800;
			let isActive = false;

			function resetAll() {
				tabs.removeClass( 'current fill' );
				tabs.find( '.dot' ).removeClass( 'dot-fill' );
				images.removeClass( 'active exit-up' );
				contents.stop( true, true ).slideUp( 0 );
			}

			function activate( index, click = false ) {
				if ( ! click && index === currentIndex ) {
					return;
				}

				const tab = tabs.eq( index );
				const target = tab.data( 'tab-target' );
				const currentImage = images.eq( currentIndex );
				const nextImage = jQuery( target );

				nextImage.addClass( 'active' );
				currentImage.addClass( 'exit-up' );

				setTimeout( () => {
					currentImage.removeClass( 'active exit-up' );
				}, 600 );

				tab.addClass( 'current' );
				tab.find( '.tab-item-content' ).stop( true, true ).slideDown( 400 );

				tab.find( '.dot' ).removeClass( 'dot-fill' );
				void tab.find( '.dot' )[ 0 ].offsetWidth;
				tab.find( '.dot' ).addClass( 'dot-fill' );

				if ( ! click && currentIndex !== index ) {
					tabs.eq( currentIndex ).addClass( 'fill' );
				}

				currentIndex = index;

				if ( ! click && currentIndex === tabs.length - 1 ) {
					setTimeout( () => {
						resetAll();
						currentIndex = -1;
						setTimeout( () => {
							activate( 0 );
						}, 50 );
					}, delay );
				}
			}

			function play() {
				if ( timer || ! isActive ) {
					return;
				}
				timer = setInterval( () => {
					const next = ( currentIndex + 1 ) % tabs.length;
					activate( next );
				}, delay );
			}

			function pause() {
				if ( ! timer ) {
					return;
				}
				clearInterval( timer );
				timer = null;
			}

			tabs.on( 'click', function() {
				const newIndex = tabs.index( this );
				resetAll();
				activate( newIndex, true );
				pause();
				play();
			} );

			const observer = new IntersectionObserver( ( entries ) => {
				entries.forEach( ( entry ) => {
					if ( entry.isIntersecting ) {
						isActive = true;
						play();
					} else {
						isActive = false;
						pause();
					}
				} );
			}, { threshold: 0.4 } );

			observer.observe( container[ 0 ] );

			images.eq( 0 ).addClass( 'active' );
			tabs.eq( 0 ).addClass( 'current' );
			tabs.eq( 0 ).find( '.dot' ).addClass( 'dot-fill' );
		} );
	}// Process Tabs
	if ( jQuery( '.process-tabs' ).length ) {
		jQuery( function() {
			const container = jQuery( '.process-tabs' );
			if ( ! container.length ) {
				return;
			}

			const steps = jQuery( '.process-step' );
			const images = jQuery( '.process-image' );

			let currentIndex = 0;
			let timer = null;
			const delay = 5000;
			let isActive = false;
			const isDesktop = jQuery( window ).width() > 1003;

			function resetClasses() {
				steps.removeClass( 'current fill' );
				steps.find( '.dot' ).removeClass( 'dot-fill' );
				images.removeClass( 'active exit-up' );
			}

			function activate( index ) {
				const step = steps.eq( index );
				const target = step.data( 'step-target' );
				const currentImage = images.eq( currentIndex );
				const nextImage = jQuery( target );

				currentImage.removeClass( 'active' ).addClass( 'exit-up' );
				nextImage.addClass( 'active' );

				steps.removeClass( 'current' );
				step.addClass( 'current fill' );
				step.find( '.dot' ).addClass( 'dot-fill' );

				currentIndex = index;
			}

			function loop() {
				if ( ! isDesktop || timer || ! isActive ) {
					return;
				}
				timer = setInterval( function() {
					const next = ( currentIndex + 1 ) % steps.length;
					resetClasses();
					activate( next );
				}, delay );
			}

			function stopLoop() {
				if ( ! timer ) {
					return;
				}
				clearInterval( timer );
				timer = null;
			}

			steps.on( 'click', function() {
				const newIndex = steps.index( this );
				resetClasses();
				activate( newIndex );
				stopLoop();
				loop();
			} );

			const observer = new IntersectionObserver( function( entries ) {
				entries.forEach( function( entry ) {
					if ( entry.isIntersecting ) {
						isActive = true;
						loop();
					} else {
						isActive = false;
						stopLoop();
					}
				} );
			}, { threshold: 0.4 } );

			observer.observe( container[ 0 ] );

			resetClasses();
			images.eq( 0 ).addClass( 'active' );
			steps.eq( 0 ).addClass( 'current fill' );
			steps.eq( 0 ).find( '.dot' ).addClass( 'dot-fill' );
		} );
	}
} );

