function aplicar_filtro() {
	//Oculta tr clase item-detail si hay
	var details = $('.item-detail');
	details.each(function () {
		if (!$(this).hasClass('d-none')) {
			$(this).addClass('d-none');
		}
	});
	//Fitra tr clase item-row segun entrada
	var $rows = $('.item-row');
	var val = $.trim($('#ipt_filtrar').val()).replace(/ +/g, ' ').toLowerCase();
	$rows.show().filter(function () {
		var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
		return !~text.indexOf(val);
	}).hide();
}

function quitar_filtro() {
	$('#ipt_filtrar').val('');
	var $rows = $('.item-row');
	$rows.show();
}

function toggleSubClassOfClass(targetClass, groupClass) {
	//muestra u ocutal la clase objetivo y oculta el grupo al que pertenece	
	var target = $('.' + targetClass);
	var others = $('.' + groupClass).not('.' + targetClass);
	others.each(function () {
		if (!$(this).hasClass('d-none')) {
			$(this).addClass('d-none');
		}
	});
	target.toggleClass('d-none');
}

function getTransaccion(id) {
	axios.get('/api/transacciones/' + id)
		.then(function (response) {			
			var modal = $('#transaccionDetalleModal');			
			var body = $('#transaccionDetalleModalBody');
			body.empty();			
			body.append('<h5>Transacción</h5><ul>');
			excluidos = ['deleted_at','created_at','updated_at', 'conciliada_at', 'importacion_id', 'conciliacion_id', 'importacion'];
			$.each(response.data, function (key, value) {
				if(jQuery.inArray(key, excluidos) == -1){				
					body.append('<li><b>' + key + ':</b> ' + value + '</li>');
				}
			});			
			body.append('</ul><br><h5>Importación</h5><ul>');			
			body.append('<li><b>archivo:</b> ' + response.data.importacion.archivo_id + ' <a target="_blank" href="archivos/download/' + response.data.importacion.archivo_id + '">Descargar</a></li>');
			body.append('<li><b>linea:</b> ' + response.data.importacion.linea + '</li>');
			body.append('<li><b>raw:</b></li><br><textarea class="form-control form-control-sm" rows="4">' + response.data.importacion.data + '</textarea>');
			body.append('<ul>');
			modal.modal('show');			
		});
}

function modalAgregarArtefato(ambiente_id){
	$('#agregarArtefactoAmbienteId').val(ambiente_id);
	$('#modalAgregarArtefacto').modal('show');
}