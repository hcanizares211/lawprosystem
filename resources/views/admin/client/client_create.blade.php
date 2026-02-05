@extends('admin.layout.app')
@section('title', 'Client Create')
@section('content')
<style>
/* Improved client form styles */
.x_panel {
    border-radius: 12px;
    box-shadow: 0 8px 28px rgba(19,35,47,0.06);
    border: none;
    overflow: visible;
}
.x_content { padding: 22px 24px; }
.x_content .form-group { margin-bottom: 16px; }
.x_content label { color: #2c3e50; font-weight:600; }
.x_content .form-control { border-radius: 6px; border: 1px solid #e6e9ee; padding: 10px 12px; }
.repeater .border-addmore { padding: 14px; margin-bottom: 12px; border-radius: 8px; background:#ffffff; border:1px solid #f0f3f5; }
.btn-add-client { background: #ffffff; color: #2c3e50; padding: 8px 14px; border-radius: 8px; font-weight:600; border:1px solid rgba(44,62,80,0.06); display:inline-flex; align-items:center; gap:8px; }
.btn-add-client:hover { background:#f7f9fb; text-decoration:none; }
.btn-save { background:#28a745; color:white; border:none; padding:10px 18px; border-radius:8px; font-weight:600; }
.btn-cancel { background:#e74c3c; color:white; border:none; padding:10px 18px; border-radius:8px; font-weight:600; }
.form-actions { display:flex; gap:12px; justify-content:flex-end; align-items:center; margin-top:10px; }
.btn-success-edit, .btn-success-edit i { color: #2c3e50; }
.dataTables_wrapper .dataTables_paginate ul.pagination > li { display:none !important; }
.dataTables_wrapper .dataTables_paginate ul.pagination > li#clientDataTable_previous,
.dataTables_wrapper .dataTables_paginate ul.pagination > li#clientDataTable_next { display:inline-block !important; }

/* Better spacing for checkbox area */
.x_content .form-group input[type="checkbox"] { transform:scale(1.05); margin-right:8px; }

@media (max-width:767px){
    .form-actions { justify-content:stretch; flex-direction:column-reverse; gap:10px; }
}
</style>
    @component('component.heading', [
        'page_title' => __('frontend.client.add_client'),
        'action' => route('clients.index'),
        'text' => __('frontend.back'),
    ])
  
    @endcomponent
   
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            @include('component.error')
            <div class="x_panel">
                <form id="add_client" name="add_client" role="form" method="POST" autocomplete="nope"
                    action="{{ route('clients.store') }}">
                    {{ csrf_field() }}
                    <div class="x_content">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>{{ __('frontend.client.whoops') }}</strong>
                                {{ __('frontend.client.there_were_some_problems') }}<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="row">

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.first_name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="f_name" name="f_name">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.middle_name') }}<span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="m_name" name="m_name">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.last_name') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="l_name" name="l_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.gender') }} <span
                                        class="text-danger">*</span></label><br>

                                <input type="radio" name="gender" id="genderM" value="Male" checked=""
                                    required /> &nbsp;&nbsp;{{ __('frontend.client.male') }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="radio" name="gender" id="genderF"
                                    value="Female" />&nbsp;&nbsp;{{ __('frontend.client.female') }}
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.email') }}</label>
                                <input type="text" placeholder="" class="form-control" id="email" name="email">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.mobile_no') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="mobile" maxlength="10"
                                    name="mobile">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.alternate_no') }}</label>
                                <input type="text" placeholder="" class="form-control" id="alternate_no"
                                    name="alternate_no" maxlength="10">
                            </div>
                            <div class="col-md-9 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.address') }} <span
                                        class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="address" name="address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.country') }} <span
                                        class="text-danger">*</span></label>
                                <select class="form-control select-change country-select2" name="country" id="country"
                                    data-url="{{ route('get.country') }}" data-clear="#city_id,#state">
                                    <option value=""> {{ __('frontend.client.select_country') }}</option>

                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.state') }} <span
                                        class="text-danger">*</span></label>
                                <select id="state" name="state" data-url="{{ route('get.state') }}"
                                    data-target="#country" data-clear="#city_id"
                                    class="form-control state-select2 select-change">
                                    <option value=""> {{ __('frontend.client.select_state') }}</option>

                                </select>
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.city') }} <span
                                        class="text-danger">*</span></label>
                                <select id="city_id" name="city_id" data-url="{{ route('get.city') }}"
                                    data-target="#state" class="form-control city-select2">
                                    <option value=""> {{ __('frontend.client.select_city') }}</option>

                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.reference_name') }} </label>
                                <input type="text" placeholder="" class="form-control" id="reference_name"
                                    name="reference_name">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="fullname">{{ __('frontend.client.reference_mobile') }} </label>
                                <input type="text" placeholder="" class="form-control" id="reference_mobile"
                                    name="reference_mobile">
                            </div>

                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                            <br>
                            <input type="checkbox" value="Yes" name="change_court_chk" id="change_court_chk">
                            {{ __('frontend.client.add_more_person') }}
                            <br />

                        </div>
                        <div id="change_court_div" class="hidden">

                            <div class="row">
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <label for="fullname">{{ __('frontend.client.client') }} <span
                                            class="text-danger">*</span></label><br>
                                    <br>
                                    <input type="radio" name="type" id="test6" value="single" checked=""
                                        required />
                                    &nbsp;&nbsp; {{ __('frontend.client.single_client') }}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="radio" name="type" id="test7"
                                        value="multiple" />&nbsp;&nbsp;{{ __('frontend.client.multiple_client') }}
                                </div>
                            </div>
                            <div class="repeater one">
                                <div data-repeater-list="group-a">
                                    <div data-repeater-item>
                                        <div class="row border-addmore">
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.first_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="firstname" name="firstname"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.f_name') }}"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.middle_name') }}<span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="middlename" name="middlename"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.m_name') }}"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.last_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="lastname" name="lastname"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.l_name') }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.mobile_no') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="mobile_client" name="mobile_client"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.mobile.required') }}"
                                                    data-rule-number="true"
                                                    data-msg-number="{{ __('backend.client.mobile.minlength') }}"
                                                    data-rule-minlength="10"
                                                    data-msg-minlength="{{ __('backend.client.mobile.maxlength') }}"
                                                    data-rule-maxlength="10"
                                                    data-msg-maxlength="{{ __('backend.client.mobile.number') }}"
                                                    class="form-control" maxlength="10">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.address') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="address_client" name="address_client"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.address') }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <br>
                                                <button type="button" data-repeater-delete type="button"
                                                    class="btn btn-danger"><i class="fa fa-trash-o"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <br>
                                    <button data-repeater-create type="button"
                                        value="{{ __('frontend.client.add_new') }}"
                                        class="btn btn-add-client waves-effect waves-light btn-add-client"
                                        type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                            <div class="repeater two">
                                <div data-repeater-list="group-b">
                                    <div data-repeater-item>
                                        <div class="row border-addmore">
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.first_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="firstname" name="firstname"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.f_name') }}"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.middle_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="middlename" name="middlename"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.m_name') }}"
                                                    class="form-control">
                                            </div>

                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.last_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="lastname" name="lastname"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.l_name') }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.mobile_no') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="mobile_client" name="mobile_client"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.mobile.required') }}"
                                                    data-rule-number="true"
                                                    data-msg-number="{{ __('backend.client.mobile.minlength') }}"
                                                    data-rule-minlength="10"
                                                    data-msg-minlength="{{ __('backend.client.mobile.maxlength') }}"
                                                    data-rule-maxlength="10"
                                                    data-msg-maxlength="{{ __('backend.client.mobile.number') }}"
                                                    class="form-control" maxlength="10">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.address') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="address_client" name="address_client"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('backend.client.address') }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <label for="fullname">{{ __('frontend.client.advocate_name') }} <span
                                                        class="text-danger">*</span></label>
                                                <input type="text" id="advocate_name" name="advocate_name"
                                                    data-rule-required="true"
                                                    data-msg-required="{{ __('frontend.client.advocate_name') }}"
                                                    class="form-control">
                                            </div>
                                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                                <br>
                                                <button type="button" data-repeater-delete type="button"
                                                    class="btn btn-danger waves-effect waves-light"><i
                                                        class="fa fa-trash-o" aria-hidden="true"></i></button>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                    <br>
                                    <button data-repeater-create type="button" value="{{ __('frontend.client.add_new') }}"
                                        class="btn btn-add-client waves-effect waves-light btn-add-client"
                                        type="button"><i class="fa fa-plus" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-6 col-xs-12 form-actions">
                                    <a href="{{ route('clients.index') }}" class="btn btn-cancel">
                                        {{ __('frontend.cancel') }}
                                    </a>
                                    <input type="hidden" name="route-exist-check" id="route-exist-check"
                                        value="{{ url('admin/check_client_email_exits') }}">
                                    <input type="hidden" name="token-value" id="token-value" value="{{ csrf_token() }}">

                                    <button type="submit" class="btn btn-save"><i class="fa fa-save"
                                            id="show_loader"></i>&nbsp;{{ __('frontend.save') }}
                                    </button>
                                </div>
                        </div>


                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('assets/admin/js/selectjs.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/repeter/repeater.js') }}"></script>
    <script src="{{ asset('assets/admin/vendors/jquery-ui/jquery-ui.js') }}"></script>

    {{-- START: Added code to pass translations --}}
    <script>
        // Create a JS object with translated messages from the 'backend.client' keys
        var validationMessages = @json(__('backend.client'));
    </script>
    {{-- END: Added code --}}

    {{-- Include your validation script AFTER defining the messages --}}
    <script src="{{ asset('assets/js/client/add-client-validation.js') }}"></script>
@endpush
