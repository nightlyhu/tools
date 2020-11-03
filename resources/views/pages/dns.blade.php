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
    <h5 class="mb-3 text-uppercase text-center"><i class="mdi mdi-web"></i> DNS lookup</h5>
    <br>
    <div class="text-center mb-3">
        <div class="input-group w-50 mx-auto">
            <input type="text" class="form-control" placeholder="Domain address" id="dns-domain"
                   value="{{ $domain ?? "" }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button" id="dns-domain-action">
                    <i class="mdi mdi-dns-outline"></i> Get DNS records
                </button>
            </div>
        </div>
    </div>

    @if(!$records->isEmpty())
        @foreach($records as $type => $items)
            @if(!in_array($type, ["A","AAAA", "MX", "TXT", "NS"])) @continue @endif

            <h4>
                <span class="badge badge-success">{{ $type }}</span>
            </h4>
            <table class="table table-striped table-sm table-bordered">
                <thead>
                <tr>
                    <th scope="col" class="p-2">Host</th>
                    <th scope="col" class="p-2">Class</th>
                    <th scope="col" class="p-2">TTL</th>
                    @if($type === "MX")
                        <th scope="col" class="p-2">Priority</th>
                    @endif
                    @if(in_array($type, ["A"]))
                        <th scope="col" class="p-2">IP</th>
                    @endif
                    @if(in_array($type, ["AAAA"]))
                        <th scope="col" class="p-2">IPv6</th>
                    @endif
                    @if(in_array($type, ["NS", "MX"]))
                        <th scope="col" class="p-2">Target</th>
                    @endif
                    @if($type === "TXT")
                        <th scope="col" class="p-2">TXT</th>
                    @endif
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr>
                         <td class="p-2">{{ $item->host ?? "N/A" }}</td>
                         <td class="p-2">{{ $item->class ?? "N/A" }}</td>
                         <td class="p-2">{{ $item->ttl ?? "N/A" }}</td>
                        @if($type === "MX")
                             <td class="p-2">{{ $item->pri ?? "N/A" }}</td>
                        @endif
                        @if(in_array($type, ["A"]))
                             <td class="p-2">{{ $item->ip ?? "N/A" }}</td>
                        @endif
                        @if(in_array($type, ["AAAA"]))
                             <td class="p-2">{{ $item->ipv6 ?? "N/A" }}</td>
                        @endif
                        @if(in_array($type, ["NS", "MX"]))
                             <td class="p-2">{{ $item->target ?? "N/A" }}</td>
                        @endif
                        @if($type === "TXT")
                             <td class="p-2">{{ $item->txt ?? "N/A" }}</td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endforeach
    @endif
@stop
