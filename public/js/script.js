$('#modificar').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Botón que activó el modal
    var id = button.data('id'); // Extraer el valor del atributo data-id
    var titol = button.data('titol'); // Extraer el valor del atributo data-titol
    var text = button.data('text'); // Extraer el valor del atributo data-text

    // Actualizar los campos de entrada en el modal
    var modal = $(this);
    modal.find('.modal-body #id').val(id);
    modal.find('.modal-body #titol').val(titol);
    modal.find('.modal-body #text').val(text);
});