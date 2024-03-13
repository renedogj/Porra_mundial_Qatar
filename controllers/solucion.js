// $.ajax({
// 	method: "GET",
// 	url: "../models/flags.json",
// 	success: function(result){
// 		console.log(result);

// 		// setDificultades(result);

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

$.getJSON("../models/flags.json", (result) => {
	$.each(result, function(i, flag){
		if(i == idFlag){
			setInfoFlag(flag);
		}
	});
});

function setInfoFlag(flag){
	console.log(flag);
	$("#pInstruciones").text(flag.instrucciones);
}

function checkAnswer() {
	// var answer = document.getElementById("answer").value;
	// if (answer === "correct answer") {
	// 	showNextClue();
	// }
}

$("#buttonCheckFlag").click(() => {
	$.ajax({
		method: "POST",
		url: "../models/checkFlag.php",
		data: {
			idFlag: idFlag,
			flag: $("#inputFlag").val()
		},
		success: function(result){
			console.log(result);
		},error(xhr,status,error){
			console.error(error)
		},
		dataType: "json"
	});
})

function showNextClue() {
	// Get the list of clues
	var clues = document.getElementById("clues").getElementsByTagName("li");

	// Hide all of the clues
	for (var i = 0; i < clues.length; i++) {
		clues[i].style.display = "none";
	}

		// Show the next clue
	if (currentClue < clues.length) {
		clues[currentClue].style.display = "block";
		currentClue++;
	}
}

// Set the initial clue to be displayed
var currentClue = 0;
// showNextClue();