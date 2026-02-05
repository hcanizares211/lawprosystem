@extends('admin.layout.app')
@section('title','Client Account')
@section('content')

<style>
.client-header {
    background: #2c3e50;
    padding: 25px 30px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 8px 24px rgba(102, 126, 234, 0.3);
}

.client-header h4 {
    color: white;
    font-size: 24px;
    font-weight: 700;
    margin: 0;
}

.x_panel {
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: none;
    overflow: hidden;
}

.nav-tabs {
    border-bottom: 2px solid #ecf0f1;
    padding: 0 20px;
    background: #f8f9fa;
}

.nav-tabs > li {
    margin-bottom: -2px;
}

.nav-tabs > li > a {
    border: none !important;
    border-radius: 0;
    padding: 18px 30px;
    font-weight: 600;
    color: #7f8c8d;
    transition: all 0.3s;
    position: relative;
    font-size: 15px;
}

.nav-tabs > li > a:hover {
    background: transparent;
    color: #2c3e50;
}

.nav-tabs > li.active > a,
.nav-tabs > li.active > a:hover,
.nav-tabs > li.active > a:focus {
    color: #2c3e50 !important;
    background: transparent !important;
    border: none !important;
}

.nav-tabs > li.active > a::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 3px;
    background: #2c3e50;
    border-radius: 3px 3px 0 0;
}

.x_content {
    padding: 30px;
}
</style>

    <div class="client-header">
        <h4><i class="fa fa-user"></i> {{ __('frontend.client.client_name') }}: {{$name}} </h4>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="{{ request()->is('admin/clients/*') ? 'active' : '' }}"><a
                                href="{{ route('clients.show', [$client->id]) }}"><i class="fa fa-id-card-o"></i> {{ __('frontend.client.client_detail') }}</a>
                        </li>

                        @if($adminHasPermition->can(['case_list']) =="1")
                            <li class="{{ request()->is('admin/client/case-list/*') ? 'active' : '' }}"
                                role="presentation"><a href="{{route('clients.case-list',[$client->id])}}"><i class="fa fa-gavel"></i> {{ __('frontend.client.cases') }}</a>
                            </li>
                        @endif


                        @if($adminHasPermition->can(['invoice_list']) =="1")
                            <li class="{{ request()->is('admin/client/account-list/*') ? 'active' : '' }}"
                                role="presentation"><a
                                    href="{{route('clients.account-list',[$client->id])}}"><i class="fa fa-credit-card"></i> {{ __('frontend.client.account') }}</a>
                            </li>
                        @endif
                    </ul>


                </div>

                <div class="x_content">

                    <table id="clientAccountlistDatatable" class="table" data-url="{{ route('invoice-list-client') }}"
                           >
                        <thead>
                        <tr>
                            <th>{{ __('frontend.client.no') }}</th>
                            <th>{{ __('frontend.client.invoice_no') }}</th>
                            <th>{{ __('frontend.client.client_name') }}</th>
                            <th data-orderable="false">{{ __('frontend.client.total') }}</th>
                            <th>{{ __('frontend.client.paid') }}</th>
                            <th data-orderable="false">{{ __('frontend.client.due') }}</th>
                            <th data-orderable="false">{{ __('frontend.client.status') }}</th>
                            <th data-orderable="false">{{ __('frontend.client.action') }}</th>
                        </tr>
                        </thead>

                    </table>
                </div>
            </div>
        </div>

    </div>
    <div id="load-modal"></div>

    <input type="hidden" name="advo_client_id"
           id="advo_client_id"
           value="{{$advo_client_id}}">

    <input type="hidden" name="token-value"
           id="token-value"
           value="{{csrf_token()}}">

@endsection
@push('js')
    <script src="{{asset('assets/js/client/client-account-datatable.js')}}"></script>
@endpush
<style>
/* Estilo para el encabezado del nombre del cliente y las pestañas */
.page-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #2c3e50;
    color: white;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.page-title h4 {
    margin: 0;
    font-size: 20px;
    font-weight: 600;
}

.nav-tabs {
    border-bottom: 2px solid #ddd;
}

.nav-tabs > li > a {
    color: #2c3e50;
    font-weight: 600;
    text-transform: uppercase;
    padding: 10px 15px;
    transition: all 0.3s;
}

.nav-tabs > li.active > a,
.nav-tabs > li > a:hover {
    background-color: #2c3e50;
    color: white;
    border-radius: 6px;
}

/* Estilo para el encabezado de la tabla */
#clientAccountlistDatatable thead tr {
    background: #2c3e50;
}

#clientAccountlistDatatable thead th {
    color: white !important;
    font-weight: 600;
    padding: 15px 10px !important;
    border: none !important;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* Estilo para las filas de la tabla */
#clientAccountlistDatatable tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: all 0.2s ease;
}

#clientAccountlistDatatable tbody tr:hover {
    background: #f8f9fa;
    transform: scale(1.01);
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

#clientAccountlistDatatable tbody td {
    padding: 15px 10px !important;
    vertical-align: middle;
    font-size: 14px;
}

/* Estilo para los botones de acción */
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

/* Estilo para la paginación - mostrar solo Anterior/Siguiente */
.dataTables_wrapper .dataTables_paginate .paginate_button {
    display: none !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.previous,
.dataTables_wrapper .dataTables_paginate .paginate_button.next {
    display: inline-block !important;
    margin: 0 4px;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.previous a,
.dataTables_wrapper .dataTables_paginate .paginate_button.next a {
    border-radius: 6px;
    padding: 8px 16px;
    background: #f8f9fa;
    border: 1px solid #dee2e6;
    color: #2c3e50;
    font-weight: 500;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.previous:hover a,
.dataTables_wrapper .dataTables_paginate .paginate_button.next:hover a {
    background: #e9ecef;
    color: #2c3e50;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled a,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover a {
    background: #f8f9fa;
    color: #6c757d;
    cursor: not-allowed;
    opacity: 0.6;
}
</style>
