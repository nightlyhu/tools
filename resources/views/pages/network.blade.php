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
    <script src="{{ asset('js/tools-generators.js') }}" type="module"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-ip-network-outline"></i> IP/Domain lookup</h5>
            <div class="row no-gutters">
                <div class="col-auto p-2">
                    <img src="{{ asset('images/tools/domain.png')}}" style="width: 75px">
                </div>
                <div class="col p-2 pl-3 pr-5">
                    <div>
                        <input class="form-control form-control-sm mb-1" id="ipLookup-what" type="text"
                               placeholder="IP address or domain">
                        <button class="btn btn-outline-secondary btn-sm" type="button" id="ipLookup-search">
                            <i class="mdi mdi-magnify"></i> Lookup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    @include('pages.iplookup-modal')
@stop
