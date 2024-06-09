$('#modificar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var id = button.data('id'); // Extraer la información de los atributos de datos

    // Actualizar el campo del formulario en el modal
    var modal = $(this);
    modal.find('.modal-body #id').val(id);
});