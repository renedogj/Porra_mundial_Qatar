$.ajax({
	method: "GET",
	url: "../models/flags.json",
	success: function(result){
		console.log(result);

		setDificultades(result);

		// console.log(result[0]);
		// if(!result.error){
			// location.reload();
			// window.location.assign("./controllers/selecionarDificultad.php");
		// }else{

		// }
	},
	error(xhr,status,error){
		console.error(error)
	},
	dataType: "json"
});

function setDificultades(dificultades) {
	for(idDificultad in dificultades){
		let idAux = idDificultad++;
		// id++;
		$("#contenedorDificultades").append(
			getButtonDificultades(idDificultad),
			getContent(idDificultad, dificultades[idAux])
		);
	}
}

function getButtonDificultades(id) {
	return $("<button>").attr("id","dificultad"+id)
		.addClass("collapsible")
		.text("Dificultad " + id)
		.click(() => {
			$("#content"+id).toggle();
		})
}

function getContent(idDificultad, flags) {
	console.log(flags)
	var divContent = $("<div>").attr("id","content"+idDificultad).addClass("content");
	for(let idFlag in flags){
		divContent.append(getButtonFlag(idDificultad, idFlag))
	}

	return divContent;
}

function getButtonFlag(idDificultad, idFlag) {
	return $("<button>").attr("id","flag"+idDificultad + idFlag)
		.addClass("collapsible")
		.text("Flag"+idDificultad + idFlag)
		.click(() => {
			window.location.assign("solucion.php?idFlag="+idFlag);

			// console.log(idDificultad + " " + idFlag)
			// $("#content"+id).toggle();
		})
}