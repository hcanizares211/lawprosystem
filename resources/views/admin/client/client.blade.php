@extends('admin.layout.app')
@section('title','Client')
@section('content')

<style scoped>
/* Page Container */
.client-page-wrapper {
    background: #f8f9fa;
    min-height: 100vh;
    padding: 20px;
}

/* Panel Styles */
.x_panel {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: none;
    overflow: visible !important;
    margin-bottom: 20px;
}

.x_title {
    border-bottom: 2px solid #f0f0f0;
    padding: 20px 25px;
    margin-bottom: 0;
}

.x_title h2 {
    color: #2c3e50;
    font-size: 22px;
    font-weight: 600;
    margin: 0;
}

.x_content {
    padding: 25px;
    overflow: visible !important;
}

/* Table Wrapper */
.table-wrapper {
    background: white;
    border-radius: 8px;
    overflow: visible !important;
}

/* DataTables Overflow Fixes */
.dataTables_wrapper,
.dataTables_scroll,
.dataTables_scrollBody {
    overflow: visible !important;
}

#clientDataTable {
    width: 100% !important;
    margin: 0 !important;
    border-collapse: separate;
    border-spacing: 0;
}

#clientDataTable_wrapper {
    overflow: visible !important;
}

/* Table Header */
#clientDataTable thead tr {
    background: #2c3e50;
    border-radius: 8px 8px 0 0;
}

#clientDataTable thead th {
    color: white !important;
    font-weight: 600;
    padding: 18px 15px !important;
    border: none !important;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    white-space: nowrap;
}

#clientDataTable thead th:first-child {
    border-radius: 8px 0 0 0;
}

#clientDataTable thead th:last-child {
    border-radius: 0 8px 0 0;
}

/* Table Body */
#clientDataTable tbody td:last-child {
    position: static;
    overflow: visible !important;
}

#clientDataTable tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: all 0.2s ease;
    position: relative;
}

#clientDataTable tbody tr:hover {
    background: #f8fffe;
    transform: translateY(-1px);
    box-shadow: 0 2px 8px rgba(44,62,80,0.06);
}

#clientDataTable tbody td {
    padding: 16px 15px !important;
    vertical-align: middle;
    font-size: 14px;
    color: #2c3e50;
}

/* Client Name Link */
.client-name-link {
    color: #2c3e50;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.client-name-link:hover {
    color: #243241;
    text-decoration: none;
}

/* Badge Styles */
.badge-case-count {
    background: #f0f4f7;
    color: #2c3e50;
    padding: 6px 14px;
    border-radius: 20px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
    border: 1px solid #d0d9df;
}

/* Status Toggle */
.status-toggle {
    transform: scale(1.3);
    cursor: pointer;
}

/* Action Buttons */
.action-btn {
    background: #2c3e50;
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 6px;
    font-size: 13px;
    font-weight: 600;
    transition: all 0.3s;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(44,62,80,0.15);
}

.action-btn:hover {
    background: #243241;
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(44,62,80,0.2);
}

/* DataTables Controls */
.dataTables_wrapper .dataTables_length,
.dataTables_wrapper .dataTables_filter {
    padding: 20px 15px 10px;
}

.dataTables_wrapper .dataTables_info,
.dataTables_wrapper .dataTables_paginate {
    padding: 15px;
}

.dataTables_wrapper .dataTables_length select,
.dataTables_wrapper .dataTables_filter input {
    border-radius: 6px;
    border: 1px solid #ddd;
    padding: 8px 12px;
    transition: all 0.3s;
}

.dataTables_wrapper .dataTables_filter input:focus {
    outline: none;
    border-color: #2c3e50;
    box-shadow: 0 0 0 3px rgba(44,62,80,0.06);
}

.dataTables_wrapper .dataTables_length label,
.dataTables_wrapper .dataTables_filter label {
    font-weight: 500;
    color: #2c3e50;
}

/* Pagination */
.dataTables_wrapper .dataTables_paginate {
    margin-top: 12px;
    position: relative;
    z-index: 1;
}

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
    background: #2c3e50;
    border: 1px solid #2c3e50;
    color: white !important;
    font-weight: 500;
    transition: all 0.3s;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.previous:hover a,
.dataTables_wrapper .dataTables_paginate .paginate_button.next:hover a {
    background: #243241;
    border-color: #243241;
    color: white !important;
}

.dataTables_wrapper .dataTables_paginate .paginate_button.disabled a,
.dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover a {
    background: #e0e0e0;
    border-color: #e0e0e0;
    color: #9e9e9e !important;
    cursor: not-allowed;
    opacity: 0.6;
}

/* Action Dropdown */
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

.panel_toolbox .dropdown-menu > li > a i {
    width: 16px;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 768px) {
    .x_content {
        padding: 15px;
    }
    
    #clientDataTable thead th {
        padding: 12px 8px !important;
        font-size: 11px;
    }
    
    #clientDataTable tbody td {
        padding: 12px 8px !important;
        font-size: 13px;
    }
    
    .dataTables_wrapper .dataTables_length,
    .dataTables_wrapper .dataTables_filter,
    .dataTables_wrapper .dataTables_info,
    .dataTables_wrapper .dataTables_paginate {
        padding: 10px;
    }
}
</style>

    <div class="">
        
        @component('component.heading', [
    'page_title' => __('frontend.client.page_title'),
    'action' => route('clients.create'),
    'text' => __('frontend.client.add_client'),
    'permission' => $adminHasPermition->can(['client_add'])
])

        @endcomponent

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content" style="padding: 0; overflow: visible !important;">
                        <table id="clientDataTable" class="table" data-url="{{ route('clients.list') }}">
                            <thead>
                            <tr>
                                <th width="5%">{{__('frontend.client.no')}}</th>
                                <th>{{__('frontend.client.client_name')}}</th>
                                <th width="5%">{{__('frontend.client.mobile')}}</th>
                                <th width="5%" data-orderable="false">{{__('frontend.client.case')}}</th>
                                <th width="5%" data-orderable="false">{{__('frontend.client.status')}}</th>
                                <th width="5%" data-orderable="false" class="text-center">{{__('frontend.client.action')}}</th>
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

{{-- var dataTableLang = @json(__('datatable')); --}}


    <script src="{{asset('assets/js/client/client-datatable.js')}}"></script>
@endpush
