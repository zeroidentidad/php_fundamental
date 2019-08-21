// JavaScript Document

$(document).ready(function() {
   $('#calendario').hide();
   
});

function show_calendar(){
	$('#calendario').toggle();
}

function update_calendar(){
	var mes = $('#calendar_mes').val();
	var anio = $('#calendar_anio').val();
	
	var valores ='mes='+mes+'&anio='+anio;
	
	$.ajax({
		url:'setvalue.php',
		type:"GET",
		data:valores,
		success: function(datos){
			$('#calendario_dias').html(datos);
		}
	});
}

function set_date(date){
	$('#fecha').attr('value',date);
	show_calendar();
}









