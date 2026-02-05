<br>
<style>
    .nav.nav-tabs.bar_tabs {border-bottom: none;}
    .nav.nav-tabs.bar_tabs > li > a {
        background: #f7f7f7;
        color: #2c3e50;
        border: 1px solid #e6e6e6;
        border-bottom: 0;
        border-radius: 6px 6px 0 0;
        padding: 10px 18px;
        margin-right: 8px;
        font-weight: 600;
    }
    .nav.nav-tabs.bar_tabs > li.active > a,
    .nav.nav-tabs.bar_tabs > li > a:hover {
        background: #ffffff;
        color: #2c3e50;
        box-shadow: 0 1px 0 rgba(0,0,0,0.03);
    }
    .nav.nav-tabs.bar_tabs > li {margin-bottom: -1px;}
    /* Keep panel border subtle */
    .x_panel {border: 1px solid #e6e6e6;}
</style>

<div class="" role="tabpanel" data-example-id="togglable-tabs">
    <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
        <li class="{{ Request::segment(2)=='general-setting' ? 'active' :'' }}" role="presentation"><a
                href="{{ url('admin/general-setting') }}">{{__('frontend.company_details')}}</a>
        </li>
        <li class="{{ Request::segment(2)=='date-timezone' ? 'active' :'' }}"
            role="presentation" class=""><a href="{{ url('admin/date-timezone') }}">{{__('frontend.date_time_zone')}}</a>

        </li>

        <li class="{{ Request::segment(2)=='mail-setup' ? 'active' :'' }}"
            role="presentation" class=""><a href="{{ url('admin/mail-setup') }}">{{__('frontend.mail_setup')}}</a>
        </li>

        <li class="{{ Request::segment(2)=='invoice-setting' ? 'active' :'' }}" role="presentation" class=""><a
                href="{{ url('admin/invoice-setting') }}">{{__('frontend.invoice_setting')}}</a>
        </li>
    </ul>

</div>
