@extends('admin.layout.app')
@section('title','Case Type')
@section('content')
    <div class="">
        @component('component.modal_heading',
             [
             'page_title' => __('frontend.case_type_management'),
             'action'=>route("case-type.create"),
             'model_title'=> __('frontend.add_case_type'),
             'modal_id'=>'#addtag',
             'permission' => $adminHasPermition->can(['case_type_add'])
             ] )
            {{__('frontend.status')}}
        @endcomponent

        <style>
            .x_panel {border-radius: 6px;}
            .x_content {padding: 18px;}
            .page-title h3 {color:#2c3e50}
            .btn-add-client{background:#fff;border-radius:6px;padding:8px 14px;border:1px solid #e6e6e6;color:#2c3e50}
            #tagDataTable thead tr{background:#2c3e50}
            #tagDataTable thead th{color:#fff}
            .dataTables_wrapper .dataTables_paginate ul.pagination > li{display:none !important}
            #tagDataTable_previous, #tagDataTable_next{display:inline-block !important}
            .x_panel .table tbody tr td{vertical-align:middle}
        </style>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <table id="tagDataTable" class="table" data-url="{{ route('cash.type.list') }}"
                               >
                            <thead>
                            <tr>
                                <th width="5%">{{__('frontend.no')}}</th>
                                <th>{{__('frontend.case_type')}}</th>
                                <th>{{__('frontend.case_sub_type')}}</th>
                                <th width="5%" data-orderable="false">{{__('frontend.status')}}</th>
                                <th width="2%" data-orderable="false" class="text-center">{{__('frontend.action')}}</th>
                            </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="load-modal"></div>
@endsection

@push('js')
    <script src="{{asset('assets/js/settings/case-type-datatable.js')}}"></script>

@endpush
