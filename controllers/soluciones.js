$.ajax({
	method: "GET",
	url: "../models/getIndexFlags.php",
	success: function(result){
		setDificultades(result);
	},
	error(xhr,status,error){
		console.error(error)
	},
	dataType: "json"
});

function setDificultades(dificultades) {
	for(let id in dificultades){
		$("#contenedorDificultades").append(
			getButtonDificultades(id),
			getContent(id, dificultades[id])
		);
	}
}

function getButtonDificultades(id) {
	return $("<button>").attr("id","dificultad"+id)
		.addClass("buttonDificultad")
		.text("Dificultad " + id)
		.click(() => {
			$("#content"+id).toggle();
			$("#dificultad"+id).toggleClass("active");
		})
}

function getContent(idDificultad, flags) {
	var divContent = $("<div>").attr("id","content"+idDificultad).addClass("content");
	for(let flag of flags){
		divContent.append(getButtonFlag(flag));
	}

	return divContent;
}

function getButtonFlag(flag) {
	return $("<button>").attr("id","flag"+flag.id)
		.addClass("buttonFlag")
		.text("Solución flag "+flag.id)
		.click(() => {
			window.location.assign("solucion.php?idFlag="+flag.id);
		})
}