$(document).ready(function() {
    if ($('#example').length > 0) {
        $('#example').DataTable( {
            "language": {
                "lengthMenu":       "Mostrar _MENU_ entradas",
                "zeroRecords":      "No se encontro registros",
                "search":           "Buscar",
                "paginate": {
                    "first":        "Primera",
                    "last":         "Ultima",
                    "next":         "Siguiente",
                    "previous":     "Anterior"
                },
                "info":             "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoFiltered":     "(filtrado de _MAX_ registros totales)",
                "infoEmpty":        "Mostrando 0 a 0 de 0 entradas"
            },
        } );
    }
});

function markerNotificationAsRead(notification,link) {
    event.preventDefault();
    $.get('/notifications/'+notification+'/markerAsRead');
    setTimeout( function() {
        window.location.href= '/'+link;
    special }, 500);
}