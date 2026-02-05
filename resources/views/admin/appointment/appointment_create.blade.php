@extends('admin.layout.app')
@section('title', 'Appointment Add')
@section('content')
    <div class="page-title">
        <div class="title_left">
            <h3>{{ __('frontend.appointment.add_appointment') }}</h3>
        </div>

        <div class="title_right">
            <div class="form-group pull-right top_search">
                <a href="{{ route('appointment.index') }}" class="btn btn-primary">{{ __('frontend.back') }}</a>
            </div>
        </div>
    </div>

    <style>
        /* Scoped styles for Add Appointment page */
        .page-title h3 { color: #2c3e50; font-weight: 600; }
        .x_panel { border-radius: 6px; border: 1px solid #e6e9ee; box-shadow: 0 1px 0 rgba(0,0,0,0.03); }
        .x_panel .x_content { padding: 22px; background: #fff; }
        .x_panel .x_content .form-group label { color: #2c3e50; font-weight: 600; }
        .x_panel .x_content .form-control { height: 40px; border-radius: 3px; }
        .x_panel .x_content textarea.form-control { min-height: 90px; height: auto; }
        .form-group.pull-right .btn { min-width: 110px; }
        .btn-success { background: #28a745; border-color: #28a745; }
        .btn-danger { background: #d9534f; border-color: #d43f3a; }
        .title_right .btn { background: #2c3e50; border-color: #2c3e50; }
        /* Radio spacing */
        .x_panel .x_content .row .form-group b { margin-left: 8px; color: #2c3e50; }
        /* Responsive tweaks */
        @media (max-width: 767px) {
            .form-group.pull-right { text-align: left; margin-top: 10px; }
        }
    </style>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('component.error')
            <div class="x_panel">
                <div class="x_content">
                    <form id="add_appointment" name="add_appointment" role="form" method="POST"
                        action="{{ route('appointment.store') }}" enctype="multipart/form-data" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="x_content">

                                <div class="row">
                                    <div class="form-group col-md-6">

                                        <input type="radio" id="test5" value="new" name="type" checked>

                                        <b> {{ __('frontend.new_client') }}
                                        </b>

                                    </div>


                                    <div class="form-group col-md-6">

                                        <input type="radio" id="test4" value="exists" name="type">

                                        <b> {{ __('frontend.existing_client') }}
                                        </b>

                                    </div>
                                </div>
                                <br>
                                <div class="row exists">
                                    <div class="col-md-12">

                                        <div class="form-group">
                                            @if (!empty($client_list) && count($client_list) > 0)
                                                <label class="discount_text">{{ __('frontend.select_client') }}
                                                    <er class="rest">*</er>
                                                </label>
                                                <select class="form-control selct2-width-100" name="exists_client"
                                                    id="exists_client" onchange="getMobileno(this.value);">
                                                    <option value="">{{ __('frontend.select_client') }}</option>
                                                    @foreach ($client_list as $list)
                                                        <option value="{{ $list->id }}">{{ $list->full_name }}</option>
                                                    @endforeach
                                                </select>
                                            @endif


                                        </div>

                                    </div>
                                </div>


                                <div class="row new">
                                    <div class="col-md-12 form-group">
                                        <label for="newclint_name">{{ __('frontend.new_client_name') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" placeholder="" class="form-control" id="new_client"
                                            name="new_client" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="mobile">{{ __('frontend.mobile_no') }}<span
                                                class="text-danger">*</span></label>
                                        <input type="text" placeholder="" class="form-control" id="mobile"
                                            name="mobile" autocomplete="off" maxlength="10">
                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="date">{{ __('frontend.date') }}<span
                                                class="text-danger">*</span></label>

                                        <input type="text" class="form-control" id="date" name="date">


                                    </div>

                                    <div class="col-md-3 form-group">
                                        <label for="time">{{ __('frontend.time') }}<span
                                                class="text-danger">*</span></label>

                                        <input type="text" class="form-control" id="time" name="time">

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 form-group">
                                        <label for="note">{{ __('frontend.note') }}</label>
                                        <textarea type="text" placeholder="" class="form-control" id="note" name="note"></textarea>
                                    </div>
                                </div>


                            </div>
                            <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <br>
                                    <a href="{{ route('appointment.index') }}"
                                        class="btn btn-danger">{{ __('frontend.cancel') }}</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"
                                            id="show_loader"></i>&nbsp;{{ __('frontend.save') }}
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <input type="hidden" name="date_format_datepiker" id="date_format_datepiker" value="{{ $date_format_datepiker }}">

    <input type="hidden" name="getMobileno" id="getMobileno" value="{{ route('getMobileno') }}">
@endsection

@push('js')
    {{-- START: Added code to pass appointment translations --}}
    <script>
        // Use translations from 'backend.appointment' keys
        var appointmentValidationMessages = @json(__('backend.appointment'));
        // If you created appointment.php, use: @json(__('appointment'))
    </script>
    {{-- END: Added code --}}
    <script src="{{ asset('assets/admin/appointment/appointment.js') }}"></script>
    <script src="{{ asset('assets/js/appointment/appointment-validation.js') }}"></script>
@endpush
