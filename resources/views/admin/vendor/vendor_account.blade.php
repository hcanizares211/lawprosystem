@extends('admin.layout.app')
@section('title', 'Vendor Account')
@section('content')
    <div class="">

        <div class="page-title">
            <div class="title_left">
                <h3>{{ __('frontend.vendor_name') }} : <span>{{ $name }}</span></h3>
            </div>


        </div>
        <style>
            /* Scoped styles for vendor account list */
            .page-title h3 { color: #2c3e50; font-weight: 600; }
            .x_panel { border-radius: 6px; border: 1px solid #e6e9ee; box-shadow: 0 1px 0 rgba(0,0,0,0.03); }
            .x_panel .x_content { padding: 20px; background: #fff; }
            .nav.nav-tabs.bar_tabs > li > a { color: #2c3e50; font-weight: 600; }
            .nav.nav-tabs.bar_tabs > li.active > a, .nav.nav-tabs.bar_tabs > li.active > a:focus { background: #f7f7f7; border-color: #e6e9ee; }
            table.table { width: 100%; }
            table.table thead th { background: #2c3e50; color: #fff; font-weight: 600; padding: 12px; }
            table.table tbody td { padding: 14px; vertical-align: middle; color: #6c6f73; }
            .dataTables_wrapper .dataTables_paginate .paginate_button { background: #eee; border: none; }
            .dataTables_wrapper .dataTables_paginate .paginate_button.current { background: #2c3e50; color: #fff !important; }
            @media (max-width: 767px) {
                .page-title h3 { font-size: 18px; }
                table.table thead th { font-size: 12px; }
            }
        </style>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" class="{{ request()->is('admin/vendor/*') ? 'active' : '' }}"><a
                                        href="{{ route('vendor.show', $client->id) }}">{{ __('frontend.vendor_detail') }}</a>
                                </li>

                                @if ($adminHasPermition->can(['expense_list']))
                                    <li role="presentation"
                                        class="{{ request()->is('admin/expense-account-list/*') ? 'active' : '' }}"><a
                                            href="{{ url('admin/expense-account-list/' . $client->id) }}">{{ __('frontend.accounts') }}</a>
                                    </li>
                                @endif
                            </ul>
                            <br><br>
                            <div id="myTabContent" class="tab-content">


                                <table id="VendorAccountDatatable" class="table"
                                    data-url="{{ url('admin/expense-filter-list') }}" data-vendor="{{ $client->id }}">
                                    <thead>
                                        <tr>
                                            <th width="3%">{{ __('frontend.no') }}</th>
                                            <th width="15%">{{ __('frontend.invoice_no') }}</th>
                                            <th width="20%">{{ __('frontend.vendor') }}</th>
                                            <th width="10%">{{ __('frontend.amount') }}</th>
                                            <th width="15%">{{ __('frontend.paid_amount') }}</th>
                                            <th width="15%">{{ __('frontend.amount') }}</th>
                                            <th width="8%">{{ __('frontend.status') }}</th>
                                            <th width="5%">{{ __('frontend.action') }}</th>
                                        </tr>
                                    </thead>

                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="load-modal"></div>


@endsection
@push('js')
    <script src="{{ asset('assets/js/vendor/vendor-account-datatable.js') }}"></script>
@endpush
