@extends('admin.layout.app')
@section('title','Expense')
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

    #ExpenseDatatable {
        margin: 0 !important;
    }

    #ExpenseDatatable thead tr {
        background: #2c3e50;
    }

    #ExpenseDatatable thead th {
        color: white !important;
        font-weight: 600;
        padding: 18px 15px !important;
        border: none !important;
        font-size: 14px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    #ExpenseDatatable tbody tr {
        border-bottom: 1px solid #ecf0f1;
        transition: all 0.2s ease;
    }

    #ExpenseDatatable tbody tr:hover {
        background: #f8f9fa;
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    #ExpenseDatatable tbody td {
        padding: 18px 15px !important;
        vertical-align: middle;
        font-size: 14px;
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

    /* Mostrar solo Anterior/Siguiente */
    .dataTables_wrapper .dataTables_paginate ul.pagination > li {
        display: none !important;
    }

    .dataTables_wrapper .dataTables_paginate ul.pagination > li#ExpenseDatatable_previous,
    .dataTables_wrapper .dataTables_paginate ul.pagination > li#ExpenseDatatable_next {
        display: inline-block !important;
    }
    </style>

    <div class="page-title">
        <div class="title_left">
            <h3>{{__('frontend.manage_expense')}}</h3>
        </div>

        <div class="title_right">
            <div class="form-group pull-right top_search">

                @if($adminHasPermition->can(['expense_add']))
                    <a href="{{ url('admin/expense-create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> {{__('frontend.add_expense')}}</a>
                @endif


            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">

                    <table id="ExpenseDatatable" class="table" >
                        <thead>
                        <tr>

                            <th width="3%;">{{__('frontend.no')}}</th>
                            <th width="15%">{{__('frontend.invoice_no')}}</th>
                            <th width="30%">{{__('frontend.vendor1')}}</th>
                            <th width="10%">{{__('frontend.total')}}</th>
                            <th width="10%">{{__('frontend.paid')}}</th>
                            <th width="15%">{{__('frontend.due')}}</th>
                            <th width="5%">{{__('frontend.status')}}</th>
                            <th width="5%;">{{__('frontend.action')}}</th>

                        </tr>
                        </thead>


                    </table>
                </div>
            </div>
        </div>

    </div>
    <div id="load-modal"></div>

    <input type="hidden" name="token-value"
           id="token-value"
           value="{{csrf_token()}}">

    <input type="hidden" name="expense-list"
           id="expense-list"
           value="{{ url('admin/expense-list') }}">

@endsection

@push('js')
    <script src="{{asset('assets/js/expense/expense-datatable.js')}}"></script>
@endpush

