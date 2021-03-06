<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('page-title') - {{ config('app.name', 'Support Ticket') }}
    </title>

    <link rel="shortcut icon" href="{{asset(Storage::url('logo/favicon.png'))}}">

    <!-- Font Awesome 5 -->
    <link rel="stylesheet" href="{{ asset('assets/libs/@fontawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/animate.css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-timepicker/css/bootstrap-timepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/libs/select2/dist/css/select2.min.css') }}">

    @stack('css-page')

    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/ac.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @if(env('SITE_RTL')=='on')
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-rtl.css') }}">
    @endif
</head>

<body class="application application-offset">

<div class="container-fluid container-application">

    <script>
        var dataTableLang = {
            paginate: {previous: "<i class='fas fa-angle-left'>", next: "<i class='fas fa-angle-right'>"},
            lengthMenu: "{{__('Show')}} _MENU_ {{__('entries')}}",
            zeroRecords: "{{__('No data available in table.')}}",
            info: "{{__('Showing')}} _START_ {{__('to')}} _END_ {{__('of')}} _TOTAL_ {{__('entries')}}",
            infoEmpty: "{{ __('Showing 0 to 0 of 0 entries') }}",
            infoFiltered: "{{ __('(filtered from _MAX_ total entries)') }}",
            search: "{{__('Search:')}}",
            thousands: ",",
            loadingRecords: "{{ __('Loading...') }}",
            processing: "{{ __('Processing...') }}"
        }
    </script>

    @include('admin.partials.sidebar')

    <div class="main-content position-relative">

        @include('admin.partials.topnav')

        <div class="page-content">
            <div class="page-title">
                <div class="row justify-content-between align-items-center">
                    @if(trim($__env->yieldContent('page-title')))
                        <div class="col-xl-5 col-lg-4 col-md-6 col-sm-6 d-flex align-items-center justify-content-between justify-content-md-start">
                            <div class="d-inline-block">
                                <h5 class="d-inline-block mb-0">@yield('page-title')</h5>
                            </div>
                        </div>
                    @endif
                    <div class="col-xl-7 col-lg-8 col-md-6  d-flex align-items-center justify-content-between justify-content-md-end">
                        <div class="row d-flex justify-content-end align-items-center">
                            @if(trim($__env->yieldContent('action-button')))
                                <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6 col-6 pt-lg-3 pt-xl-2">
                                    <div class="all-button-box mb-3">
                                        @yield('action-button')
                                    </div>
                                </div>
                            @elseif(trim($__env->yieldContent('multiple-action-button')))
                                @yield('multiple-action-button')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @yield('content')
        </div>
        @include('admin.partials.footer')
    </div>
</div>

<div class="modal fade" id="commonModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div>
                <h4 class="h4 font-weight-400 float-left modal-title" id="exampleModalLabel"></h4>
                <a href="#" class="more-text widget-text float-right close-icon" data-dismiss="modal" aria-label="Close">{{__('Close')}}</a>
            </div>
            <div class="modal-body">
                <div class="card card-box">
                </div>
            </div>
        </div>
    </div>
</div>

@php
    \App::setLocale(env('DEFAULT_LANG'));
    $currantLang = 'en';
@endphp

<script src="{{ asset('assets/js/site.core.js') }}"></script>

<script src="{{ asset('assets/libs/progressbar.js/dist/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/libs/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-timepicker/js/bootstrap-timepicker.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('assets/libs/select2/dist/js/select2.min.js') }}"></script>
<script src="{{ asset('assets/libs/nicescroll/jquery.nicescroll.min.js')}} "></script>
<script src="{{ asset('assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
<script src="https://js.pusher.com/5.0/pusher.min.js"></script>

<!-- Site JS -->
<script src="{{ asset('assets/js/letter.avatar.js') }}"></script>
<script src="{{ asset('assets/js/fire.modal.js') }}"></script>
<script src="{{ asset('assets/js/site.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script>
    var date_picker_locale = {
        format: 'YYYY-MM-DD',
        daysOfWeek: [
            "{{__('Sun')}}",
            "{{__('Mon')}}",
            "{{__('Tue')}}",
            "{{__('Wed')}}",
            "{{__('Thu')}}",
            "{{__('Fri')}}",
            "{{__('Sat')}}"
        ],
        monthNames: [
            "{{__('January')}}",
            "{{__('February')}}",
            "{{__('March')}}",
            "{{__('April')}}",
            "{{__('May')}}",
            "{{__('June')}}",
            "{{__('July')}}",
            "{{__('August')}}",
            "{{__('September')}}",
            "{{__('October')}}",
            "{{__('November')}}",
            "{{__('December')}}"
        ],
    };
    var calender_header = {
        today: "{{__('today')}}",
        month: '{{__('month')}}',
        week: '{{__('week')}}',
        day: '{{__('day')}}',
        list: '{{__('list')}}'
    };
</script>


@if(App\Models\Utility::getValByName('gdpr_cookie') == 'on')
<script type="text/javascript">

    var defaults = {
    'messageLocales': {
        /*'en': 'We use cookies to make sure you can have the best experience on our website. If you continue to use this site we assume that you will be happy with it.'*/
        'en': "{{App\Models\Utility::getValByName('cookie_text')}}"
    },
    'buttonLocales': {
        'en': 'Ok'
    },
    'cookieNoticePosition': 'bottom',
    'learnMoreLinkEnabled': false,
    'learnMoreLinkHref': '/cookie-banner-information.html',
    'learnMoreLinkText': {
      'it': 'Saperne di pi??',
      'en': 'Learn more',
      'de': 'Mehr erfahren',
      'fr': 'En savoir plus'
    },
    'buttonLocales': {
      'en': 'Ok'
    },
    'expiresIn': 30,
    'buttonBgColor': '#d35400',
    'buttonTextColor': '#fff',
    'noticeBgColor': '#051c4b',
    'noticeTextColor': '#fff',
    'linkColor': '#009fdd'
};
</script>
<script src="{{ asset('assets/js/cookie.notice.js')}}"></script>
@endif



@stack('scripts')
@if(Session::has('success'))
    <script>
        show_toastr('{{__('Success')}}', '{!! session('success') !!}', 'success');
    </script>
@endif
@if(Session::has('error'))
    <script>
        show_toastr('{{__('Error')}}', '{!! session('error') !!}', 'error');
    </script>
@endif
</body>
</html>
