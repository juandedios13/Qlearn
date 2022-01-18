$(document).ready(function(){
	
	$("#imgme").click(function(){
		$(".opcionesMenu").animate({right:0},500);
	});

	$(".cerrar").click(function(){
		$(".opcionesMenu").animate({right:-330},500);
	});
});