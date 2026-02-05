"use strict";
var t;
var DatatableRemoteAjaxDemo = function () {


    var lsitDataInTable = function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        t = $('#tagDataTable').DataTable({
            "processing": true,
            "serverSide": true,
            "stateSave": true,
            "lengthMenu": [10, 25, 50],
            "responsive": true,
            "pagingType": "simple",
            "oLanguage": {sProcessing: "<div class='loader-container'><div id='loader'></div></div>"},
            "language": {
                "search": "Buscar:",
                "lengthMenu": "Mostrar _MENU_ entradas",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ entradas",
                "paginate": {"previous": "Anterior", "next": "Siguiente"},
                "zeroRecords": "No se encontraron registros",
                "infoFiltered": "(filtrado de _MAX_ registros)"
            },
            "width":200,
            // "iDisplayLength": 2,
            "ajax": {
                "url": $('#tagDataTable').attr('data-url'),
                "dataType": "json",
                "type": "POST",
                "data": function (d) {
                    return $.extend({}, d, {});
                }
            },
            "order": [
                [0, "desc"]
            ],
            "columns": [
                { "data": "id" },
                { "data": "type" },
                { "data":"is_active"},
                { "data": "action" }
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




