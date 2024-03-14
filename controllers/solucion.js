var totalPistas = 0;
$.ajax({
	method: "POST",
	url: "../models/getInfoFlag.php",
	data: {
		idFlag: idFlag,
	},
	success: function(result){
		if(!result.error){ 
			totalPistas = parseInt(result.flag.num_pistas);
			setInfoFlag(result.flag);
			setInfoPistas(result.pistas);
		}else{
			window.location.assign("soluciones.php");
		}
	},error(xhr,status,error){
		console.error(error);
	},
	dataType: "json"
});

function setInfoFlag(flag){
	$("#title").text("Flag " + flag.id);
	$("#pInstruciones").text(flag.instrucciones);
}

function setInfoPistas(pistas){
	if(pistas.length == 0){
		$("#divListaPistas").append(
			$("<p>").addClass("pNoHayPistas").text("Todavía no hay ninguna pista")
		);
	}else{
		$("#divListaPistas").empty();

		for(let pista of pistas){
			$("#divListaPistas").append(
				$("<div>").addClass("divPista").append(
					$("<h3>").text("Pista " + pista.num_pista + ":"),
					$("<p>").text(pista.pista)
				)
			);
		}
	}

	if(pistas.length == totalPistas){
		$("#buttonNuevaPista").remove();
	}
}

$("#buttonCheckFlag").click(() => {
	var inputFlag = $("#inputFlag").val();
	if(inputFlag != "" && inputFlag != null && inputFlag == undefined){
		$.ajax({
			method: "POST",
			url: "../models/checkFlag.php",
			data: {
				idFlag: idFlag,
				flag: inputFlag
			},
			success: function(result){
				console.log(result);
				if(result.flagCorrecto) {
					//FLAG CORRECTO
				} else{
					$("#pFlagIncorrecto").show();
				}
			},error(xhr,status,error){
				console.error(error)
			},
			dataType: "json"
		});
	} else{
		$("#pFlagIncorrecto").show();
	}
});

$("#buttonNuevaPista").click(() => {
	$.ajax({
		method: "POST",
		url: "../models/getNuevaPista.php",
		data: {
			idFlag: idFlag
		},
		success: function(result){
			if(result.nuevaPista){
				setInfoPistas(result.pistas);
			}else{
				window.location.assign("soluciones.php");
			}
		},error(xhr,status,error){
			console.error(error)
		},
		dataType: "json"
	});
});