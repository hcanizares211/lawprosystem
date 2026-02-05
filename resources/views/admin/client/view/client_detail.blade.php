@extends('admin.layout.app')
@section('title','Client Detail')
@section('content')

<style>
.client-header {
    background: #2c3e50;
    padding: 25px 30px;
    border-radius: 12px;
    margin-bottom: 25px;
    box-shadow: 0 8px 24px rgba(102, 126, 234, 0.3);
}

.client-header h4 {
    color: white;
    font-size: 24px;
    font-weight: 700;
    margin: 0;
}

.x_panel {
    border-radius: 12px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    border: none;
    overflow: hidden;
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
    padding: 18px 30px;
    font-weight: 600;
    color: #7f8c8d;
    transition: all 0.3s;
    position: relative;
    font-size: 15px;
}

.nav-tabs > li > a:hover {
    background: transparent;
    color: #667eea;
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

.x_content {
    padding: 30px;
}

.countries_list {
    width: 100%;
    margin-bottom: 20px;
}

.countries_list tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: all 0.2s;
}

.countries_list tbody tr:hover {
    background: #f8f9fa;
}

.countries_list td {
    padding: 15px 10px;
    font-size: 14px;
}

.countries_list td:first-child {
    color: #7f8c8d;
    font-weight: 500;
    width: 40%;
}

.countries_list td:last-child {
    color: #2c3e50;
    font-weight: 600;
}

.advocate-section {
    background: #2c3e50;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 4px 15px rgba(240, 147, 251, 0.3);
}

.advocate-section h4 {
    color: white;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 15px;
}

.advocate-section .countries_list {
    background: white;
    border-radius: 8px;
    padding: 10px;
}

.advocate-section .countries_list td {
    color: #2c3e50;
    border-bottom: 1px solid #f0f0f0;
}

.advocate-section .countries_list tr:last-child td {
    border-bottom: none;
}

.info-card {
    background: white;
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    height: 100%;
}

.info-label {
    display: inline-block;
    background: #e3f2fd;
    color: #1976d2;
    padding: 4px 12px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    margin-bottom: 8px;
}
</style>

    <div class="client-header">
        <h4><i class="fa fa-user"></i> {{ __('frontend.client.client_name') }}: {{$name}}</h4>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="{{ request()->is('admin/clients/*') ? 'active' : '' }}"><a
                                href="{{ route('clients.show', [$client->id]) }}"><i class="fa fa-id-card-o"></i> {{ __('frontend.client.client_detail') }}</a>
                        </li>

                        @if($adminHasPermition->can(['case_list']) =="1")
                            <li class="{{ request()->is('admin/client/case-list/*') ? 'active' : '' }}"
                                role="presentation"><a href="{{route('clients.case-list',[$client->id])}}"><i class="fa fa-gavel"></i> {{ __('frontend.client.cases') }}</a>
                            </li>
                        @endif


                        @if($adminHasPermition->can(['invoice_list']) =="1")
                            <li class="{{ request()->is('admin/client/account-list/*') ? 'active' : '' }}"
                                role="presentation"><a
                                    href="{{route('clients.account-list',[$client->id])}}"><i class="fa fa-credit-card"></i> {{ __('frontend.client.account') }}</a>
                            </li>
                        @endif
                    </ul>

                </div>

                <div class="x_content">

                    <div class="dashboard-widget-content">
                        <div class="col-md-6 hidden-small">
                            <div class="info-card">
                            <table class="countries_list">
                                <tbody>
                                <tr>
                                    <td>{{ __('frontend.client.client_name') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->full_name}}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.mobile') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->mobile ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.reference_name') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->reference_name ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.country') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->country->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.state') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->state->name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.city') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->city->name }}</td>
                                </tr>
                                </tbody>
                            </table>
                            </div>
                        </div>

                        <div class="col-md-6 hidden-small">
                            <div class="info-card">
                            <table class="countries_list">
                                <tbody>

                                <tr>
                                    <td>{{ __('frontend.client.email') }}</td>
                                    <td class="fs15 fw700 text-right s">{{ $client->email ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.alternate_no') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->alternate_no ?? '' }} </td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.reference_mobile') }}</td>
                                    <td class="fs15 fw700 text-right">{{ $client->reference_mobile ?? '' }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('frontend.client.address') }} </td>
                                    <td class="fs15 fw700 text-right">{{ $client->address ?? '' }}</td>

                                </tr>


                                </tbody>
                            </table>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12 col-sm-12 col-xs-12">
            @if(count($single)>0 && !empty($single))
                <div class="x_panel">

                    <div class="x_content">
                        <div class="dashboard-widget-content">
                            @php
                                $i=1;
                            @endphp
                            @if(isset($single) && !empty($single))
                                @foreach($single as $s)
                                    <div class="col-md-6 hidden-small">
                                        <div class="advocate-section">
                                        <h4><i class="fa fa-user-circle"></i> {{ __('frontend.client.advocate_name') }} {{$i}}</h4>


                                        <table class="countries_list">
                                            <tbody>

                                            <tr>
                                                <td><strong>{{$s->party_firstname.' '.$s->party_middlename.' '.$s->party_lastname }}</strong></td>

                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-phone"></i> {{ __('frontend.client.mobile') }}: {{ $s->party_mobile}}</td>

                                            </tr>
                                            <tr>
                                                <td><i class="fa fa-map-marker"></i> {{ __('frontend.client.address') }}: {{ $s->party_address}}</td>

                                            </tr>
                                            @if($client->client_type=="multiple")
                                                <tr>
                                                    <td><i class="fa fa-briefcase"></i> {{ __('frontend.client.advocate_name') }}: {{ $s->party_advocate}}</td>

                                                </tr>

                                            @endif


                                            </tbody>
                                        </table>
                                        </div>
                                    </div>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach

                            @endif


                        </div>
                    </div>
                </div>
            @endif
        </div>

    </div>
@endsection
