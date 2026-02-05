"use strict";

var token = $('#token-value').val();
var list = $('#invoice-list').val();
var DatatableRemoteAjaxDemo = function () {

    var lsitDataInTable = function () {
        var t;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        t = $('#client_list').DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "lengthMenu": [10, 25, 50],
            "responsive": true,
            "pagingType": "simple",
            "order": [[0, "desc"]],
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
            "ajax": {
                "url": list,
                "dataType": "json",
                "type": "POST",
                "data": {_token: token}
            },
            "columns": [
                {"data": "id"},
                {"data": "invoice_no"},
                {"data": "name"},
                {"data": "total_amount"},
                {"data": "paid_amount"},
                {"data": "due_amount"},
                {"data": "status"},
                {"data": "options"},
            ],
            //Set column definition initialisation properties.
            "columnDefs": [
                {
                    "targets": [-1], //last column
                    "orderable": false, //set not orderable
                },
                {
                    "targets": [-2], //last column
                    "orderable": false, //set not orderable
                },

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
