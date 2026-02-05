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
                { "data": "court_name" },
                { "data": "court_type" },
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


function nextDateAdd(case_id) {
    // ajax get modal
    $.ajax({
        url: get_case_next_modal + "/" + case_id,
        success: function (data) {
            $('#show_modal_next_date').html(data);
            $('#modal-next-date').modal('show'); // show bootstrap modal
            $('.modal-title').text(translations['add_next_date']); // Set Title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (typeof toastr !== 'undefined') { toastr.error('Error al agregar/actualizar datos', 'Error'); } else { alert('Error al agregar/actualizar datos'); }
        }
    });
}

function change_case_important(case_id) {
    // ajax get modal
    $.ajax({
        url: get_case_important_modal + '/' + case_id,
        success: function (data) {
            $('#show_modal').html(data);
            $('#modal-case-priority').modal('show'); // show bootstrap modal
            $('.modal-title').text('Change Case Important'); // Set Title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (typeof toastr !== 'undefined') { toastr.error('Error al agregar/actualizar datos', 'Error'); } else { alert('Error al agregar/actualizar datos'); }
        }
    });
}

function transfer_case(case_id) {

    // ajax get modal
    $.ajax({
        url: get_case_cort_modal + "/" + case_id,
        success: function (data) {
            $('#show_modal_transfer').html(data);
            $('#modal-change-court').modal('show'); // show bootstrap modal
            $('.modal-title').text(translations['case_transfer']); // Set Title to Bootstrap modal title
        },
        error: function (jqXHR, textStatus, errorThrown) {
            if (typeof toastr !== 'undefined') { toastr.error('Error al agregar/actualizar datos', 'Error'); } else { alert('Error al agregar/actualizar datos'); }
        }
    });
}
