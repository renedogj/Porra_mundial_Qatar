$(document).ready(function(){
	$("#formInicioSesion").validate({
		rules:{
			inputEmail:{
				required: true,
				email: true,
				maxlength: 40
			},
			inputPassword:{
				required: true
			}
		},
		messages : {
			inputEmail:{
				required: "Es necesario rellenar este campo",
				email: "El campo debe tener un formato de email valido"
			},
			inputPassword:{
				required: "Es necesario rellenar este campo"
			}
		}
	});

	$("#formRegistrarse").validate({
		rules:{
			inputEmail:{
				required: true,
				email: true,
				maxlength: 40
			},
			inputNombre:{
				required: true,
				minlength: 3,
				maxlength: 30
			},
			inputPassword:{
				required: true,
				minlength: 6,
				maxlength: 12,	
				
			},
			inputPassword2:{
				required: true,
				equalTo: "#inputPassword"
			}
		},
		messages : {
			inputEmail:{
				required: "Es necesario rellenar este campo",
				email: "El campo debe tener un formato de email valido"
			},
			inputNombre:{
				required: "Es necesario rellenar este campo",
				minlength: "El nombre tiene que tener un mínimo de 3 caracteres",
				maxlength: "El nombre solo puede tener un máximo de 30 caracteres"
			},
			inputPassword:{
				required: "Es necesario rellenar este campo",
				minlength: "La contraseña debe tener 6 caracteres como mínimo",
				maxlength: "La contraseña solo puede tener 12 caracteres como máximo"
			},
			inputPassword2:{
				required: "Es necesario rellenar este campo",
				equalTo: "Las contraseñas no coinciden"
			}
		}
	});
});