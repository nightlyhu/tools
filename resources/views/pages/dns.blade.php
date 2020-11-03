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
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-ip-network-outline"></i> DNS lookup</h5>

        </div>
    </div>
    <br>

    @include('pages.iplookup-modal')
@stop
