@extends('admin.layout.app')
@section('title','Vendor')
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
    overflow: visible !important;
}

#Vendordatatable {
    margin: 0 !important;
}

#Vendordatatable thead tr {
    background: #2c3e50;
}

#Vendordatatable thead th {
    color: white !important;
    font-weight: 600;
    padding: 18px 15px !important;
    border: none !important;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

#Vendordatatable tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: all 0.2s ease;
}

#Vendordatatable tbody tr:hover {
    background: #f8f9fa;
    transform: scale(1.01);
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

#Vendordatatable tbody td {
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
    background: #2c3e50;
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
    background: #243241;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(44,62,80,0.2);
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

/* Action dropdown placement */
.panel_toolbox { 
    margin: 0 !important; 
    padding: 0 !important; 
    display: inline-block !important;
    position: relative !important;
}

.panel_toolbox > li { 
    float: none !important; 
    display: inline-block !important;
    position: static !important;
}

.panel_toolbox > li.dropdown {
    position: relative !important;
}

.panel_toolbox .dropdown-menu {
    position: absolute !important;
    right: 0 !important;
    left: auto !important;
    top: 35px !important;
    min-width: 180px;
    padding: 8px 0;
    margin: 0 !important;
    box-shadow: 0 8px 24px rgba(0,0,0,0.15) !important;
    border-radius: 8px;
    border: 1px solid #e0e0e0;
    z-index: 99999 !important;
    background: white !important;
    display: none;
}

.panel_toolbox .dropdown.open .dropdown-menu {
    display: block !important;
}

.panel_toolbox .dropdown-menu > li > a { 
    padding: 10px 16px !important; 
    display: flex !important; 
    gap: 10px;
    align-items: center;
    transition: background 0.2s;
    color: #333 !important;
    text-decoration: none !important;
}

.panel_toolbox .dropdown-menu > li > a:hover {
    background: #f0f4f7 !important;
    color: #2c3e50 !important;
}

/* Dejar el look por defecto (como en Casos) y mostrar solo Anterior/Siguiente */
.dataTables_wrapper .dataTables_paginate ul.pagination > li {
    display: none !important;
}

.dataTables_wrapper .dataTables_paginate ul.pagination > li#Vendordatatable_previous,
.dataTables_wrapper .dataTables_paginate ul.pagination > li#Vendordatatable_next {
    display: inline-block !important;
}
</style>

    <div class="">
        @component('component.heading' , [

  'page_title' => __('frontend.vendor_management'),
  'action' => route('vendor.create') ,
  'text' => __('frontend.add_vendor'),
   'permission' => $adminHasPermition->can(['vendor_add'])
   ])
        @endcomponent


        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <table id="Vendordatatable" class="table"
                               data-url="{{ route('vendor.list') }}">
                            <thead>
                            <tr>
                                <th>{{__('frontend.no')}}</th>
                                <th width="40%">{{__('frontend.name')}}</th>
                                <th width="40%">{{__('frontend.mobile')}}</th>
                                <th data-orderable="false">{{__('frontend.status')}}</th>
                                <th data-orderable="false">{{__('frontend.action')}}</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/js/vendor/vendor-datatable.js')}}"></script>
@endpush
