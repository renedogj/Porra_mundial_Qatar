var grupos = ["A","B","C","D","E","F","G","H"];
var partidosGrupos = [];
var partidos = [];
$.ajax({
	method: "POST",
	url: "../models/obtenerPartidosApuestas.php",
	success: function(result){
		console.log(result);
		partidos = result

		for (grupo of grupos){
			partidosGrupos[grupo] = partidos.filter(comprobarGrupo,grupo);
		}
		mostrarPartidosPorGrupos(partidosGrupos);
		mostrarPartidosPorFecha(partidos);
		$("#divPartidosPorFecha").css("display","none");
	},
	error(xhr,status,error){
		console.log(error)
	},
	dataType: "json"
});

function comprobarGrupo(partido, index, partidos){
	if(partido.faseGrupos == 1){
		if(partido.grupo_1 == partido.grupo_2){
			return partido.grupo_1 == this
		}
		return false;
	}
	return false;
}

$("#selectDisplay").change(() => {
	if($("#selectDisplay").val() == "grupo"){
		$("#divPartidosPorGrupos").css("display","block");
		$("#divPartidosPorFecha").css("display","none");
	}else if($("#selectDisplay").val() == "fecha"){
		$("#divPartidosPorGrupos").css("display","none");
		$("#divPartidosPorFecha").css("display","block");
	}
});