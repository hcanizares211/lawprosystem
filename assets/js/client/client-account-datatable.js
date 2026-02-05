"use strict";

var token = $('#token-value').val();
var advo_client_id = $('#advo_client_id').val();
// alert(token);
var DatatableRemoteAjaxDemo = function () {

    var lsitDataInTable = function () {
        var t;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        t = $('#clientAccountlistDatatable').DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "lengthMenu": [10, 25, 50],
            "responsive": true,
            "pagingType": "simple",
            "language": {
                "processing": "<div class='loader-container'><div id='loader'></div></div>",
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "infoEmpty": "Sin registros",
                "infoFiltered": "(filtrado de _MAX_ registros)",
                "zeroRecords": "No hay registros",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                }
            },
            "width": 200,
            // "iDisplayLength": 2,
            "ajax": {
                "url": $('#clientAccountlistDatatable').attr('data-url'),
                "dataType": "json",
                "type": "POST",
                "data": {
                    _token: token,
                    advocate_client_id: advo_client_id
                }

            },
            "order": [
                [0, "desc"]
            ],
            "columns": [{
                "data": "id"
            },
                {"data": "invoice_no"},
                {"data": "name"},
                {"data": "total_amount"},
                {"data": "paid_amount"},
                {"data": "due_amount"},
                {"data": "status"},
                {"data": "options"},
            ]
        });

    }

    //== Public Functions
    return {
        // public functions
        init: function () {
            lsitDataInTable();
        }
    };
}();
jQuery(document).ready(function () {
    DatatableRemoteAjaxDemo.init()
});
