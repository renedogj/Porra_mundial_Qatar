var partido;
var fechaPartido;
$.ajax({
	method: "POST",
	url: "../models/obtenerPartido.php",
	data: {
		idPartido: idPartido
	},
	success: function(result){
		partido = result;
		$("#div_pais_1").text(partido.nombre_1);
		$("#div_pais_2").text(partido.nombre_2);
		$("#div_abreviatura_1").text(partido.abreviatura_1);
		$("#div_abreviatura_2").text(partido.abreviatura_2);
		$("#bandera_1").attr("src","../img/banderas/"+partido.abreviatura_1+".webp");
		$("#bandera_2").attr("src","../img/banderas/"+partido.abreviatura_2+".webp");
		$("#inputApuesta_1").val(partido.apuesta_1);
		$("#inputApuesta_2").val(partido.apuesta_2);
		fechaPartido = new Date(partido.fecha);
	},
	error(xhr,status,error){
		window.location.assign("../");
	},
	dataType: "json",
	async: false
});

$("#bttnApostar").click(() => {
	if(fechaPartido > new Date().getTime()){
		var datos = {};
		datos["idPartido"] = idPartido;
		datos["idApuesta"] = partido.idApuesta;
		datos["apuesta1"] = $("#inputApuesta_1").val();
		datos["apuesta2"] = $("#inputApuesta_2").val();
		if(validarDatos(datos)){
			$.ajax({
				method: "POST",
				url: "../models/apostar.php",
				data: datos,
				success: function(result){
					if(!result.error){
						window.location.assign("partidos.php");
					}else{
						alert("Se ha producido un error al guardar tu porra");
					}
				},
				error(xhr,status,error){
					console.error(error)
				},
				dataType: "json"
			});
		}else{
			alert("Los datos introducidos no son correctos");
		}
	}else{
		alert("La porra de este partido esta cerrada, lo siento");
	}
})

if(fechaPartido < new Date().getTime()){
	$("#bttnApostar").hide();

	$.ajax({
		method: "POST",
		url: "../models/obtenerApuestasPartido.php",
		data: {
			idPartido : idPartido,
		},
		success: function(result){
			console.log(result);
			porrasPartido = result["porrasPartido"];
			id = result["id"];
			mostrarPorrasPartido(porrasPartido);
		},
		error(xhr,status,error){
			console.error(error)
		},
		dataType: "json"
	});
}

var intervalCountDownFechaPartido = setInterval(() => {
	var now = new Date().getTime();

	var distance = fechaPartido - now;
	var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	var seconds = Math.floor((distance % (1000 * 60)) / 1000);

	if (distance < 0) {
		clearInterval(intervalCountDownFechaPartido);
		$("#countdown-timer").text("");
		$(".contdown").text("Ya no puedes editar tu porra, el partido ya ha comenzado");
	}else{
		$("#countdown-timer").text(days + "d " + hours + "h " + minutes + "m " + seconds + "s ");
	}
}, 1000);

function validarDatos(datos){
	let apuesta1 = datos["apuesta1"];
	let apuesta2 = datos["apuesta2"];
	if(!isNaN(apuesta1) || !isNaN(apuesta2)){
		return (/^[0-9]{1,3}$/.test(apuesta1) && /^[0-9]{1,3}$/.test(apuesta2));
	}
	return false;
}