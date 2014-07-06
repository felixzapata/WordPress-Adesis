var menuPrincipal = function() {
	var subMenus = null,
		obj = null,
		CLASE_PARA_OCULTAR = "indentado",
		IDMENU = "#menuPrincipal",
		submenuActivo = null,
	init = function(){
		var subMenu, itemsPrimerNivel;
		obj = $(IDMENU);
		subMenus = obj.find("ul ul");
		itemsPrimerNivel = obj.find("> ul > li");
		itemsPrimerNivel.each(function(){
			var elemento = $(this);
			if ( hasSubMenu(elemento) ){
				subMenu = elemento.find("ul");
				hagoClickEnMenu(elemento, subMenu);
				hagoClickEnElementoExternoMenu(subMenu);
			}
		});
	},
	hagoClickEnElementoExternoMenu = function(subMenu){
		var elemento;
		$('html').on("click", {sub:subMenu}, function(event) {
			elemento = $(event.target);
			if ( hePulsadoFueraDelMenu(elemento) ) {
				event.data.sub.addClass(CLASE_PARA_OCULTAR);
			}
		});
	},
	hePulsadoFueraDelMenu = function(target){
		return obj.find(target).length === 0;
	},
	hagoClickEnMenu = function(opcionMenu, subMenu){
		opcionMenu.on("click", {sub:subMenu}, function(event){
			var elemento = event.data.sub,
				ariaHid = "aria-hidden",
				clickEnPrimerNivel = $(event.target).is("span");
				if(clickEnPrimerNivel){
					event.preventDefault();
					event.stopPropagation();
				}

			if(submenuActivo){
				submenuActivo.addClass(CLASE_PARA_OCULTAR);
				submenuActivo.attr(ariaHid, "true");
			}
			elemento.toggleClass(CLASE_PARA_OCULTAR);
			submenuActivo =  elemento;
			elemento.attr(ariaHid, getValue(elemento, ariaHid));
		});
	},
	hasSubMenu = function(obj){
		return obj.attr("aria-haspopup") === "true";
	},
	getValue = function(elemento, atributo){
		var valor = elemento.attr(atributo);
		return !( valor === "true" );
	};
	return {
		init:init
	};
}();

var listOficinas = {
	CLASE_PARA_OCULTAR: "indentado",
	ID: ".listOficinas",
	init:function(){
		var self = this,
			elemento, delegaciones, dd, a;
		this.obj = $(this.ID);
		delegaciones = this.obj.find("dt");
		delegaciones.on("click", function(event){
			var ariaSel = "aria-selected",
				ariaEx = "aria-expanded",
				ariaHid = "aria-hidden";
			event.preventDefault();
			event.stopPropagation();
			elemento = $(this);
			dd = elemento.next();
			a = elemento.find("a");
			elemento.attr(ariaSel, self.getValue(elemento, ariaSel));
			elemento.attr(ariaEx, self.getValue(elemento, ariaEx));
			dd.toggleClass(self.CLASE_PARA_OCULTAR);
			a.toggleClass("up");
			dd.attr(ariaHid, self.getValue(dd, ariaHid));
		});
	},
	getValue:function(elemento, atributo){
		var valor = elemento.attr(atributo);
		return !( valor === "true" );
	}
};

var lightbox = {
	init:function(){
		var self = this;
		$(".lightbox").on("click",function(event){
			var elemento = $(this);
			event.preventDefault();
			event.stopPropagation();
			if(elemento.parent().hasClass("zoom")){
				self.open(this, elemento.attr("href"), "image", 10);
			}else{
				self.open(this, elemento.attr("href"), "iframe", 0);
			}
		});
	},
	open:function(obj, href, type, padding){
		$.fancybox(obj, {
			'speedIn'		:	600,
			'speedOut'		:	200,
			'padding'		: padding,
			'width' : 920,
			'height' : 521,
			'modal': false,
			'centerOnScroll' : true,
			'closeBtn' : false,
			'type':type,
			'scrolling': 'no',
			'scrollOutside' : true,
			'href' : href,
			afterShow: function(){
				$(".fancybox-skin").append($("<span class='fancybox-close'><a href='javascript:$.fancybox.close()' title='cerrar la ventana'><img src='img/i_close.png' width='33' height='33' alt='cerrar la ventana' /></a></span>"));
			}
		});
	}
};

var carrusel = function(){

	var selector  = ".carrusel",
		CLASE_PARA_OCULTAR = "oculto",
		CLASE_ELEMENTO_ACTIVO = "activo";


	function setup(carousel, elemento) {
		var numeroElementos = carousel.size(),
			sig = elemento.find(".next"),
			ant = elemento.find(".prev"),
			enlacesPaginacion = elemento.find(".paginacion a"),
			activo = enlacesPaginacion.eq(0),
			posicion = 0;

		enlacesPaginacion.on('click', function(event) {
			var ptoSeleccionado = $(this);
			event.preventDefault();
			event.stopPropagation();
			posicion = enlacesPaginacion.index(ptoSeleccionado);
			mueve(ptoSeleccionado);
		});

		sig.on('click', function(event) {
			event.preventDefault();
			event.stopPropagation();
			posicion++;
			mueve(enlacesPaginacion.eq(posicion));
		});
		ant.on('click', function(event) {
			event.preventDefault();
			event.stopPropagation();
			posicion--;
			mueve(enlacesPaginacion.eq(posicion));
		});
		function mueve(enlace){
			// mueve el carrusel a la posicion indicada empezando por 1
			carousel.scroll(posicion+1);
			activo.removeClass(CLASE_ELEMENTO_ACTIVO);
			enlace.addClass(CLASE_ELEMENTO_ACTIVO);
			activo = enlace;
			estadoControles(posicion, numeroElementos, ant, sig);
		}

	}

	function estadoControles(posicion, numeroElementos, ant, sig ){
		var ultimoElemento = numeroElementos - 1;
		if(posicion === 0) {
			ant.addClass(CLASE_PARA_OCULTAR);
			sig.removeClass(CLASE_PARA_OCULTAR);
		} else if(posicion === ultimoElemento) {
			ant.removeClass(CLASE_PARA_OCULTAR);
			sig.addClass(CLASE_PARA_OCULTAR);
		} else {
			ant.removeClass(CLASE_PARA_OCULTAR);
			sig.removeClass(CLASE_PARA_OCULTAR);
		}

	}

	function preparaInitCallback(elemento){
		return function(carousel){
			setup(carousel, elemento);
		};
	}

	function init (){

		$(selector).each(function(){
			var elemento = $(this),
				ulCarrusel = elemento.find(".items");
			$(ulCarrusel).jcarousel({
				scroll: 1,
				initCallback: preparaInitCallback(elemento),
				buttonNextHTML: null,
				buttonPrevHTML: null
			});
		});

	}
	return {
		init:init
	};

}();

var colapsables = function() {
	var CLASE_SUBIR = "up",
		SELECTOR = "mostrarContenido",
		CLASE_PARA_OCULTAR = "indentado",
		init = function(){
			var elementosColapsables = $("."+SELECTOR);
			elementosColapsables.on("click", function(event){
				var elemento = $(this),
					informacionOculta = elemento.next();
				event.preventDefault();
				event.stopPropagation();
				elemento.toggleClass(CLASE_SUBIR);
				informacionOculta.toggleClass(CLASE_PARA_OCULTAR);
			});
		};
	return {
		init:init
	};
}();

var customSelect = function(){
	var init = function(){
		$('.customSelect').selectmenu({style:'dropdown'});
		var ts = $('<div class="ui-button ui-widget ui-state-default ui-corner-all" style="width:1px; height:1px; padding: 1px; top: -1500em; left: 0; width: 1px; height: 1px; overflow: hidden;"></div>')
		.appendTo('body'); // arreglo para IE 7. No puede mandar el foco a controles ocultos
	};
	return {
		init:init
	};
}();

var popups = function(){
	var CLASE_PARA_OCULTAR = "indentado",
		CLASE_ESTADO_POPUP_VISIBLE = "flot",
	init = function(){
		var boton = $(".lanzaPopup"),
			popups = $(".popup"),
			identificador;
		boton.on("click", function(event){
			var elemento = $(this),
				identificador = $(this).attr("id"),
				popup = $(popups).filter('[aria-labelledby="'+identificador+'"]');
			event.preventDefault();
			event.stopPropagation();
			muestraPopup(elemento, popup);
			hagoClickEnElementoExterno(popup);
		});
	},
	muestraPopup = function(elemento, popup){
		var coordenadasElemento = elemento.offset(),
			posX = parseInt(coordenadasElemento.left,10) + "px",
			posY = parseInt(coordenadasElemento.top,10) + "px";
		popup.toggleClass(CLASE_PARA_OCULTAR);
		popup.toggleClass(CLASE_ESTADO_POPUP_VISIBLE);
		popup.css("left", posX);
		popup.css("top", posY);
	},
	hagoClickEnElementoExterno = function(item){
		var elementoPulsado;
		$('html').on("click", function(event) {
			elementoPulsado = $(event.target);
			if ( hePulsadoFuera(elementoPulsado, item) ) {
				item.addClass(CLASE_PARA_OCULTAR);
				item.removeClass(CLASE_ESTADO_POPUP_VISIBLE);
				item.removeAttr("style");
			}
		});
	},
	hePulsadoFuera = function(target, obj){
		return obj.find(target).length === 0;
	};
	return {
		init:init
	};
}();

jQuery(document).ready(function() {

	if($(".lanzaPopup").length !== 0) popups.init();
	if( $("#menuPrincipal").length !== 0 ) menuPrincipal.init();
	if( $(".listOficinas").length !== 0 ) listOficinas.init();
	if( $(".lightbox").length !== 0 ) lightbox.init();
	if( $(".carrusel").length !== 0 ) carrusel.init();
	if( $(".collapse").length !== 0 ) colapsables.init();
	if( $(".customSelect").length !== 0 ) customSelect.init();

});
