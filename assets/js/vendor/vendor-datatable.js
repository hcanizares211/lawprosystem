"use strict";

var token = $('#token-value').val();
var DatatableRemoteAjaxDemo = function () {

    var lsitDataInTable = function () {
        var t;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        t = $('#Vendordatatable').DataTable({
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
            // "scrollY":        "500px",
            // "iDisplayLength": 2,
            "ajax": {
                "url": $('#Vendordatatable').attr('data-url'),
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    return $.extend({}, d, {});
                }
            },
            "order": [
                [0, "desc"]
            ],
            "columns": [{
                "data": "id"
            },

                {
                    "data": "first_name"
                },
                {
                    "data": "mobile"
                },
                {
                    "data": "is_active"
                },
                {
                    "data": "action"
                }
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
