        /*
        * Ejemplos de coordenadas
        * Madrid: 40.47799923859763, -3.7035075500000403
        * Barcelona: 41.392700620871764, 2.139299449999953
        * Coruña: 43.34567700262167, -8.422813299999916
        * Bilbao: 43.25191170856128, -2.9331675000000814
        * Pamplona: 42.81574252263008, -1.6496008000000302
        * Ibiza: 38.910339674213816, 1.423660400000017
        * Jaen: 37.79157814857648, -3.742541899999992
		* Sevilla: 37.38322858821286, -5.923545099999956
		* Burgos: 42.344421110653975, -3.689439450000009
		* Guadalajara: 40.61556749098899, -3.147459300000037
        */
var gMaps = {
	ICONOS_DE_MARCADORES : ['img/i_papel.png', 'img/i_energia.png', 'img/i_carton.png', 'img/i_gestion.png', 'img/i_otras.png'],
	COORS_INICIALES : ["40.3964129438718", "-3.7129999999999654"],
	map:null,
	myLatLng:null,
	marker:null,
	markersArray:[],
	init:function(){
		var self = this,
			image = this.ICONOS_DE_MARCADORES[0];
			mapOptions = {
				zoom: 5,
				center: new google.maps.LatLng(this.COORS_INICIALES[0], this.COORS_INICIALES[1]),
				disableDefaultUI: false,
				mapTypeId: google.maps.MapTypeId.ROADMAP
			};
        this.map = new google.maps.Map(document.getElementById('map'), mapOptions);
	},
	crearPuntos:function(data,idx){
		var len, len2, i, j, aux,
			self = this;
		len = data.paises.length;
		self.borraPuntosDelMapa();
		for(i = 0; i < len; i++){
			aux = data.paises[i].lugares;
			len2 = aux.length;
			for(j = 0; j < len2; j++){
				this.myLatLng = new google.maps.LatLng(aux[j].latitud, aux[j].longitud);
				this.marker = new google.maps.Marker({
					position: self.myLatLng,
					map: self.map,
					icon: self.ICONOS_DE_MARCADORES[idx]
				});
				self.markersArray.push(this.marker);
			}
		}
	},
	borraPuntosDelMapa:function(){
		var i, len;
		if (this.markersArray) {
			for (i in this.markersArray) {
				this.markersArray[i].setMap(null);
			}
			this.markersArray.length = 0;
		}
	}
};

var localizaciones = {
	tabs:null,
	SECTORES: ["Papel", "Energia", "Cartón", "Gestión de residuos", "Otras"],
	PESTANA_ACTIVA: "activo",
	CONTENEDOR_DATOS: "wrap",
	CONTENEDOR_SCROLL : ".scroll-pane",
	tabpanel : null,
	cache: [],
	init:function(){
		this.tabs = $(".tabs li");
		this.wrap = $("."+this.CONTENEDOR_DATOS);
		this.tabpanel = $("#infoLugares").find("[role='tabpanel']");
		this.asignarEventosPestanas();
		this.primeraCargaPuntosEnElMapa();
		this.activarScrollVirtual();
	},
	activarScrollVirtual:function(){
		$(this.CONTENEDOR_SCROLL).jScrollPane();
	},
	asignarEventosPestanas:function(){
		var idx, that,
			self = this;
		this.tabs.on("click", function(event){
			event.preventDefault();
			event.stopPropagation();
			that = $(this);
			idx = self.tabs.index(that);
			self.cambioPestana(that);
			self.preparoContenedor(that, idx);
			self.pidoDatos(that, idx);
		});
	},
	primeraCargaPuntosEnElMapa:function(){
		var tab = this.tabs.eq(0);
		this.preparoContenedor(tab, 0);
		this.pidoDatos(tab, 0);
	},
	cambioPestana:function(obj){
		this.tabs.attr("aria-selected", "false");
		this.tabs.removeClass(this.PESTANA_ACTIVA);
		obj.addClass(this.PESTANA_ACTIVA);
		obj.attr("aria-selected", "true");
	},
	/*
	* borro las clases existentes y establezco la principal mas la del sector
	* "wrap s1": papel, "wrap s2": energia, "wrap s3": carton, "wrap s4": gestion, "wrap s5": otras
	*/
	preparoContenedor:function(obj,idx){
		var aux = idx + 1;
		this.wrap.removeClass();
		this.wrap.addClass(this.CONTENEDOR_DATOS + " s" + aux);
		this.tabpanel.attr("aria-labelledby", "sector" + aux);
	},
	pidoDatos:function(obj,idx){
		var self = this,
			cacheID = "sector:"+self.SECTORES[idx],
			datosCache =this.cache[cacheID];

		if(datosCache){
			self.muestroDatos(datosCache,idx);
		}else{
			$.ajax({
				type:"POST",
				data: {"sector": self.SECTORES[idx]},
				url: "js/lugares.js",
				//url: obj.find("a").attr("href"),
				dataType: "json",
				success: function(data){
					self.muestroDatos(data, idx);
					self.cache[cacheID] = data;
				},
				error:function(){}
			});
		}
	},
	muestroDatos:function(data, idx){
		var template = "<div class='scroll-pane'><dl>{{#paises}}<dt>{{pais}}</dt><dd><ul>{{#lugares}}<li><strong>{{nombre}}</strong>{{#direcciones}}<p>{{direccion}}</p>{{/direcciones}}</li>{{/lugares}}</ul></dd>{{/paises}}</dl></div>";
		this.wrap.empty();
		this.wrap.html($(Mustache.to_html(template, data)));
		this.activarScrollVirtual();
		gMaps.crearPuntos(data,idx);
	}
};

jQuery(document).ready(function() {

	gMaps.init();
	localizaciones.init();

});
