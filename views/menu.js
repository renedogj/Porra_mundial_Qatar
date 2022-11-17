var archivo = window.location.pathname.split("/");
if(archivo[3] == undefined || archivo[3] == ""){
	var index = "";
	var controllers = "controllers/";
}else if(archivo[2] == "controllers"){
	var index = "../";
	var controllers = "";
}

$("#menu").append(
	$("<div>").addClass("div-menu-item").append(
		$("<a>")
			.attr("href",index).text("Inicio")
		),
	$("<div>").addClass("div-menu-item").append(
		$("<a>")
			.attr("href",controllers+"partidos.php")
			.text("Partidos")
		),
	$("<div>").addClass("div-menu-item").append(
		$("<a>")
			.attr("href",controllers+"clasificaciones.php")
			.text("Clasificacion")
		)
	);