@extends('admin.layout.app')
@section('title','Case')


@section('content')

<style>
.page-title {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #2c3e50;
    color: white;
    padding: 20px 24px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 8px 24px rgba(44, 62, 80, 0.3);
}

.page-title h3 {
    margin: 0;
    font-size: 22px;
    font-weight: 700;
}

.x_panel {
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: none;
    overflow: visible;
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
    padding: 16px 26px;
    font-weight: 600;
    color: #7f8c8d;
    transition: all 0.3s;
    position: relative;
    font-size: 14px;
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

#case_list thead tr {
    background: #2c3e50;
}

#case_list thead th {
    color: white !important;
    font-weight: 600;
    padding: 14px 10px !important;
    border: none !important;
    font-size: 13px;
    text-transform: uppercase;
    letter-spacing: 0.4px;
}

#case_list tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: all 0.2s;
}

#case_list tbody tr:hover {
    background: #f8f9fa;
    transform: scale(1.005);
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
}

#case_list tbody td {
    padding: 14px 10px !important;
    vertical-align: middle;
    font-size: 13px;
}

.btn-primary {
    background: #ff9800;
    border: none;
    border-radius: 8px;
    font-weight: 700;
    padding: 10px 18px;
    box-shadow: 0 4px 12px rgba(255,152,0,0.35);
}

.btn-primary:hover {
    background: #f57c00;
}

.btn-danger,
.btn-success {
    border-radius: 8px;
    font-weight: 700;
    padding: 10px 16px;
}

.form-group label {
    font-weight: 600;
    color: #2c3e50;
}

.form-control {
    border-radius: 8px;
}

.dataTables_wrapper {
    position: relative;
}

.dataTables_wrapper .dropdown-menu {
    position: relative;
    z-index: 10;
}

.dataTables_wrapper .dataTables_paginate {
    margin-top: 12px;
    position: relative;
    z-index: 1;
}

/* Mostrar solo botones Anterior/Siguiente en paginación */
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

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-gavel"></i> {{__('frontend.cases_management')}}</h3>
            </div>

            <div class="title_right">
                <div class="form-group pull-right top_search">
                    @if($adminHasPermition->can(['case_add']))
                        <a href="{{ route('case-running.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i>
                            {{__('frontend.add_case')}}</a>
                    @endif

                </div>
            </div>
        </div>


        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <div class="row">


                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{__('frontend.from_next_date')}} <span class="text-danger"></span></label>
                                <input type="text" class="form-control dateFrom" id="date_from" readonly="">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{__('frontend.to_next_date')}}<span class="text-danger"></span></label>
                                <input type="text" class="form-control dateTo" id="date_to" readonly="">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">


                                <div class="case-margin-top-23"></div>
                                <a href="#" class="btn btn-danger" id="clear">{{__('frontend.clear')}}</a>
                                <button type="submit" id="search" disabled="disabled" class="btn btn-success"><i
                                        class="fa fa-search"></i> {{__('frontend.search')}}
                                </button>
                            </div>


                        </div>

                    </div>
                </div>

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">

                    <div class="x_content">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                                <li role="presentation" class="{{(Request::is('admin/case-running'))?'active':''}} ">
                                    <a href="{{url('admin/case-running')}}"><i class="fa fa-play"></i> {{__('frontend.running_cases')}}</a>
                                </li>

                                <li role="presentation" class="{{(Request::is('admin/case-important'))?'active':''}} ">
                                    <a href="{{url('admin/case-important')}}"><i class="fa fa-star"></i> {{__('frontend.important_cases')}}</a>
                                </li>

                                <li role="presentation" class="{{(Request::is('admin/case-nb'))?'active':''}} ">
                                    <a href="{{url('admin/case-nb')}}"><i class="fa fa-exclamation-circle"></i> {{__('frontend.no_board_cases')}}</a>
                                </li>
                                <li role="presentation" class="{{(Request::is('admin/case-archived'))?'active':''}} ">
                                    <a href="{{url('admin/case-archived')}}"><i class="fa fa-archive"></i> {{__('frontend.archived_cases')}}</a>
                                </li>

                            </ul>

                        </div>

                        <table id="case_list" class="table">
                            <thead>
                            <tr>
                                <th width=" 3%">{{__('frontend.no')}}</th>
                                <th width="20%">{{__('frontend.client_case_detail')}}</th>
                                <th width="35%">{{__('frontend.court_detail')}}</th>
                                <th width="20%">{{__('frontend.petitioner_respondent')}}</th>
                                <th width="10%">{{__('frontend.next_date')}}</th>
                                <th width="9%">{{__('frontend.status')}}</th>
                                <th width="3%">{{__('frontend.action')}}</th>
                            </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="modal fade" id="modal-case-priority" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal">

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-change-court" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal_transfer">

            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-next-date" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal_next_date">

            </div>
        </div>
    </div>

    <input type="hidden" name="get_case_important_modal"
           id="get_case_important_modal"
           value="{{url('admin/getCaseImportantModal')}}">

    <input type="hidden" name="get_case_next_modal"
           id="get_case_next_modal"
           value="{{url('admin/getNextDateModal')}}">

    <input type="hidden" name="get_case_cort_modal"
           id="get_case_cort_modal"
           value="{{url('admin/getChangeCourtModal')}}">

    <input type="hidden" name="case_url"
           id="case_url"
           value="{{ url('admin/allCaseList') }}">

    <input type="hidden" name="token-value"
           id="token-value"
           value="{{csrf_token()}}">

    <input type="hidden" name="date_format_datepiker"
           id="date_format_datepiker"
           value="{{$date_format_datepiker}}">



@endsection

@push('js')
    <script src="{{asset('assets/js/case/case-datatable.js')}}"></script>
@endpush
