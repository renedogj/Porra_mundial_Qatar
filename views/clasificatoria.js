function mostrarPorraClasificatoria(apuestasClasificatoria) {
	$("#divClasificatoriaApuestas").append(
		$("<div>").addClass("divTh").text("Nombre"),
		$("<div>").addClass("divTh").text("1º puesto"),
		$("<div>").addClass("divTh").text("2º puesto"),
		$("<div>").addClass("divTh").text("3º puesto"),
		$("<div>").addClass("divTh").text("4º puesto"),
		$("<div>").addClass("divTh").text("Puntuacion")
	);

	for (apuesta of apuestasClasificatoria){
		if(id == apuesta.id){
			$("#divClasificatoriaApuestas").append(
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(apuesta.nombre),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(apuesta.puesto_1),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(apuesta.puesto_2),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(apuesta.puesto_3),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(apuesta.puesto_4),
				$("<div>").addClass("divTd").addClass("tuPuntuacion").text(apuesta.puntuacion)
			);
		}else{
			$("#divClasificatoriaApuestas").append(
				$("<div>").addClass("divTd").text(apuesta.nombre),
				$("<div>").addClass("divTd").text(apuesta.puesto_1),
				$("<div>").addClass("divTd").text(apuesta.puesto_2),
				$("<div>").addClass("divTd").text(apuesta.puesto_3),
				$("<div>").addClass("divTd").text(apuesta.puesto_4),
				$("<div>").addClass("divTd").text(apuesta.puntuacion)
			);
		}
	}
}