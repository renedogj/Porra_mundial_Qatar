// $.ajax({
// 	method: "GET",
// 	url: "../models/flags.json",
// 	success: function(result){
// 		console.log(result);

// 		setDificultades(result);

// 		// if(!result.error){
// 		// 	location.reload();
// 		// 	window.location.assign("./controllers/selecionarDificultad.php");
// 		// }else{

// 		// }
// 	},
// 	error(xhr,status,error){
// 		console.error(error)
// 	},
// 	dataType: "json"
// });

$.ajax({
	method: "GET",
	url: "../models/getIndexFlags.php",
	success: function(result){
		console.log(result);
		// document.write(result);
		setDificultades(result);
	},
	error(xhr,status,error){
		console.error(error)
	},
	dataType: "json"
});

function setDificultades(dificultades) {
	// console.log(dificultades)
	for(let id in dificultades){
		console.log(id)
		// let idAux = id++;
		// id++;
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
	// console.log(flags)
	var divContent = $("<div>").attr("id","content"+idDificultad).addClass("content");
	for(let flag of flags){
		divContent.append(getButtonFlag(flag));
	}

	return divContent;
}

function getButtonFlag(flag) {
	// console.log(flag)
	return $("<button>").attr("id","flag"+flag.id)
		.addClass("buttonFlag")
		.text("Solución flag "+flag.id)
		.click(() => {
			window.location.assign("solucion.php?idFlag="+flag.id);

			// console.log(idDificultad + " " + idFlag)
			// $("#content"+id).toggle();
		})
}