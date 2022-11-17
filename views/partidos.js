function mostrarPartidosPorGrupos(partidos){
	console.log(partidos);
	for(partidosGrupos of partidos){
		console.log(partidosGrupos)
		for (grupo in partidosGrupos){
			console.log(grupo)
			let textoGrupo = "Grupo " + grupo;
			if(!isNaN(grupo)){
				textoGrupo = nombrarClasificatoria(grupo);
			}
			$("#divPartidosPorGrupos").append(
				$("<div>").attr("id","divPartidosGrupo-"+grupo).addClass("divPartidosGrupo").append(
					$("<h2>").text(textoGrupo),
					$("<div>").attr("id","tablePartidosGrupo-"+grupo)
				)
			);
			for (partido of partidosGrupos[grupo]){
				partido = validarNulos(partido);
				let idPartido = partido.id;
				$("#tablePartidosGrupo-"+grupo).addClass("divPartidos").append(
					$("<div>").addClass("divBoton").append(
						$("<button>").addClass("button").attr("id","botonVotar-"+idPartido).text("Vota").click(() => {
							console.log(idPartido);
							window.location.assign("apuesta.php?idPartido="+idPartido);
						})
					),
					$("<div>").addClass("divFecha").text(partido.fecha),
					$("<div>").addClass("divApuesta").text(partido.apuesta_1),
					$("<div>").addClass("divNombre").text(partido.nombre_1),
					$("<div>").addClass("divAbreviatura").text(partido.abreviatura_1),
					$("<div>").addClass("divBandera").append(
						$("<img>").attr("src","../img/banderas/"+partido.abreviatura_1+".webp")
					),
					$("<div>").addClass("divResultado").text(partido.resultado_1),
					$("<div>").addClass("divResultado").text(partido.resultado_2),
					$("<div>").addClass("divBandera").append(
						$("<img>").attr("src","../img/banderas/"+partido.abreviatura_2+".webp")
					),
					$("<div>").addClass("divAbreviatura").text(partido.abreviatura_2),
					$("<div>").addClass("divNombre").text(partido.nombre_2),
					$("<div>").addClass("divApuesta").text(partido.apuesta_2),
				)
			}
		}
	}
}

function mostrarPartidosPorFecha(partidos){
	for (partido of partidos){
		partido = validarNulos(partido);
		$("#divTablaPartidosPorFecha").addClass("divPartidos").append(
			$("<div>").addClass("divBoton").append(
				$("<button>").addClass("button").text("Vota").click(() => {
					window.location.assign("apuesta.php?idPartido="+partido.id);
				})
			),
			$("<div>").addClass("divFecha").text(partido.fecha),
			$("<div>").addClass("divApuesta").text(partido.apuesta_1),
			$("<div>").addClass("divNombre").text(partido.nombre_1),
			$("<div>").addClass("divAbreviatura").text(partido.abreviatura_1),
			$("<div>").addClass("divBandera").append(
				$("<img>").attr("src","../img/banderas/"+partido.abreviatura_1+".webp")
			),
			$("<div>").addClass("divResultado").text(partido.resultado_1),
			$("<div>").addClass("divResultado").text(partido.resultado_2),
			$("<div>").addClass("divBandera").append(
				$("<img>").attr("src","../img/banderas/"+partido.abreviatura_2+".webp")
			),
			$("<div>").addClass("divAbreviatura").text(partido.abreviatura_2),
			$("<div>").addClass("divNombre").text(partido.nombre_2),
			$("<div>").addClass("divApuesta").text(partido.apuesta_2),
		)
	}
}

function validarNulos(partido){
	if(partido.resultado_1 == undefined || partido.resultado_1 == null || partido.resultado_1 == ""){
		partido.resultado_1 = "-";
	}
	if(partido.resultado_2 == undefined || partido.resultado_2 == null || partido.resultado_2 == ""){
		partido.resultado_2 = "-";
	}
	if(partido.apuesta_1 == undefined || partido.apuesta_1 == null || partido.apuesta_1 == ""){
		partido.apuesta_1 = "-";
	}
	if(partido.apuesta_2 == undefined || partido.apuesta_2 == null || partido.apuesta_2 == ""){
		partido.apuesta_2 = "-";
	}
	return partido;
}

function nombrarClasificatoria(grupo){
	switch(grupo){
		case "2":
			return "Octavos de final";
		case "3":
			return "Cuartos de final";
		case "4":
			return "Semifinales";
		case "5":
			return "Partido por el tercer puesto";
		case "6":
			return "Final";
	}
}