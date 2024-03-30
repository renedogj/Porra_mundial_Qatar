$("#formRegistrarse").submit(() => {
	if($("#formRegistrarse").valid()){
		var datosRegistrarse = {};

		datosRegistrarse["nombre"] = $("#inputNombre").val();
		datosRegistrarse["password"] = $("#inputPassword").val();

		$.ajax({
			method: "POST",
			url: "../models/registrarse.php",
			data: datosRegistrarse,
			success: function(result){
				if(!result.error){
					window.location.assign("../")
				}else{
					console.log(result);
					if(result.errorInfo.errorCode == 23000 && result.errorInfo.code == 1062){
						if(result.errorInfo.key == "UK_nombre"){
							$("#inputNombre-error").text("Ya existe una cuenta con ese nombre de usuario");
							$("#inputNombre-error").show();
						}
					}
				}
			},
			dataType: "json"
		});
	}
	return false;
});