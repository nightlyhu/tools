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
@section('content')
    <h5 class="title mb-4"><i class="mdi mdi-information-outline"></i> About</h5>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-2">
                    What's this?
                </div>
                <div class="card-body p-2">
                    The "Developer Tools" app is a place to find useful tools and links.<br><br>
                    <b>Currently available features:</b><br>
                    <i class="mdi mdi-chevron-double-right text-success"></i> Mini tools: IP/Host lookup, generators, converters...<br>
                    <i class="mdi mdi-chevron-double-right text-success"></i> Color Picker tool<br>
                    <i class="mdi mdi-chevron-double-right text-success"></i> Useful links for developers<br>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header p-2">
                    Development
                </div>
                <div class="card-body p-2">
                    <i class="mdi mdi-account-outline"></i> Vincze Tamás Zoltán<br>
                    <i class="mdi mdi-web"></i>
                    <a class="text-success" href="http://vitamas.hu" target="_blank">vitamas.hu</a><br>
                    <i class="mdi mdi-email-outline"></i>
                    <a class="text-success" href="mailto:prog@vitamas.hu">prog@vitamas.hu</a><br>
                    <i class="mdi mdi-twitter"></i>
                    <a class="text-success" href="https://twitter.com/vitozyhun" target="_blank">vitozyhun</a><br>

                    <br>
                    <a href="https://vitozy.dev">
                        <img src="https://vitozy.dev/images/logo_v2.png" alt="Logo" style="width: 150px"/>
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
