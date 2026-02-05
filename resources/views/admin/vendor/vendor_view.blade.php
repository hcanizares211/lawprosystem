@extends('admin.layout.app')
@section('title','Vendor Detail')
@section('content')
  <div class="">

    <div class="page-title">
      <div class="title_left">
        <h3>{{ __('frontend.vendor_name') }} : <span>{{$name}}</span></h3>
      </div>


    </div>

        <style>
                /* Scoped styles for vendor detail page */
                .page-title h3 { color: #2c3e50; font-weight: 600; }
                .page-title h3 span { color: #2c3e50; font-weight: 600; }
                .x_panel { border-radius: 6px; border: 1px solid #e6e9ee; box-shadow: 0 1px 0 rgba(0,0,0,0.03); }
                .x_panel .x_content { padding: 24px; background: #fff; }
                .nav.nav-tabs.bar_tabs > li > a { color: #2c3e50; font-weight: 600; }
                .nav.nav-tabs.bar_tabs > li.active > a, .nav.nav-tabs.bar_tabs > li.active > a:focus { background: #f7f7f7; border-color: #e6e9ee; }
                .part p { margin: 0; color: #6c6f73; }
                .x_content .col-md-5 p b { color: #2c3e50; font-weight: 600; }
                .divider { display: block; height: 1px; background: #eef0f2; margin: 12px 0; }
                /* two-column detail alignment */
                .x_content .row { margin-bottom: 8px; }
                /* make sure long addresses wrap */
                .part p { word-break: break-word; }
                /* responsive tweaks */
                @media (max-width: 767px) {
                        .x_content .col-md-6 { width: 100%; float: none; }
                }
        </style>

    <div class="clearfix"></div>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_content">
            <div class="" role="tabpanel" data-example-id="togglable-tabs">
              <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                <li role="presentation" class="{{ request()->is('admin/vendor/*') ? 'active' : '' }}"><a href="{{route('vendor.show',$client->id)}}">{{__('frontend.vendor_detail')}}</a>
                </li>

                  @if($adminHasPermition->can(['expense_list']))
                <li role="presentation" class="{{ request()->is('admin/expense-account-list/*') ? 'active' : '' }}"><a href="{{url('admin/expense-account-list/'.$client->id)}}">{{__('frontend.accounts')}}</a>
                </li>
                @endif
              </ul><br><br>
              <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                  <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{__('frontend.name')}}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: @if($client->first_name!=null)  {{ $client->first_name.' '. $client->last_name }} @else {{'N/A'}}@endif </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{__('frontend.mobile')}}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>:  {{ $client->mobile ?? 'N/A' }} </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{ __('frontend.GSM') }}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: {{ $client->gst ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{__('frontend.country')}}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: {{ $client->country->name}} </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{__('frontend.state')}}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: {{ $client->state->name }} </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{__('frontend.city')}}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: {{ $client->city->name }} </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                  </div>
                  <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{ __('frontend.company_name') }}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: {{ $client->company_name ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{__('frontend.email_id')}}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: {{ $client->email ?? 'N/A' }} </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{ __('frontend.alternate_no') }}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>:{{ $client->alternate_no ?? 'N/A' }} </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{ __('frontend.PAN') }}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>:  {{ $client->pan ?? 'N/A' }} </p>
                        </div>
                    </div>
                    <li class="divider"></li>
                    <div class="row">
                        <div class="col-md-5">
                            <p><b>{{ __('frontend.address') }}</b></p>
                        </div>
                        <div class="col-md-7 part">
                            <p>: {{ $client->address ?? 'N/A' }}</p>
                        </div>
                    </div>
                    <li class="divider"></li>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
   </div>

  @include('admin.vendor.payment_made');
  @include('admin.vendor.payment_made_history');
@endsection
