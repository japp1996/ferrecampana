	// Añadimos la class de bootstrap al iframe para que los videos se vean al 100%
	$(document).ready(function(){
		$('.embed-responsive iframe').addClass('embed-responsive-item');
	})

// Same height
//-------------------------------------------------------------//

	$.fn.equalCols = function(){ //Asignamos la nueva función equalCols
		var tallestHeight = 0; //Reinicia la variable que guarda la mayor altura
		// $(this).css('padding-bottom','0');
		$(this).each(function(){ //Comprueba uno por uno los elementos con el selector indicado

			var thisHeight = $(this).innerHeight(); //Guarda la altura del elemento

			if (thisHeight > tallestHeight){ // Si la altura es mayor que la anterior altura guardada, se asigna a la variable tallesHeight
				tallestHeight = thisHeight;
			}
		});

		$(this).css('height',tallestHeight); //Se asigna la mayor altura a los elementos con el selector indicado
	}


	// Deslizar anchors
	//-------------------------------------------------------------//
	$(function(){
		$("a[href*='#']").click(function(){
			if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){
				var t=$(this.hash);
				if(t=t.length&&t||$("[name="+this.hash.slice(1)+"]"),t.length){
					var a=t.offset().top;
					return $("html,body").animate({scrollTop:a},500)
				}
			}
		})
	}) 

$(document).ready(function(){

	// Header fixed
	//-------------------------------------------------------------//
	 if ($('header').css('position') == 'fixed'){

		$(window).scroll(function() {
			var headerHeight = $('header').height();
			if($(window).scrollTop() >= headerHeight/2) {
				$('header').addClass('fixed');
				$('#logo').addClass('fixed');
				$('#language-nav').addClass('fixed');
			}
			if($(window).scrollTop() < headerHeight/2) {
				$('header').removeClass('fixed');
				$('#logo').removeClass('fixed');
				$('#language-nav').removeClass('fixed');
			}
		})

	}

	// Owl carousel full script
	//-------------------------------------------------------------//
	var $items = $('.standardslider-full, .mainslider-full').children('.item');

	$items.each(function(){
		var $item = $( this );
		$(this).css( 'background-image', 'url(' + $item.find( 'img' ).attr( 'src' ) + ')' );
		$item.find('img').hide();
	})


	// Cookies
	//-------------------------------------------------------------//
	$("#cookies").click(function(){

		document.cookie="accept_cookies=yes; expires=Fri, 31 Dec 9999 23:59:59 GMT";
		$("#cookies_msg_subwrapper").hide();
		$('#mobile-bottom-icon').css('bottom', '20px');

	});
	if ($("#cookies_msg_subwrapper").is(":visible")) {
        $('#mobile-bottom-icon').css('bottom', '130px');
    }

	// Menu mobile
	//-------------------------------------------------------------//
	$('.menu-icon').click(function(){
		$(this).toggleClass('open');
		$('#main-navigation').toggleClass('open');

		if( $('.main-navigation-content').css('visibility') == 'hidden' ){
			$('#main-navigation').append('<span class="lightbox"></span>');
			$('#main-navigation .lightbox').animate({opacity:0.8}, 'fast');
		} else {
			$('#main-navigation .lightbox').remove();
		}
	})

	$('.user-icon').click(function(){
		$(this).toggleClass('open');
		$('#user-navigation').toggleClass('open');

		if( $('.user-navigation-content').css('visibility') == 'hidden' ){
			$('#user-navigation').append('<span class="lightbox"></span>');
			$('#user-navigation .lightbox').animate({opacity:0.8}, 'fast');
		} else {
			$('#user-navigation .lightbox').remove();
		}
	})

	// acordion menu
	//-------------------------------------------------------------//
	$('.toggle').click(function() {

		var $this = $(this);

		if ($this.next('ul').hasClass('show')) {
			$this.next('ul').removeClass('show');
			$this.removeClass('show');
		} else {
			$this.parent().parent().find('li ul, li .icon-submenu').removeClass('show');
			$this.next('ul').toggleClass('show');
			$this.toggleClass('show');
		}
	});

})


function posicionarMenu() {
    var altura = ($('header').outerHeight(true) + $('.block1').outerHeight(true)) - 100;

    if ($(window).scrollTop() >= altura){
        $('.shopping-cart').addClass('fixed');
    } else {
        $('.shopping-cart').removeClass('fixed');
    }
}

$(window).scroll(function() {    
    posicionarMenu();
});

 $(window).on('load', function () {

	// Header fixed
	//-------------------------------------------------------------//
	if ($('header').css('position') == 'fixed'){

		$(window).scroll(function() {
			var headerHeight = $('header').height();
			if($(window).scrollTop() >= headerHeight/2) {
				$('header').addClass('fixed');
			}
			if($(window).scrollTop() < headerHeight/2) {
				$('header').removeClass('fixed');
			}
		})

	}

    // Carga Same height
    //-------------------------------------------------------------//
    $('.sameheight').equalCols();
    $('.sameheight_news').equalCols();
    $('.sameheight_products').equalCols();

});