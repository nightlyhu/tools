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
@section('styles')
    <link rel="stylesheet"
          href="//cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.0.3/dist/css/bootstrap-colorpicker.min.css">
@endsection
@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/bootstrap-colorpicker@3.0.3/dist/js/bootstrap-colorpicker.js"></script>
    <script src="//cdn.jsdelivr.net/npm/tinycolor2@1.4.1/dist/tinycolor-min.js"></script>
    <script src="{{ asset('js/tools-generators.js') }}" type="module"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-6">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-shield-key-outline"></i> Hash generator</h5>
            <div class="row no-gutters">
                <div class="col-auto p-2">
                    <img src="{{ asset('images/tools/shield.png')}}" style="width: 75px">
                </div>
                <div class="col p-2 pl-3 pr-5">
                    <div>
                        <input class="form-control form-control-sm mb-1" id="hashGenerator-text" type="text"
                               placeholder="Plain text">
                        <select class="form-control form-control-sm mb-1" id="hashGenerator-algorithm" title="Algorithm"
                                data-toggle="tooltip">
                            <option value="md5">MD5</option>
                            <option value="sha1">SHA1</option>
                            <option value="bcrypt">Bcrypt</option>
                        </select>
                        <button class="btn btn-outline-secondary btn-sm" type="button" id="hashGenerator-make">
                            <i class="mdi mdi-settings-outline"></i> Generate
                        </button>
                        <br>
                        <div id="hashGenerator-result" class="mt-2" style="display: none">
                            <b>Result:</b>
                            <a href="javascript:void(0)" id="hashGenerator-remove"
                               title="Remove" data-toggle="tooltip" class="text-success">
                                <i class="mdi mdi-trash-can-outline"></i>
                            </a>
                            <a href="javascript:void(0)" id="hashGenerator-copy"
                               title="Copy to clipboard" data-toggle="tooltip" class="text-success">
                                <i class="mdi mdi-content-copy"></i>
                            </a>
                            <br>
                            <span id="hashGenerator-result-value"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <h5 class="mb-3 text-uppercase"><i class="mdi mdi-lock-outline"></i> Password generator</h5>
            <div class="row no-gutters">
                <div class="col-auto p-2">
                    <img src="{{ asset('images/tools/password.png')}}" style="width: 75px">
                </div>
                <div class="col p-2 pl-3 pr-5">
                    <div>
                        <input class="form-control form-control-sm mb-1" id="passGenerator-length"
                               type="number" min="0" step="1" placeholder="Length">
                        <select class="form-control form-control-sm mb-1"
                                id="passGenerator-strength" title="Strength" data-toggle="tooltip">
                            <option value="lowercase-letters">Lowercase letters (a-z)</option>
                            <option value="uppercase-letters">Uppercase letters (A-Z)</option>
                            <option value="letters">Letters (a-z,A-Z)</option>
                            <option value="numbers">Numbers (0-9)</option>
                            <option value="alphanumeric" selected>Alphanumeric (0-9,a-z,A-Z)</option>
                            <option value="symbols">With symbols (e.g. -_.)</option>
                            <option value="strong-symbols">With strong symbols (e.g. @#$%)</option>
                        </select>
                        <button class="btn btn-outline-secondary btn-sm" type="button" id="passGenerator-make">
                            <i class="mdi mdi-settings-outline"></i> Generate
                        </button>
                        <br>
                        <div id="passGenerator-result" class="mt-2" style="display: none">
                            <b>Result:</b>
                            <a href="javascript:void(0)" id="passGenerator-remove"
                               title="Remove" data-toggle="tooltip" class="text-success">
                                <i class="mdi mdi-trash-can-outline"></i>
                            </a>
                            <a href="javascript:void(0)" id="passGenerator-copy"
                               title="Copy to clipboard" data-toggle="tooltip" class="text-success">
                                <i class="mdi mdi-content-copy"></i>
                            </a>
                            <br>
                            <span id="passGenerator-result-value"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-page-next-outline"></i> Encode/Decode</h5>
    <div class="row no-gutters">
        <div class="col-auto p-2">
            <img src="{{ asset('images/tools/coding.png')}}" style="width: 75px">
        </div>
        <div class="col-sm-6 p-2 pl-3">
            <div>
                <textarea id="encoder-input" rows="2" class="form-control" placeholder="Source"></textarea>

                <div class="input-group input-group-sm mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Method:</span>
                    </div>
                    <select id="encoder-method" class="form-control form-control-sm">
                        <option value="base64" selected>Base64</option>
                        <option value="url">URL Encoding</option>
                    </select>
                    <div class="input-group-prepend">
                        <span class="input-group-text">Action:</span>
                    </div>
                    <select id="encoder-action" class="form-control form-control-sm">
                        <option value="encode" selected>Encoding</option>
                        <option value="decode">Decoding</option>
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary btn-sm" id="encoder-make">
                            <i class="mdi mdi-settings"></i> Coding
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div id="encoder-result" class="p-2" style="display: none">
                <b>Result:</b>
                <a href="javascript:void(0)" id="encoder-remove"
                   title="Remove" data-toggle="tooltip" class="text-success">
                    <i class="mdi mdi-trash-can-outline"></i>
                </a>
                <a href="javascript:void(0)" id="encoder-copy"
                   title="Copy to clipboard" data-toggle="tooltip" class="text-success">
                    <i class="mdi mdi-content-copy"></i>
                </a>
                <br>
                <span id="encoder-result-value"></span>
            </div>
        </div>
    </div>
    <br>
    <h5 class="mb-3 text-uppercase"><i class="mdi mdi-text-subject"></i> String transform</h5>
    <div class="row no-gutters">
        <div class="col-auto p-2">
            <img src="{{ asset('images/tools/documents.png')}}" style="width: 75px">
        </div>
        <div class="col-sm-4 p-2 pl-3">
            <textarea id="textTransform-input" rows="4" class="form-control mb-1" placeholder="Source"></textarea>
        </div>
        <div class="col-sm-3 p-2">
            <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" id="textTransform-multiple">
                <label class="custom-control-label" for="textTransform-multiple">Multiple string (per lines)</label>
            </div>
            <select class="form-control form-control-sm mb-2"
                    id="textTransform-action" title="Action" data-toggle="tooltip">
                <option value="uppercase">Uppercase</option>
                <option value="lowercase">Lowercase</option>
                <option value="title-case">Title Case</option>
                <option value="slugify">Slugify</option>
            </select>
            <button class="btn btn-outline-secondary btn-sm" type="button" id="textTransform-transform">
                <i class="mdi mdi-settings-outline"></i> Transform
            </button>
        </div>
        <div class="col">
            <div id="textTransform-result" class="p-2" style="display: none">
                <b>Result:</b>
                <a href="javascript:void(0)" id="textTransform-remove"
                   title="Remove" data-toggle="tooltip" class="text-success">
                    <i class="mdi mdi-trash-can-outline"></i>
                </a>
                <a href="javascript:void(0)" id="textTransform-copy"
                   title="Copy to clipboard" data-toggle="tooltip" class="text-success">
                    <i class="mdi mdi-content-copy"></i>
                </a>
                <br>
                <span id="textTransform-result-value"></span>
            </div>
        </div>
    </div>
    <br>
@stop
