

$(document).ready(function(){
	get_information2();
});

function get_information2(){
	$("#service").load("servicios.html.twig", function(){
		$("#destinos").load("destinos.html.twig", function(){
			//after loading destinos.html... otherwise the
			//id infor_text_grecia may not be found
			$("#info_text_grecia").load("grecia.txt", function(){
					cargar_seccion_especiales();
				});
		});
	});	
} 

function get_information(){
	$("#service").load("servicios.html.twig", cargar_seccion_especiales());
}

function cargar_seccion_especiales(){
	$("#especiales").load("especiales.html.twig",
	function(){
		$("#tutankamon").load("tutankamon.txt", function(){
			$("#muralla").load("muralla.txt");
		});
	})
}


function cargar_datos_sec_esp(){
	$("#tutankamon").load("tutankamon.txt", function(){
		$("#muralla").load("muralla.txt");
	});
}


function change_slide_img_color(){
	$(".nodo_slide").mouseover(function(event){
		$(".nodo_slide").addClass("nodo_big_slide");
		$(".nodo_slide").removeClass("nodo_slide");		
	});
	$('.nodo_big_slide').mouseout(function(event){
		$(".nodo_big_slide").addClass("nodo_slide");
		$(".nodo_slide").removeClass("nodo_big_slide");	
	});
}
