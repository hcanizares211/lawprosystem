@extends('admin.layout.app')
@section('title','Transferencia de Caso')
@section('content')

<style>
    /* Transfer tab: reuse case styles for consistency */
    .x_panel { border-radius:8px; box-shadow:0 1px 3px rgba(44,62,80,0.08); overflow:visible; border:1px solid rgba(44,62,80,0.06); }
    .x_title { background: linear-gradient(90deg, #2c3e50 0%, #2c3e50 100%); color:#fff; padding:14px 16px; border-top-left-radius:8px; border-top-right-radius:8px }
    .x_title h2 { margin:0; font-size:16px; font-weight:600 }
    .nav-tabs > li > a { color:#2c3e50; border:none; padding:8px 14px; margin-right:6px }
    .nav-tabs > li.active > a, .nav-tabs > li > a:hover { background: rgba(44,62,80,0.06); border-radius:6px }
    #case_transfer_list th { color:#6c757d; font-weight:600 }
    .dataTables_wrapper .dataTables_paginate .paginate_button { background: transparent; border: none; color: #6c757d }
    .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #f1f3f4; color:#2c3e50 }
    @media (max-width:767px){ .x_title .panel_toolbox { float:none; margin-top:8px } }
</style>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    <div class="x_title">
                        <h2> {{__('frontend.case')}}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li>

                                <a class="card-header-color "
                                   href="{{url('admin/case-running-download/'.$case_id.'/download')}}"
                                   title="Download case file"><i class="fa fa-download fa-2x"></i></a>
                            </li>
                            <li>
                                <a class="card-header-color "
                                   href="{{url('admin/case-running-download/'.$case_id.'/print')}}"
                                   title="Print case file" target="_blank"><i class="fa fa-print fa-2x"></i></a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>

                    <br>
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                        <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation"
                                class="@if(Request::segment(2)=='case-running')active @ else @endif"><a
                                    href="{{route('case-running.show',$case_id)}}">{{__('frontend.detail')}}</a>
                            </li>
                            <li role="presentation"
                                class="@if(Request::segment(2)=='case-history')active @ else @endif"><a
                                    href="{{url( 'admin/case-history/'.$case_id)}}">{{__('frontend.history')}}</a>

                            </li>
                            <li role="presentation"
                                class="@if(Request::segment(2)=='case-transfer')active @ else @endif"><a
                                    href="{{url('admin/case-transfer/'.$case_id)}}">{{__('frontend.transfer')}}</a>
                            </li>
                        </ul>

                    </div>

                    <table id="case_transfer_list" class="table row-border">
                        <thead>
                        <tr>
                            <th width="5%">{{__('frontend.no')}}</th>
                            <th width="25%">{{__('frontend.registration_number')}}</th>
                            <th width="15%">{{__('frontend.transfer_date')}}</th>
                            <th width="25%">{{__('frontend.from_court_number_judge')}}</th>
                            <th width="30%">{{__('frontend.to_court_number_judge')}}</th>

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
    <input type="hidden" name="case_ids"
           id="case_ids"
           value="{{$case_id}}">
    <input type="hidden" name="allCaseTransferLists"
           id="allCaseTransferLists"
           value="{{ url('admin/allCaseTransferList') }}">

@endsection
@push('js')

    <script src="{{asset('assets/js/case/case-transfer-datatable.js')}}"></script>
@endpush
