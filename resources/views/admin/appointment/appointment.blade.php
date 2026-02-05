@extends('admin.layout.app')
@section('title', 'Appointment')
@push('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/admin/jquery-confirm-master/css/jquery-confirm.css') }}">
@endpush
@section('content')
<style>
.client-management-header {
    background: #2c3e50;
    padding: 30px;
    border-radius: 12px;
    margin-bottom: 30px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

.client-management-header h3 {
    color: white;
    font-size: 28px;
    font-weight: 700;
    margin: 0;
}

.btn-add-client {
    background: white;
    color: #2c3e50;
    padding: 12px 30px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: 600;
    font-size: 15px;
    transition: all 0.3s;
    box-shadow: 0 4px 15px rgba(0,0,0,0.2);
    display: inline-flex;
    align-items: center;
    gap: 8px;
}

.btn-add-client:hover {
    background: #f8f9fa;
    color: #2c3e50;
    text-decoration: none;
    transform: translateY(-2px);
    box-shadow: 0 6px 20px rgba(0,0,0,0.25);
}

.x_panel {
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: none;
    overflow: hidden;
}

#Appointmentdatatable {
    margin: 0 !important;
}

#Appointmentdatatable thead tr {
    background: #2c3e50;
}

#Appointmentdatatable thead th {
    color: white !important;
    font-weight: 600;
    padding: 18px 15px !important;
    border: none !important;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

#Appointmentdatatable tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: all 0.2s ease;
}

#Appointmentdatatable tbody tr:hover {
    background: #f8f9fa;
    transform: scale(1.01);
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

#Appointmentdatatable tbody td {
    padding: 18px 15px !important;
    vertical-align: middle;
    font-size: 14px;
}

.client-name-link {
    color: #2c3e50;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.client-name-link:hover {
    color: #2c3e50;
    text-decoration: none;
}

.badge-case-count {
    background: #e3f2fd;
    color: #1976d2;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
}

.status-toggle {
    transform: scale(1.2);
}

.action-btn {
    background: #ff9800;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.2s;
    cursor: pointer;
}

.action-btn:hover {
    background: #f57c00;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(255,152,0,0.4);
}

.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter,
.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_paginate {
    padding: 20px 15px;
}

.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input {
    border-radius: 6px;
    border: 1px solid #ddd;
    padding: 8px 12px;
}

.dataTables_wrapper .dataTables_paginate {
    margin-top: 12px;
    position: relative;
    z-index: 1;
}

/* Dejar el look por defecto (como en Casos) y mostrar solo Anterior/Siguiente */
.dataTables_wrapper .dataTables_paginate ul.pagination > li {
    display: none !important;
}

.dataTables_wrapper .dataTables_paginate ul.pagination > li#Appointmentdatatable_previous,
.dataTables_wrapper .dataTables_paginate ul.pagination > li#Appointmentdatatable_next {
    display: inline-block !important;
}
</style>

    <div class="">

        @component('component.heading', [
            'page_title' => __('frontend.appointment.appointment_management'),
            'action' => route('appointment.create'),
            'text' => __('frontend.appointment.add_appointment'),
            'permission' => $adminHasPermition->can(['appointment_add']),
        ])
        @endcomponent

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="x_panel">

                    <div class="x_title">
                        <div class="row">
                            <div class="col-md-3 form-group">
                                <label for="date_from">{{ __('frontend.appointment.from_date') }} </label>
                                <input type="text" class="form-control dateTo" id="date_to" autocomplete="off"
                                readonly="">



                            </div>

                            <div class="col-md-3 form-group">
                                <label for="date_to">{{ __('frontend.appointment.to_date') }} </label>

                                <input type="text" class="form-control dateTo" id="date_to" autocomplete="off"
                                    readonly="">


                            </div>

                            <ul class="nav navbar-left panel_toolbox">

                                <br>
                                &nbsp;&nbsp;&nbsp;
                                <button class="btn btn-danger appointment-margin" type="button" id="btn_clear"
                                    name="btn_clear">{{ __('frontend.appointment.clear') }}
                                </button>
                                <button type="submit" id="search" class="btn btn-success appointment-margin"><i
                                        class="fa fa-search"></i>&nbsp;{{ __('frontend.appointment.search') }}
                                </button>
                            </ul>

                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <table id="Appointmentdatatable" class="table appointment_table"
                            data-url="{{ route('appointment.list') }}">
                            <thead>
                                <tr>
                                    <th>{{ __('frontend.appointment.no') }}</th>
                                    <th width="40%">{{ __('frontend.appointment.client_name') }}</th>
                                    <th width="10%">{{ __('frontend.appointment.mobile') }}</th>
                                    <th width="10%;">{{ __('frontend.appointment.date') }}</th>
                                    <th>{{ __('frontend.appointment.time') }}</th>
                                    <th data-orderable="false">{{ __('frontend.appointment.status') }}</th>
                                    <th data-orderable="false">{{ __('frontend.appointment.action') }}</th>
                                </tr>
                            </thead>


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <input type="hidden" name="token-value" id="token-value" value="{{ csrf_token() }}">
    <input type="hidden" name="date_format_datepiker" id="date_format_datepiker" value="{{ $date_format_datepiker }}">
    <input type="hidden" name="common_change_state" id="common_change_state" value="{{ url('common_change_state') }}">

@endsection

@push('js')
    <script type="text/javascript" src="{{ asset('assets/admin/jquery-confirm-master/js/jquery-confirm.js') }}"></script>
    <script src="{{ asset('assets/js/appointment/appointment-datatable.js') }}"></script>
@endpush
