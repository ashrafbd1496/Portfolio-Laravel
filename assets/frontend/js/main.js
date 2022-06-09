
/* -------------------------------------------------------------------
   All Functions                               
   ------------------------ /
 * 01.Preloader
 * 02.Header
 * 03.Counter Up
 * 04.Owl Carousel
 * 05.ScrollIt
 * 06.Background Image Path
 * 07.Wow Js
 * 08.Skills Bar
 * 09.Services Tab
 * 10.My Works Gallery
 * 11.Magnific Popup
 * 12.Contact Form
------------------------------------------------------------------- */

$( document ).ready( function() {
    // All Functions
    caspar_PreLoader();
    caspar_Header();
    caspar_CounterUp();
    caspar_Carousel();
    caspar_ScrollIt();
    caspar_BgImgPath();
    caspar_WowJs();
    caspar_SkillsBar();
    caspar_ServicesTab();
    caspar_MyWorksGallery();
    caspar_MagnificPopup();
    caspar_ContactForm();
});

/* -------------------------------------------------------------------
 * 01.Preloader
------------------------------------------------------------------- */
function caspar_PreLoader(){
    "use-scrict";

    // Variables
    let preloaderWrap = $( '#preloader-wrap' );
    let loaderInner = preloaderWrap.find( '.preloader-inner' );
 
    $( window ).ready(function(){
        loaderInner.delay(300).fadeOut(); 
        preloaderWrap.delay(300).fadeOut( 'slow' );
    });   
}

/* -------------------------------------------------------------------
 * 02.Header
------------------------------------------------------------------- */
function caspar_Header() {
    "use-strict";

    // Variables
    let header          = $( '.header' );
    let logoTransparent = $( '.logo-transparent' );
    let scrollTopBtn    = $( '.scroll-top-btn' );
    let navbarLink      = $( '.menu-link' );
    let logoNormal      = $( '.logo-normal' );
    let windowWidth     = $( window ).innerWidth();
    let scrollTop       = $( window ).scrollTop();
    let $dropdown       = $( '.dropdown' );
    let $dropdownToggle = $( '.dropdown-toggle' );
    let $dropdownMenu   = $( '.dropdown-menu' );
    let showClass       = 'show';

    // When Window On Scroll
    $( window ).on( 'scroll', function(){
        let scrollTop = $( this ).scrollTop();

        if( scrollTop > 85 ) {
            logoTransparent.hide();
            logoNormal.show();
            header.addClass( 'header-shrink' );
            scrollTopBtn.addClass( 'active' );
        }else {
            logoTransparent.show();
            logoNormal.hide();
            header.removeClass( 'header-shrink' );
            scrollTopBtn.removeClass( 'active' );
        }
    });

    // The same process is done without page scroll to prevent errors.
    if( scrollTop > 85 ) {
        logoTransparent.hide();
        logoNormal.show();
        header.addClass( 'header-shrink' );
        scrollTopBtn.addClass( 'active' );
    }else {
        logoTransparent.show();
        logoNormal.hide();
        header.removeClass( 'header-shrink' );
        scrollTopBtn.removeClass( 'active' );
    }

    // Window On Resize Hover Dropdown
    $( window ).on( 'resize', function() {
        let windowWidth  = $( this ).innerWidth();

        if ( windowWidth > 991 ) {

            $dropdown.on({
                mouseenter: function () {
    
                    const $this = $( this );
    
                    var hasShowClass  = $this.hasClass( showClass );
    
                    if( hasShowClass!==true ){
                        $this.addClass( showClass);
                        $this.find ( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                        $this.find( $dropdownMenu ).addClass( showClass );
                    }
    
                },
                mouseleave: function () {
    
                    const $this = $( this );
                    $this.removeClass( showClass );
                    $this.find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                    $this.find( $dropdownMenu ).removeClass( showClass );
    
                }
            });
    
        }else {
            $dropdown.off( 'mouseenter mouseleave' );
        }
    });
    // The same process is done without page scroll to prevent errors.
    if ( windowWidth > 991 ) {

        $dropdown.on({
            mouseenter: function () {

                const $this = $( this );

                var hasShowClass  = $this.hasClass( showClass );

                if( hasShowClass!==true ){
                    $this.addClass( showClass);
                    $this.find ( $dropdownToggle ).attr( 'aria-expanded', 'true' );
                    $this.find( $dropdownMenu ).addClass( showClass );
                }

            },
            mouseleave: function () {

                const $this = $( this );
                $this.removeClass( showClass );
                $this.find( $dropdownToggle ).attr( 'aria-expanded', 'false' );
                $this.find( $dropdownMenu ).removeClass( showClass );

            }
        });

    }else {
        $dropdown.off( 'mouseenter mouseleave' );
    }

    // Scroll Spy
    $('body').scrollspy({
        target: '#fixedNavbar',
        offset: 95
    });

    navbarLink.on( 'click', function(){
        $( '.navbar-collapse' ).collapse( 'hide' );
    }); 
}

/* -------------------------------------------------------------------
 * 03.Counter Up
------------------------------------------------------------------- */
function caspar_CounterUp() {
    "use-strict";

    // Variables
    let counterItem     = $( '.counter' );

    counterItem.counterUp({
        delay: 10,
        time: 1000
    });
}

/* -------------------------------------------------------------------
 * 04.Owl Carousel
------------------------------------------------------------------- */
function caspar_Carousel(){
    "use-strict";

    // Variables
    let clientsSlider    = $( '#clients-slider' );
    let teamSlider       = $( '#team-slider' );
    let blogSlider       = $( '#blog-slider' );

    var hasRtl                  = $("body").hasClass("rtl-mode");

    if (hasRtl===true) {
        clientsSlider.owlCarousel({
            loop:true,
            margin:24,
            rtl:true,
            dots: true,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
        teamSlider.owlCarousel({
            loop:true,
            margin:24,
            dots: true,
            nav:false,
            rtl:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
        blogSlider.owlCarousel({
            loop:true,
            margin:24,
            dots: true,
            nav:false,
            rtl:true,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                800:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    }else {
        clientsSlider.owlCarousel({
            loop:true,
            margin:24,
            dots: true,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
        teamSlider.owlCarousel({
            loop:true,
            margin:24,
            dots: true,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
        blogSlider.owlCarousel({
            loop:true,
            margin:24,
            dots: true,
            nav:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                800:{
                    items:2
                },
                1000:{
                    items:3
                }
            }
        });
    }
}

/* -------------------------------------------------------------------
 * 05.ScrollIt
------------------------------------------------------------------- */
function caspar_ScrollIt() {
    "use-strict";

    $.scrollIt({
        upKey: 38,             // key code to navigate to the next section
        downKey: 40,           // key code to navigate to the previous section
        easing: 'linear',      // the easing function for animation
        scrollTime: 600,       // how long (in ms) the animation takes
        activeClass: 'active', // class given to the active nav element
        onPageChange: null,    // function(pageIndex) that is called when page is changed
        topOffset: 0           // offste (in px) for fixed top navigation
    });
}

/* -------------------------------------------------------------------
 * 06.Background Image Path
------------------------------------------------------------------- */
function caspar_BgImgPath(){
    "use-scrict";

    // Variables
    let dataBgItem         = $( '*[data-bg-image-path]' );

    dataBgItem.each( function() {
        let imgPath        = $( this ).attr( 'data-bg-image-path' );
        $( this).css( 'background-image', 'url(' + imgPath + ')' );
    });
}

/* -------------------------------------------------------------------
 * 07.Wow Js
------------------------------------------------------------------- */
function caspar_WowJs() {
    "use-strict";

    let wow = new WOW(
            {
            boxClass:     'wow',      // default
            animateClass: 'animated', // default
            offset:       0,          // default
            mobile:       true,       // default
            live:         true        // default
        }
    )
    wow.init();
}

/* -------------------------------------------------------------------
 * 08.Skills Bar
------------------------------------------------------------------- */
function caspar_SkillsBar(){
    "use-strict";

    // Variables
    let skillsItem         = $( '.skills-item' );

    skillsItem.each(function(){
        let skillPercent   = $( this ).find( '.skills-progress-value' ).attr( 'data-percent' );

        $( this ).find( '.skills-progress-value' ).css( 'width', skillPercent + '%' );
        $( this ).find( '.skills-item-text .skill-percent' ).html( skillPercent + '%' );
    });
}

/* -------------------------------------------------------------------
 * 09.Services Tab
------------------------------------------------------------------- */
function caspar_ServicesTab(){
    "use-strict";

    // Variables
    let tabLinkWrap        = $('.tab-link-wrap');
    let tabLinkItem        = $('.tab-link-item');
    let tabContentItem     = $('.tab-content-item');

    // Tab Item Click
    tabLinkItem.on( 'click', function(){
        let thisIndex      =  $( this ).index();

        tabLinkWrap.find( tabLinkItem ).removeClass( 'active' );
        $( this ).addClass( 'active' );
        tabContentItem.removeClass( 'active' );
        tabContentItem.eq( thisIndex ).addClass( 'active' );
    });
}

/* ------------------------------------------------------------------- */
/* 10.My Works Gallery
/* ------------------------------------------------------------------- */
function caspar_MyWorksGallery() {
    "use-strict";

    // Variables 
    let galleryWrapper     = $( '#portfolio-masonry-wrap' );
    let portfolioFilterBtn = $( '.portfolio-filter a' );

    // Portfolio Masonary Gallery
    galleryWrapper.imagesLoaded(function() {
        let grid = galleryWrapper.isotope({
            itemSelector: '.portfolio-item',
            percentPosition: true,
            masonry: {
                columnWidth: '.portfolio-item',
            }
        });

        // filter items on button click
        portfolioFilterBtn.on( 'click', function() {
            let filterValue = $(this).attr( 'data-portfolio-filter' );
            grid.isotope({
                filter: filterValue
            });
        });
    });

    // filter items on button click
    portfolioFilterBtn.on( 'click', function() {
        portfolioFilterBtn.removeClass( 'current' );
        $(this).addClass( 'current' );
        event.preventDefault();
    });
}

/* -------------------------------------------------------------------
 * 11.Magnific Popup
------------------------------------------------------------------- */
function caspar_MagnificPopup() {
    "use-strict";

    let videoBtn           = $( '.default-video-btn' );

    videoBtn.magnificPopup({
		disableOn: 700,
		type: 'iframe',
		mainClass: 'mfp-fade',
		removalDelay: 160,
		preloader: false,
		fixedContentPos: false
	});
}

/* -------------------------------------------------------------------
* 12.Contact Form
------------------------------------------------------------------- */
function caspar_ContactForm(){
    "use-strict";

    var formControl         = $('#contactForm .custom-form-control');

// Added AutoComplete Attribute Turned Off
    formControl.attr( 'autocomplete","off' );

//  Captcha Variables
    let contactFormCaptchaVal     = $("#contactFormCaptchaVal");
    let contactFormCaptchaSpan    = $('#contactFormCaptchaSpan');
    let contactFormCaptchaVal2     = $("#contactFormCaptchaVal2");
    let contactFormCaptchaSpan2    = $('#contactFormCaptchaSpan2');
    let contactFormCaptchaVal3     = $("#contactFormCaptchaVal3");
    let contactFormCaptchaSpan3    = $('#contactFormCaptchaSpan3');

// Generates the Random number function
    function randomNumber(){

        let a = Math.ceil(Math.random() * 9) + '',
            b = Math.ceil(Math.random() * 9) + '',
            c = Math.ceil(Math.random() * 9) + '',
            d = Math.ceil(Math.random() * 9) + '',
            e = Math.ceil(Math.random() * 9) + '',
            code = a + b + c + d + e;

        contactFormCaptchaVal.val(code);
        contactFormCaptchaSpan.html(code);

    }

    function randomNumber2(){

        let a = Math.ceil(Math.random() * 9) + '',
            b = Math.ceil(Math.random() * 9) + '',
            c = Math.ceil(Math.random() * 9) + '',
            d = Math.ceil(Math.random() * 9) + '',
            e = Math.ceil(Math.random() * 9) + '',
            code = a + b + c + d + e;

        contactFormCaptchaVal2.val(code);
        contactFormCaptchaSpan2.html(code);

    }

    function randomNumber3(){

        let a = Math.ceil(Math.random() * 9) + '',
            b = Math.ceil(Math.random() * 9) + '',
            c = Math.ceil(Math.random() * 9) + '',
            d = Math.ceil(Math.random() * 9) + '',
            e = Math.ceil(Math.random() * 9) + '',
            code = a + b + c + d + e;

        contactFormCaptchaVal3.val(code);
        contactFormCaptchaSpan3.html(code);

    }

// Called random number function
    randomNumber();
    randomNumber2();
    randomNumber3();



}