@extends('admin.layout.app')
@section('title', 'Task')
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

#clientDataTable {
    margin: 0 !important;
}

#clientDataTable thead tr {
    background: #2c3e50;
}

#clientDataTable thead th {
    color: white !important;
    font-weight: 600;
    padding: 18px 15px !important;
    border: none !important;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

#clientDataTable tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: all 0.2s ease;
}

#clientDataTable tbody tr:hover {
    background: #f8f9fa;
    transform: scale(1.01);
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

#clientDataTable tbody td {
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

.dataTables_wrapper .dataTables_paginate ul.pagination > li#clientDataTable_previous,
.dataTables_wrapper .dataTables_paginate ul.pagination > li#clientDataTable_next {
    display: inline-block !important;
}
</style>

    <div class="">
        @component('component.heading', [
            'page_title' => __('frontend.task.task_management'),
            'action' => route('tasks.create'),
            'text' => __('frontend.task.add_task'),
            'permission' => $adminHasPermition->can(['task_add']),
        ])
        @endcomponent

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <table id="clientDataTable" class="table" data-url="{{ route('task.list') }}">
                            <thead>
                                <tr>
                                    <th>{{ __('frontend.task.no') }}</th>
                                    <th>{{ __('frontend.task.task_name') }}</th>
                                    <th>{{ __('frontend.task.related_to') }}</th>
                                    <th>{{ __('frontend.task.start_date') }}</th>
                                    <th>{{ __('frontend.task.deadline') }}</th>
                                    <th>{{ __('frontend.task.members') }}</th>
                                    <th>{{ __('frontend.task.status') }}</th>
                                    <th>{{ __('frontend.task.priority') }}</th>
                                    <th data-orderable="false" class="text-center">{{ __('frontend.task.action') }}</th>
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
    <script src="{{ asset('assets/js/task/task-datatable.js') }}"></script>
@endpush
