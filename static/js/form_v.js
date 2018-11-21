$(document).ready(function() {

	// $.validator.setDefaults({
	// 	submitHandler: function() {
	// 		$("form").submit();
	// 	}
	// });

	$("#forms_usuario_agregar").validate({
		rules: {
			nombre: "required",
			apellido_p: "required",
			apellido_m: "required",
			username: {
				required: true,
				minlength: 6
			},
			passwords: {
				required: true,
				minlength: 8
			},
			nivel: {
				required: true
			}
			// confirm_password: {
			// 	required: true,
			// 	minlength: 5,
			// 	equalTo: "#password"
			// },
		},
		messages: {
			nombre: "SE REQUIRE NOMBRE",
			apellido_p: "SE REQUIRE APELLIDO PATERNO",
			apellido_m: "SE REQUIRE APELLIDO MATERNO",
			username: {
				required: "SE REQUIRE NOMBRE DE USUARIO",
				minlength: "MINIMO 6 CARACTERES"
			},
			passwords: {
				required: "SE REQUIRE UNA CONTRASEÑA",
				minlength: "MINIMO 8 CARACTERES"
			},
			nivel: {
				required: "SE REQUIRE UNA NIVEL DE USUARIO"
			},
		},
		errorElement: "em",
		errorPlacement: function(error, element) {
			// Add the `help-block` class to the error element
			error.addClass("help-block");
			if (element.prop("type") === "checkbox") {
				error.insertAfter(element.parent("label"));
			} else {
				error.insertAfter(element);
			}
		},

		highlight: function(element, errorClass, validClass) {
			$(element).parents(".validate").addClass("has-error").removeClass("has-success");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).parents(".validate").addClass("has-success").removeClass("has-error");
		}
	});

});
