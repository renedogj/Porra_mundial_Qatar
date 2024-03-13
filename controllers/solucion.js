$.ajax({
	method: "POST",
	url: "../models/getInfoFlag.php",
	data: {
		"idFlag": idFlag,
	},
	success: function(result){
		console.log(result);
		if(!result.error){
			setInfoFlag(result.flag);
		}else{
			window.location.assign("soluciones.php");
		}
	},error(xhr,status,error){
		console.error(error);
	},
	dataType: "json"
});

function setInfoFlag(flag){
	console.log(flag);
	$("#pInstruciones").text(flag.instrucciones);
	$("#title").text("Flag " + flag.id);
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