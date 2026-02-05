@extends('admin.layout.app')
@section('title','Case List')
@section('content')

<style>
    /* Case detail page: blue theme, rounded panels, improved tabs */
    .x_panel {
        border-radius: 8px;
        box-shadow: 0 1px 3px rgba(44,62,80,0.08);
        overflow: visible;
        border: 1px solid rgba(44,62,80,0.06);
    }
    .x_title {
        background: linear-gradient(90deg, #2c3e50 0%, #2c3e50 100%);
        color: #fff;
        padding: 14px 16px;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }
    .x_title h2 { margin: 0; font-size: 16px; font-weight:600 }
    .panel_toolbox a { color: #fff !important; }
    .nav-tabs > li > a {
        color: #2c3e50;
        border: none;
        padding: 8px 14px;
        margin-right: 6px;
    }
    .nav-tabs > li.active > a,
    .nav-tabs > li > a:hover { background: rgba(44,62,80,0.06); border-radius: 6px; }
    .countries_list table { width:100%; border-collapse: collapse; }
    .countries_list td {
        padding: 10px 8px;
        vertical-align: middle;
        border-bottom: 1px solid rgba(0,0,0,0.04);
    }
    .countries_list td:first-child { color: #6c757d; width:45%; font-weight:500 }
    .countries_list td:last-child { text-align:right; font-weight:600; color:#2c3e50 }
    .btn-action-icons a { color: #2c3e50; margin-left:8px }
    .case-meta-row { display:flex; gap:12px; flex-wrap:wrap; align-items:center }
    @media (max-width:767px){
        .countries_list td:first-child{display:block;width:100%;text-align:left}
        .countries_list td:last-child{display:block;width:100%;text-align:left;padding-top:6px}
    }
</style>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">

                <div class="x_content">
                    @include('admin.case.view.card_header')
                    <div class="dashboard-widget-content">
                        <h2 class="line_30 case_detail-m-f-10">{{__('frontend.case_detail')}}</h2>
                        <div class="col-md-6 hidden-small">


                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td>{{__('frontend.case_type')}}</td>
                                    <td class="fs15 fw700 text-right">{{$case->caseType}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.filing_number')}}</td>
                                    <td class="fs15 fw700 text-right">{{$case->filing_number}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.filing_date')}}</td>
                                    <td class="fs15 fw700 text-right">{{date($date_format_laravel,strtotime($case->filing_date))}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.registration_number')}}</td>
                                    <td class="fs15 fw700 text-right">{{$case->registration_number}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.registration_date')}}</td>
                                    <td class="fs15 fw700 text-right">{{date($date_format_laravel,strtotime($case->registration_date))}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.cnr_number')}}</td>
                                    <td class="fs15 fw700 text-right"> {{$case->cnr_number}}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 hidden-small">

                            <table class="countries_list">
                                <tbody>

                                <tr>
                                    <td>{{__('frontend.first_hearing_date')}}</td>
                                    <td class="fs15 fw700 text-right s">
                                        {{date($date_format_laravel,strtotime($case->first_hearing_date))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.next_hearing_date')}}</td>

                                    @if($adminHasPermition->can(['case_edit']) =="1")
                                        <td class="fs15 fw700 text-right">

                                            {{date($date_format_laravel,strtotime($case->next_date))}}
                                            &nbsp;<a href="javascript:void(0);"
                                                     onClick="nextDateAdd({{$case->case_id}});">
                                                <i class="fa fa-calendar"></i></a>
                                        </td>
                                    @else
                                        <td class="fs15 fw700 text-right">
                                            {{date($date_format_laravel,strtotime($case->next_date))}}

                                            &nbsp;<a href="javascript:void(0);">
                                                <i class="fa fa-calendar"></i></a>
                                        </td>



                                    @endif
                                </tr>
                                <tr>
                                    <td>{{__('frontend.case_status')}}</td>
                                    <td class="fs15 fw700 text-right">{{$case->case_status_name}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.court_no')}}</td>
                                    <td class="fs15 fw700 text-right">{{$case->court_no}}</td>
                                </tr>
                                <tr>
                                    <td>{{__('frontend.judge')}}</td>
                                    <td class="fs15 fw700 text-right">{{$case->judge_name}}</td>
                                </tr>
                                </tbody>
                            </table>
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
                    <div class="dashboard-widget-content">
                        <div class="col-md-6 hidden-small">
                            <h4 class="line_30">{{__('frontend.petitioner_advocate')}}</h4>


                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td> @if(count($petitioner_and_advocate)>0 && !empty($petitioner_and_advocate)) @php $i=1; @endphp @foreach($petitioner_and_advocate as $value)
                                            <p class="subscri-ti-das"> {{ $i.') '.$value['party_name'] }}</p>
                                            <p class="subscri-ti-das"> {{__('frontend.advocate')}} - {{$value['party_advocate'] }} </p>
                                            @php $i++; @endphp @endforeach @endif</td>

                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="col-md-6 hidden-small">
                            <h4 class="line_30">{{__('frontend.respondent_and_advocate')}}</h4>

                            <table class="countries_list">
                                <tbody>

                                <tr>
                                    <td>
                                        @if(count($respondent_and_advocate)>0 && !empty($respondent_and_advocate)) @php $i=1; @endphp @foreach($respondent_and_advocate as $value)
                                            <p class="subscri-ti-das"> {{ $i.') '.$value['party_name'] }}</p>
                                            <p class="subscri-ti-das"> {{__('frontend.advocate')}} - {{$value['party_advocate'] }} </p>
                                            @php $i++; @endphp @endforeach @endif
                                    </td>

                                </tr>

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="load-modal"></div>


    <div class="modal fade" id="modal-next-date" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" id="show_modal_next_date">

            </div>
        </div>
    </div>

    <input type="hidden" name="getNextDateModals"
           id="getNextDateModals"
           value="{{url('admin/getNextDateModal')}}">
@endsection

@push('js')
    <script src="{{asset('assets/js/case/case_view_detail.js')}}"></script>
@endpush





