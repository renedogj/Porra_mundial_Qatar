function mostrarPartidosPorGrupos(partidosGrupos){
	for (grupo in partidosGrupos){
		$("#divPartidosPorGrupos").append(
			$("<div>").attr("id","divPartidosGrupo-"+grupo).addClass("divPartidosGrupo").append(
				$("<h2>").text("Grupo "+grupo),
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

function tdPartido(partido){
	/*return $("<tr>").append(
		$("<td>").addClass("tdBoton").append(
			$("<button>").addClass("boton").text("Vota").click(() => {
				window.location.assign("apuesta.php?idPartido="+partido.id);
			})
		),
		$("<td>").addClass("tdFecha").text(partido.fecha),
		$("<td>").addClass("tdNombre").text(partido.nombre_1),
		$("<td>").addClass("tdAbreviatura").text(partido.abreviatura_1),
		$("<td>").addClass("tdBandera").append(
			$("<img>").attr("src","../img/banderas/"+partido.abreviatura_1+".webp")
		),
		$("<td>").addClass("tdResultado").text(partido.resultado_1),
		$("<td>").addClass("tdResultado").text(partido.resultado_2),
		$("<td>").addClass("tdBandera").append(
			$("<img>").attr("src","../img/banderas/"+partido.abreviatura_2+".webp")
		),
		$("<td>").addClass("tdAbreviatura").text(partido.abreviatura_2),
		$("<td>").addClass("tdNombre").text(partido.nombre_2),
		$("<td>").addClass("tdApuesta1").text(partido.apuesta_1),
		$("<td>").addClass("tdApuesta2").text(partido.apuesta_2),
	)*/
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