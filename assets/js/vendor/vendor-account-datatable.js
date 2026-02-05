"use strict";

var token = $('#token-value').val();
var DatatableRemoteAjaxDemo = function () {

    var lsitDataInTable = function () {
        var table;

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        table = $('#VendorAccountDatatable').DataTable({
            "processing": true,
            "serverSide": true,
            "order": [[0, "desc"]],
            "pagingType": "simple",
            "oLanguage": {sProcessing: "<div class='loader-container'><div id='loader'></div></div>"},
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Siguiente"
                },
                "zeroRecords": "No hay registros",
                "infoEmpty": "Sin registros",
                "infoFiltered": "(filtrado de _MAX_ registros)"
            },
            "ajax": {
                "url": $('#VendorAccountDatatable').attr('data-url'),
                "dataType": "json",
                "type": "POST",
                "data": {_token: token, advocate_client_id: $('#VendorAccountDatatable').attr('data-vendor')}
            },
            "columns": [
                {"data": "id"},
                {"data": "invoice_no"},
                {"data": "vandor"},
                {"data": "amount"},
                {"data": "paidAmount"},
                {"data": "dueAmount"},
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
