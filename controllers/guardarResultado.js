var partido;
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
	},
	error(xhr,status,error){
		window.location.assign("../");
	},
	dataType: "json",
	async: false
});

$("#bttnGuardarResultado").click(() => {
	var datos = {};
	datos["idPartido"] = idPartido;
	datos["faseGrupos"] = partido.faseGrupos;
	datos["resultado1"] = $("#inputResultado_1").val();
	datos["resultado2"] = $("#inputResultado_2").val();
	if(validarDatos(datos)){
		$.ajax({
			method: "POST",
			url: "../models/guardarResultados.php",
			data: datos,
			success: function(result){
				alert("Resultado y puntuaciones actualizadas con exito");
				window.location.assign("partidos.php");
			},
			error(xhr,status,error){
				console.log(error)
			},
			dataType: "text"
		});
	}else{
		alert("Los datos introducidos no son correctos");
	}

})

function validarDatos(datos){
	let resultado1 = datos["resultado1"];
	let resultado2 = datos["resultado2"];
	if(!isNaN(resultado1) || !isNaN(resultado2)){
		return (/^[0-9]{1,3}$/.test(resultado1) && /^[0-9]{1,3}$/.test(resultado2));
	}
	return false;
}