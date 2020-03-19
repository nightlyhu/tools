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
    <h5 class="title mb-4"><i class="mdi mdi-web"></i> Useful Links</h5>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header p-2">
                    <i class="mdi mdi-table-edit"></i> Converters & Editors
                </div>
                <div class="list-group">
                    <a href="https://www.aconvert.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Audio, doc, etc. file converter
                    </a>
                    <a href="https://konklone.io/json/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Convert JSON to CSV file
                    </a>
                    <a href="https://jsonformatter.org/json-editor"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> JSON Online Editor
                    </a>
                    <a href="https://jsonformatter.org/xml-editor"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> XML Online Editor
                    </a>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header p-2">
                    <i class="mdi mdi-table"></i> Cheatsheets
                </div>
                <div class="list-group">
                    <a href="https://devhints.io/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Devhints.io - TL;DR for developer docs.
                    </a>
                    <a href="https://htmlcheatsheet.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> HTML/CSS/JS Cheatsheets
                    </a>
                    <a href="https://css-tricks.com/snippets/css/named-colors-and-hex-equivalents/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Color Names - list & codes
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header p-2">
                    <i class="mdi mdi-image-search-outline"></i> Icons & Stock images
                </div>
                <div class="list-group">
                    <a href="https://materialdesignicons.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> MaterialDesignIcons (MDI)
                    </a>
                    <a href="https://fontawesome.com"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Font Awesome (FA)
                    </a>
                    <a href="https://www.iconfinder.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> IconFinder.com - Icons
                    </a>
                    <a href="http://flaticon.com"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> FlatIcon.com - Icons
                    </a>
                    <a href="https://iconmonstr.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> iconmonstr.com - Icons
                    </a>
                    <a href="http://pixabay.com"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Pixabay.com - Stock images
                    </a>
                    <a href="https://freepik.com"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Freepik.com - Stock images
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header p-2">
                    <i class="mdi mdi-web"></i> Web development
                </div>
                <div class="list-group">
                    <a href="https://caniuse.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Can I use...?
                    </a>
                    <a href="https://developer.mozilla.org/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> MDN web docs
                    </a>
                    <a href="https://placeimg.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Placeholder image (PlaceIMG)
                    </a>
                    <a href="https://picsum.photos/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Placeholder image (LoremPicsum)
                    </a>
                    <a href="https://www.lipsum.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Placeholder text (LoremIpsum)
                    </a>
                    <a href="https://www.getpostman.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Postman - API testing
                    </a>
                    <a href="https://search.google.com/search-console"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Google Search Console
                    </a>
                    <a href="https://developers.google.com/web/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Google Developers - Web docs & tools
                    </a>
                    <a href="https://web.dev/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> web.dev by Google
                    </a>
                    <a href="https://css-tricks.com/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> CSS-Tricks.com - Tutorials, Snippets, etc.
                    </a>
                    <a href="http://quirktools.com/screenfly/"
                       target="_blank" class="list-group-item list-group-item-action p-2">
                        <i class="mdi mdi-chevron-double-right"></i> Screenfly - Website resolution testing
                    </a>
                </div>
            </div>
        </div>
    </div>
@stop
