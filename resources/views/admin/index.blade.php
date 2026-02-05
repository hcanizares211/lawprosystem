@extends('admin.layout.app')
@section('title', 'Dashboard')
@section('content')

<style>
.dashboard-card {
    transition: all 0.3s ease;
    text-decoration: none;
    display: block;
    margin-bottom: 20px;
}

.dashboard-card:hover {
    text-decoration: none;
    transform: translateY(-5px);
}

.tile-stats {
    position: relative;
    border-radius: 12px;
    padding: 25px 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    overflow: hidden;
    min-height: 160px;
}

.dashboard-card:hover .tile-stats {
    box-shadow: 0 8px 24px rgba(0,0,0,0.15);
}

.tile-stats .icon {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 65px;
    opacity: 0.15;
}

.tile-stats .icon i {
    display: block;
}

.tile-stats .count {
    font-size: 48px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 8px;
    color: #2c3e50;
}

.tile-stats h3 {
    font-size: 16px;
    font-weight: 600;
    margin: 8px 0;
    color: #34495e;
    text-transform: capitalize;
}

.tile-stats p {
    font-size: 13px;
    margin: 0;
    color: #7f8c8d;
    font-weight: 500;
}

.tile-stats p i {
    font-size: 14px;
}

.page-title {
    margin-bottom: 30px;
    padding-bottom: 15px;
    border-bottom: 2px solid #ecf0f1;
}

.page-title h3 {
    font-size: 28px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

.page-title h3 i {
    color: #3498db;
}

.x_panel {
    border-radius: 10px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.08);
    border: none;
    transition: all 0.3s ease;
}

.x_panel:hover {
    box-shadow: 0 4px 16px rgba(0,0,0,0.12);
}

.x_title {
    border-bottom: 2px solid #ecf0f1;
    padding: 20px;
}

.x_title h2 {
    font-size: 20px;
    font-weight: 600;
    color: #2c3e50;
    margin: 0;
}

.x_content {
    padding: 20px;
}
</style>

    @if ($adminHasPermition->can(['dashboard_list']))

        <link href="{{ asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.css') }} " rel="stylesheet">

        <form method="POST" action="{{ url('admin/dashboard') }}" id="case_board_form">

            {{ csrf_field() }}
            <!-- top tiles -->
            <div class="page-title">
                <div class="title_left">
                    <h3><i class="fa fa-tachometer"></i>&nbsp;&nbsp;{{ __('frontend.dashboard.dashboard') }}</h3>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="{{ route('clients.index') }}" class="dashboard-card animated flipInY">
                        <div class="tile-stats" style="background-color: #E3F2FD">
                            <div class="icon"><i class="fa fa-users"></i></div>
                            <div class="count">{{ $client ?? '' }}</div>
                            <h3>{{ __('frontend.dashboard.clients') }}</h3>
                            <p>{{ __('frontend.dashboard.total_clients') }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="{{ route('case-running.index') }}" class="dashboard-card animated flipInY">
                        <div class="tile-stats" style="background-color: #D6EAF8">
                            <div class="icon"><i class="fa fa-gavel"></i></div>
                            <div class="count">{{ $case_total ?? '' }}</div>
                            <h3>{{ __('frontend.dashboard.cases') }}</h3>
                            <p>{{ __('frontend.dashboard.total_cases') }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="{{ url('admin/case-important') }}" class="dashboard-card animated flipInY">
                        <div class="tile-stats" style="background-color: #FFF3CD">
                            <div class="icon"><i class="fa fa-star"></i></div>
                            <div class="count">{{ $important_case ?? '' }}</div>
                            <h3>{{ __('frontend.dashboard.important_cases') }}</h3>
                            <p>{{ __('frontend.dashboard.total_important_cases') }}</p>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="{{ url('admin/case-archived') }}" class="dashboard-card animated flipInY">
                        <div class="tile-stats" style="background-color: #D4EDDA">
                            <div class="icon"><i class="fa fa-file-archive-o"></i></div>
                            <div class="count">{{ $archived_total }}</div>
                            <h3>{{ __('frontend.dashboard.archived_cases') }}</h3>
                            <p>{{ __('frontend.dashboard.total_completed_cases') }}</p>
                        </div>
                    </a>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-list-alt"></i> {{ __('frontend.dashboard.case_board') }}</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right" style="padding: 0;">
                                <div class="input-group" style="box-shadow: 0 2px 4px rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;">
                                    <span class="input-group-addon" style="background: #3498db; color: white; border: none;"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="client_case" id="client_case" class="form-control datecase"
                                        readonly="" style="border: none;"
                                        value="{{ $date != '' ? date($date_format_laravel, strtotime($date)) : date($date_format_laravel) }}">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if ($totalCaseCount > 0)
                                @if (count($case_dashbord) > 0 && !empty($case_dashbord))
                                    @foreach ($case_dashbord as $court)
                                        <div style="margin-bottom: 25px; padding: 15px; background: #f8f9fa; border-left: 4px solid #3498db; border-radius: 6px;">
                                            <h4 class="text-primary" style="margin: 0; font-weight: 600;">
                                                <i class="fa fa-gavel"></i> {!! $court['judge_name'] !!}
                                            </h4>
                                        </div>
                                        <div style="overflow-x: auto; margin-bottom: 30px;">
                                        <table id="case_list" class="table table-hover" style="width:100%; border-collapse: separate; border-spacing: 0;">
                                            <thead>
                                                <tr style="background: #2c3e50; color: white;">
                                                    <th width="3%" style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.tc_no') }}</th>
                                                    <th width="20%" style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.tc_case_no') }}</th>
                                                    <th width="35%" style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.tc_case') }}</th>
                                                    <th width="15%" style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.tc_next_date') }}</th>
                                                    <th width="10%" style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.tc_Status') }}</th>
                                                    <th width="17%" style="text-align: center; padding: 15px 10px; font-weight: 600; border: none;">
                                                        {{ __('frontend.dashboard.tc_action') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (!empty($court['cases']) && count($court['cases']) > 0)
                                                    @foreach ($court['cases'] as $key => $value)
                                                        @php
                                                            $class =
                                                                $value->priority == 'High'
                                                                    ? 'fa fa-star'
                                                                    : ($value->priority == 'Medium'
                                                                        ? 'fa fa-star-half-o'
                                                                        : 'fa fa-star-o');
                                                        @endphp
                                                        @if ($value->client_position == 'Petitioner')
                                                            @php
                                                                $first =
                                                                    $value->first_name .
                                                                    ' ' .
                                                                    $value->middle_name .
                                                                    ' ' .
                                                                    $value->last_name;
                                                                $second = $value->party_name;
                                                            @endphp
                                                        @else
                                                            @php
                                                                $first = $value->party_name;
                                                                $second =
                                                                    $value->first_name .
                                                                    ' ' .
                                                                    $value->middle_name .
                                                                    ' ' .
                                                                    $value->last_name;
                                                            @endphp
                                                        @endif

                                                        <tr style="border-bottom: 1px solid #ecf0f1; transition: all 0.2s ease;">
                                                            <td style="padding: 15px 10px; vertical-align: middle; font-weight: 600;">{{ $key + 1 }}</td>
                                                            <td style="padding: 15px 10px; vertical-align: middle;">
                                                                <span class="text-primary" style="font-weight: 600; font-size: 14px;">{{ $value->registration_number }}</span>
                                                                <br /><small style="background: #ecf0f1; padding: 2px 8px; border-radius: 4px; font-size: 11px;">{{ $value->caseSubType != '' ? $value->caseSubType : $value->caseType }}</small>
                                                            </td>
                                                            <td style="padding: 15px 10px; vertical-align: middle; line-height: 1.6;">
                                                                <div style="margin-bottom: 5px;">{!! $first !!}</div>
                                                                <div style="text-align: center; margin: 5px 0;">
                                                                    <span style="background: #3498db; color: white; padding: 2px 10px; border-radius: 12px; font-size: 11px; font-weight: 600;">{{ __('frontend.vs') }}</span>
                                                                </div>
                                                                <div style="margin-top: 5px;">{!! $second !!}</div>
                                                            </td>
                                                            <td style="padding: 15px 10px; vertical-align: middle;">
                                                                @if ($value->hearing_date != '')
                                                                    <span style="background: #d4edda; padding: 5px 10px; border-radius: 6px; font-weight: 600; color: #155724;">
                                                                        <i class="fa fa-calendar"></i> {{ date($date_format_laravel, strtotime($value->hearing_date)) }}
                                                                    </span>
                                                                @else
                                                                    <span class="blink_me" style="background: #f8d7da; color: #721c24; padding: 5px 10px; border-radius: 6px; font-weight: 600;">
                                                                        <i class="fa fa-exclamation-triangle"></i> {{ __('frontend.dashboard.date_not_update') }}
                                                                    </span>
                                                                @endif
                                                            </td>
                                                            <td style="padding: 15px 10px; vertical-align: middle;">
                                                                <span style="background: #e3f2fd; color: #1976d2; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: 600;">
                                                                    {{ $value->case_status_name }}
                                                                </span>
                                                            </td>
                                                            <td style="padding: 15px 10px; vertical-align: middle;">
                                                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                                                    @if ($adminHasPermition->can(['case_edit']) == '1')
                                                                        <a href="javascript:void(0);" onclick="nextDateAdd('{{ $value->case_id }}');" 
                                                                           style="display: inline-flex; align-items: center; padding: 6px 12px; background: #3498db; color: white; border-radius: 6px; text-decoration: none; font-size: 13px; transition: all 0.2s;">
                                                                            <i class="fa fa-calendar-plus-o" style="margin-right: 5px;"></i>
                                                                            {{ __('frontend.dashboard.ac_next_date') }}
                                                                        </a>
                                                                                                <a href="javascript:void(0);" onClick="transfer_case('{{ $value->case_id }}');" 
                                                                                                    style="display: inline-flex; align-items: center; padding: 6px 12px; background: #2c3e50; color: white; border-radius: 6px; text-decoration: none; font-size: 13px; transition: all 0.2s;">
                                                                            <i class="fa fa-gavel" style="margin-right: 5px;"></i>
                                                                            {{ __('frontend.dashboard.transfer') }}
                                                                        </a>
                                                                    @endif
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        </div>
                                    @endforeach
                                @endif
                            @elseif($case_total > 0 && count($case_dashbord) == 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="text-align: center; padding: 60px 20px; background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); border-radius: 12px;">
                                            <i class="fa fa-calendar-o" style="font-size: 80px; color: #bdc3c7; margin-bottom: 20px;"></i>
                                            <p style="font-size: 18px; color: #7f8c8d; font-weight: 500;">
                                                {{ __('frontend.dashboard.today_no_case_board') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="background: #2c3e50; border-radius: 12px; padding: 50px 40px; color: white; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4 style="font-size: 28px; font-weight: 700; margin-bottom: 15px; color: white;">
                                                        <i class="fa fa-briefcase"></i> {{ __('frontend.dashboard.manage_your_case') }}
                                                    </h4>
                                                    <p style="font-size: 16px; line-height: 1.6; margin-bottom: 25px; color: rgba(255,255,255,0.9);">
                                                        {{ __('frontend.dashboard.maintain_complete_case_details') }}
                                                    </p>
                                                                     <a href="{{ url('admin/case-running/create') }}" 
                                                                         style="display: inline-block; background: white; color: #2c3e50; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 15px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                                                        <i class="fa fa-plus-circle"></i> {{ __('frontend.dashboard.add_case') }}
                                                    </a>
                                                </div>
                                                <div class="col-md-4" style="display: flex; align-items: center; justify-content: center;">
                                                    <i class="fa fa-gavel" style="font-size: 120px; opacity: 0.2;"></i>
                                                </div>                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="customers-img">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            </div>

            <br>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-clock-o"></i> {{ __('frontend.dashboard.appointment') }}</h2>
                            <div class="col-md-3 col-sm-12 col-xs-12 pull-right" style="padding: 0;">
                                <div class="input-group" style="box-shadow: 0 2px 4px rgba(0,0,0,0.1); border-radius: 6px; overflow: hidden;">
                                    <span class="input-group-addon" style="background: #e74c3c; color: white; border: none;"><i class="fa fa-calendar"></i></span>
                                    <input type="text" name="appoint_range" id="appoint_range" class="form-control" style="border: none;"
                                        value="{{ date($date_format_laravel) }}" readonly="">
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            @if (count($appoint_calander) > 0)
                                <div style="overflow-x: auto;">
                                <table id="appointment_list" class="table table-hover" style="width:100%; border-collapse: separate; border-spacing: 0;">
                                    <thead>
                                        <tr style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                                            <th style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.ta_no') }}</th>
                                            <th style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.ta_client_name') }}</th>
                                            <th style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.ta_date') }}</th>
                                            <th style="padding: 15px 10px; font-weight: 600; border: none;">{{ __('frontend.dashboard.ta_time') }}</th>
                                        </tr>
                                    </thead>
                                </table>
                                </div>
                            @elseif($appointmentCount > 0 && count($appoint_calander) == 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="text-align: center; padding: 60px 20px; background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%); border-radius: 12px;">
                                            <i class="fa fa-calendar-times-o" style="font-size: 80px; color: #e67e22; margin-bottom: 20px; opacity: 0.7;"></i>
                                            <p style="font-size: 18px; color: #7f8c8d; font-weight: 500;">
                                                {{ __('frontend.dashboard.today_no_appointment') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="col-md-12">
                                        <div style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); border-radius: 12px; padding: 50px 40px; color: white; box-shadow: 0 10px 30px rgba(0,0,0,0.2);">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <h4 style="font-size: 28px; font-weight: 700; margin-bottom: 15px; color: white;">
                                                        <i class="fa fa-calendar-check-o"></i> {{ __('frontend.dashboard.manage_your_appointment') }}
                                                    </h4>
                                                    <p style="font-size: 16px; line-height: 1.6; margin-bottom: 25px; color: rgba(255,255,255,0.9);">
                                                        {{ __('frontend.dashboard.appointment_with_advocates') }}
                                                    </p>
                                                    <a href="{{ url('admin/appointment/create') }}" 
                                                       style="display: inline-block; background: white; color: #f5576c; padding: 12px 30px; border-radius: 8px; text-decoration: none; font-weight: 600; font-size: 15px; transition: all 0.3s; box-shadow: 0 4px 15px rgba(0,0,0,0.2);">
                                                        <i class="fa fa-plus-circle"></i> {{ __('frontend.dashboard.add_appointment') }}
                                                    </a>
                                                </div>
                                                <div class="col-md-4" style="display: flex; align-items: center; justify-content: center;">
                                                    <i class="fa fa-clock-o" style="font-size: 120px; opacity: 0.2;"></i>
                                                </div>                                                            href="{{ url('admin/appointment/create') }}">
                                                            {{ __('frontend.dashboard.add_appointment') }} </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="customers-img">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>


            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2><i class="fa fa-calendar"></i> {{ __('frontend.dashboard.Calendar') }}</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="padding: 25px;">
                            <div id="calendar_dashbors_case" style="background: white; border-radius: 8px; padding: 15px; box-shadow: 0 2px 8px rgba(0,0,0,0.05);"></div>
                        </div>
                    </div>
                </div>                        </div>
                    </div>
                </div>


            </div>


            <div id="load-modal"></div>
            <!-- /top tiles -->
        </form>



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

        <input type="hidden" name="token-value" id="token-value" value="{{ csrf_token() }}">

        <input type="hidden" name="case-running" id="case-running" value="{{ url('admin/case-running') }}">

        <input type="hidden" name="appointment" id="appointment" value="{{ url('admin/appointment') }}">
        <input type="hidden" name="ajaxCalander" id="ajaxCalander" value="{{ url('admin/ajaxCalander') }}">

        <input type="hidden" name="date_format_datepiker" id="date_format_datepiker"
            value="{{ $date_format_datepiker }}">
        <input type="hidden" name="dashboard_appointment_list" id="dashboard_appointment_list"
            value="{{ url('admin/dashboard-appointment-list') }}">

        <input type="hidden" name="getNextDateModal" id="getNextDateModal"
            value="{{ url('admin/getNextDateModal') }}">

        <input type="hidden" name="getChangeCourtModal" id="getChangeCourtModal"
            value="{{ url('admin/getChangeCourtModal') }}">

        <input type="hidden" name="getCaseImportantModal" id="getCaseImportantModal"
            value="{{ url('admin/getCaseImportantModal') }}">
        <input type="hidden" name="getCourt" id="getCourt" value="{{ url('getCourt') }}">
        <input type="hidden" name="downloadCaseBoard" id="downloadCaseBoard"
            value="{{ url('admin/downloadCaseBoard') }}">
        <input type="hidden" name="printCaseBoard" id="printCaseBoard" value="{{ url('admin/printCaseBoard') }}">

    @endif
@endsection
@push('js')
    <script src='https://fullcalendar.io/js/fullcalendar-3.1.0/lib/moment.min.js'></script>
    <script src="{{ asset('assets/admin/vendors/fullcalendar/dist/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/fullcalendar/dist/lang/es.js') }}"></script>
    <script src="{{ asset('assets/js/dashbord/dashbord-datatable.js') }}"></script>
@endpush
