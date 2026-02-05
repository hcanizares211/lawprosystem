@extends('admin.layout.app')
@section('title','Vendor Create')
@section('content')
    @component('component.heading' , [

        'page_title' => __('frontend.add_vendor'),
        'action' => route('vendor.index'),
        'text' => __('frontend.back'),
         ])
    @endcomponent

    <div class="row">
        <form id="add_vendor" name="add_vendor" role="form" method="POST" action="{{route('vendor.store')}}"
              enctype="multipart/form-data">
            @csrf()

            <div class="col-md-12 col-sm-12 col-xs-12">
                @include('component.error')
                <div class="x_panel">

                    <div class="x_content">

                        <style>
                            /* Scoped styles for Add Vendor page */
                            .page-title h3 { color: #2c3e50; font-weight: 600; }
                            .x_panel { border-radius: 6px; border: 1px solid #e6e9ee; box-shadow: 0 1px 0 rgba(0,0,0,0.03); }
                            .x_panel .x_content { padding: 22px; background: #fff; }
                            .x_panel .x_content .form-group label { color: #2c3e50; font-weight: 600; }
                            .x_panel .x_content .form-control { height: 40px; border-radius: 3px; }
                            .x_panel .x_content .form-control.select2-hidden-accessible + .select2-container { width: 100% !important; }
                            .x_panel .x_content textarea.form-control { min-height: 90px; height: auto; }
                            .form-group.pull-right .btn { min-width: 110px; }
                            .btn-success { background: #2c3e50; border-color: #2c3e50; }
                            .btn-danger { background: #d9534f; border-color: #d43f3a; }
                            .title_right .btn { background: #2c3e50; border-color: #2c3e50; }
                            .divider { height: 1px; background: #eef0f2; margin: 12px 0; }
                            @media (max-width: 767px) {
                                .form-group.pull-right { text-align: left; margin-top: 10px; }
                            }
                        </style>

                        <div class="row">

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="company_name">{{ __('frontend.company_name') }}<span class="text-danger"></span></label>
                                <input type="text" placeholder="" class="form-control" name="company_name"
                                       id="company_name">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="f_name">{{__('frontend.first_name')}}<span class="text-danger"></span></label>
                                <input type="text" placeholder="" class="form-control" id="f_name" name="f_name">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="l_name">{{__('frontend.last_name')}}<span class="text-danger"></span></label>
                                <input type="text" placeholder="" class="form-control" id="l_name" name="l_name">
                            </div>
                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="email">{{__('frontend.email_id')}}<span class="text-danger"></span></label>
                                <input type="email" placeholder="" class="form-control" id="email" name="email">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="mobile">{{__('frontend.mobile_no')}} <span class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="mobile" name="mobile"
                                       data-rule-required="true"
                                       data-rule-number="true"
                                       data-msg-required="Mobile no is required"
                                       data-rule-minlength="10"
                                       data-rule-maxlength="10">
                            </div>

                            <div class="col-md-4 col-sm-12 col-xs-12 form-group">
                                <label for="alternate_no">{{ __('frontend.alternate_no') }}<span class="text-danger"></span></label>
                                <input type="text" placeholder="" class="form-control" id="alternate_no"
                                       name="alternate_no"
                                       data-rule-required="false"
                                       data-rule-number="true"
                                       data-rule-minlength="10"
                                       data-rule-maxlength="10">
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label for="address">{{ __('frontend.address') }} <span class="text-danger">*</span></label>
                                <input type="text" placeholder="" class="form-control" id="address" name="address"
                                       data-rule-required="true" data-msg-required="Adress is required">
                            </div>

                            <div class="col-md-4 form-group">
                                <label for="country">{{__('frontend.country')}} <span class="text-danger">*</span></label>
                                <select class="form-control select-change country-select2" data-rule-required="true"
                                        data-msg-required=" Please select country selct2-width-100" name="country"
                                        id="country"
                                        data-url="{{ route('get.country') }}"
                                        data-clear="#city_id,#state"
                                >
                                    <option value="">{{__('frontend.select_country')}}</option>

                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="state">{{__('frontend.state')}}<span class="text-danger">*</span></label>
                                <select id="state" name="state"

                                        data-url="{{ route('get.state') }}"
                                        data-target="#country"
                                        data-clear="#city_id"
                                        class="form-control state-select2 select-change" data-rule-required="true"
                                        data-msg-required=" Please select state">
                                    <option value="">{{__('frontend.select_state')}}</option>


                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label for="city">{{__('frontend.city')}}<span class="text-danger">*</span></label>
                                <select id="city_id" name="city_id"
                                        data-url="{{ route('get.city') }}"
                                        data-target="#state"
                                        class="form-control city-select2" data-rule-required="true"
                                        data-msg-required=" Please select city">
                                    <option value="">{{__('frontend.select_city')}}</option>


                                </select>
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="gst">{{ __('frontend.GSTIN') }}</label>
                                <input type="text" placeholder="" class="form-control" id="gst" name="gst">
                            </div>

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label for="pan">{{ __('frontend.PAN') }}</label>
                                <input type="text" placeholder="" class="form-control" id="pan" name="pan">
                            </div>


                            <div class="form-group pull-right">
                                <div class="col-md-12 col-sm-6 col-xs-12">
                                    <br>
                                    <a href="{{ route('vendor.index') }}" class="btn btn-danger">{{__('frontend.cancel')}}</a>
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"
                                                                                     id="show_loader"></i>&nbsp;{{__('frontend.save')}}
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </form>
    </div>
@endsection
@push('js')
    <script src="{{asset('assets/admin/js/selectjs.js')}}"></script>
    <script src="{{asset('assets/admin/vendor/vendor.js') }}"></script>
@endpush
