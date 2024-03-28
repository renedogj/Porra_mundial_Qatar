$("#bttnRestaurarDDBB").click(() => {
	if(confirm("¿Seguro que quieres restaurar la base de datos?")){
		$.ajax({
			method: "POST",
			url: "../models/restaurarBBDD.php",
			success: function(result){
				if(result == ""){
					alert("Base de datos restaurada correctamente");
				}else{
					console.log(result);
				}
			},error(xhr,status,error){
				console.error(error)
			},
			dataType: "text"
		})
	}
});

function abrirDificultad(id) {
	window.location.assign("../dificultades/dif"+id);
}