@extends('layouts.tools')
@section('meta')
    <meta name="description" content="Developer tools."/>
    <meta name="twitter:card" content="summary"/>
    <meta name="twitter:site" content="@vitozyhun"/>
    <meta name="twitter:creator" content="@vitozyhun"/>
    <meta property="og:title" content="Developer Tools by Nightly.hu"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="http://tools.nightly.hu"/>
    <meta property="og:description" content="Developer tools."/>
    <meta property="og:locale" content="hu_HU"/>
@endsection
@section('scripts')
    <script src="{{ asset('js/tools-home.js') }}" type="module"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6 p-2">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-network-outline"></i> Your IP/Host</h5>
            <div class="row no-gutters">
                <div class="col-auto p-2">
                    <img src="{{  asset('images/tools/wifi.png')}}" style="width: 75px">
                </div>
                <div class="col-auto p-2 pl-3">
                    <b>IP:</b> {{ $yourIP }}<br>
                    <b>Host:</b> {{ $yourHost }}<br>
                    <a href="https://whatismyipaddress.com/ip/{{ $yourIP }}"
                       class="text-info d-block mt-1" target="_blank">
                        <i class="mdi mdi-magnify"></i> More information
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-monitor"></i> Your screen & computer</h5>
            <div class="row no-gutters">
                <div class="col-auto p-2">
                    <img src="{{ asset('images/tools/computer.png') }}" style="width: 75px">
                </div>
                <div class="col-auto p-2 pl-3">
                    <b>OS:</b> {{ $yourOS }}<br>
                    <b>Platform:</b> <span id="yourPlatform"></span><br>
                    <b>Resolution:</b> <span id="yourScreenRes"></span><br>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 p-2">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-web"></i> Your browser</h5>
            <div class="row no-gutters">
                <div class="col-auto p-2">
                    <img src="{{ asset('images/tools/' . $browser->app . '.png')}}" style="width: 75px">
                </div>
                <div class="col p-2 pl-3">
                    <b>Name:</b> {{ $browser->name }}<br>
                    <b>Version:</b> {{ $browser->version }}<br>
                    <b>User Agent:</b> {{ $browser->useragent }}<br>
                </div>
            </div>
        </div>
        <div class="col-md-6 p-2">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-clock-outline"></i> Time information</h5>
            <div class="row no-gutters">
                <div class="col-auto p-2">
                    <img src="{{ asset('images/tools/hourglass.png') }}" style="width: 75px">
                </div>
                <div class="col-auto p-2 pl-3">
                    <b>Date:</b> <span id="timeClock"></span><br>
                    <b>Timezone:</b> <span id="timeZone"></span><br>
                    <b>Current week:</b> <span id="timeWeek"></span><br>
                    <b>Current day:</b> <span id="timeDay"></span><br>
                </div>
            </div>
        </div>
    </div>
    <br>
@stop
