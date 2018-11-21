function confirmar(url, msj) {
	alertify.confirm('CONFIRMAR', msj, function() {
		window.location.href = url;
	}, function() {
		alertify.error('Cancelado')
	});
}

function alerta(msj, ok) {
	alertify.alert('Alerta', msj, function() {
		alertify.success(ok);
	});
}

function prompt() {
	alertify.prompt('Prompt Title', 'Prompt Message', 'Prompt Value', function(evt, value) {
		alertify.success('You entered: ' + value)
	}, function() {
		alertify.error('Cancel')
	});
}
