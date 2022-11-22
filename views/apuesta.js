function mostrarPorrasPartido(porrasPartido) {
	$("#divPorrasPartido").append(
		$("<div>").addClass("divTh").text("Nombre"),
		$("<div>").addClass("divTh").text("Porra"),
		$("<div>").addClass("divTh").text("Porra"),
		$("<div>").addClass("divTh").text("Puntuacion"),
	);

	for (porra of porrasPartido){
		porra = validarNulos(porra);
		if(id == porra.id){
			$("#divPorrasPartido").append(
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(porra.nombre),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(porra.apuesta_1),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(porra.apuesta_2),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(porra.puntuacion),
			);
		}else{
			$("#divPorrasPartido").append(
				$("<div>").addClass("divTd").text(porra.nombre),
				$("<div>").addClass("divTd").text(porra.apuesta_1),
				$("<div>").addClass("divTd").text(porra.apuesta_2),
				$("<div>").addClass("divTd").text(porra.puntuacion),
			);
		}
	}
}

function validarNulos(partido){
	if(porra.apuesta_1 == undefined || porra.apuesta_1 == null || porra.apuesta_1 == ""){
		porra.apuesta_1 = "-";
	}
	if(porra.apuesta_2 == undefined || porra.apuesta_2 == null || porra.apuesta_2 == ""){
		porra.apuesta_2 = "-";
	}
	if(porra.puntuacion == undefined || porra.puntuacion == null || porra.puntuacion == ""){
		porra.puntuacion = "-";
	}
	return porra;
}