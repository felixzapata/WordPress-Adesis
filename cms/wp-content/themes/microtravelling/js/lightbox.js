
/*var images = [];
	images[0] = new Image();
		images[0].src = "img/granmelia/light1.jpg";
	images[1] = new Image();	
		images[1].src = "img/granmelia/light2.jpg";
	images[2] = new Image();	
		images[2].src = "img/granmelia/light3.jpg";
	images[3] = new Image();	
		images[3].src = "img/granmelia/light4.jpg";
	images[4] = new Image();	
		images[4].src = "img/granmelia/light5.jpg";
	images[5] = new Image();
		images[5].src = "img/granmelia/light6.jpg";
	images[6] = new Image();		
		images[6].src = "img/granmelia/light7.jpg";*/

var fotos={
	
	init:function(){
	
		var obj = $("#img");
		var enlaces = obj.find("a");
		var img = obj.find("img:first");

		enlaces.bind("click",function(event){
			var idx = enlaces.index($(this));
			img.fadeOut(1000,function(){
				img.attr("src",images[idx].src);
			}).fadeIn(900);
			event.preventDefault();
			event.stopPropagation();
		})

		 $('#carrusel').delegate('img','click', function(){     // When someone clicks on a thumbnail 
               $('#ig-hero').attr('src',$(this).attr('src').replace('-48x48',''));   // Replace the Full Sized version of selected image 
               $('#ig-thumbs li img').removeClass("selected");     // Remove "selected" class from all thumbnails 
               $(this).addClass("selected");                       // Add "selected" class to selected thumbnail 
               $('#ig-title').html($(this).attr('alt'));           // Replace the Title with Title selected image 
         }); 
		
	
	}
}


var carrusel = {
	init:function(){

		$('#img ul').jcarousel();
	}
	
}

jQuery(document).ready(function() {	
	fotos.init();	
	carrusel.init();

})


