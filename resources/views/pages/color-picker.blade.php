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
    <script src="{{ asset('js/tools-color-picker.js') }}" type="module"></script>
@endsection
@section('content')
    <h5 class="title mb-4 text-uppercase"><i class="mdi mdi-palette"></i> Color Picker</h5>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header p-2">
                    <i class="mdi mdi-eyedropper-variant"></i> Select color
                </div>
                <div class="card-body">
                    <div id="colorPicker" class="colorPicker-toolpage mb-2" data-color="{{ $color }}"></div>
                    <input type="text" class="form-control form-control-sm mb-2" value="#{{ $color }}" id="colorPicker-color"
                           placeholder="Color code (hex, rgb)"/>
                    <a href="javascript:void(0)" id="colorPicker-random"
                       class="btn btn-sm btn-block btn-outline-secondary">
                        <i class="mdi mdi-shuffle-variant"></i> Random color
                    </a>
                    <a href="javascript:void(0)" id="colorPicker-share"
                       class="btn btn-sm btn-block btn-outline-secondary">
                        <i class="mdi mdi-content-copy"></i> Copy link to share
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header p-2">
                    <i class="mdi mdi-invert-colors"></i> Color information
                </div>
                <table class="table table-bordered table-striped table-sm mb-0">
                    <tr>
                        <td style="width: 15%" class="font-weight-bold">Hex</td>
                        <td style="width: 35%">
                            <span id="colorPicker-hex">-</span>
                            <a href="javascript:void(0)" id="colorPicker-hex-copy"
                               title="Copy to clipboard" data-toggle="tooltip" class="text-success float-right">
                                <i class="mdi mdi-content-copy mr-2"></i>
                            </a>
                        </td>
                        <td style="width: 20%" class="font-weight-bold">Hex8</td>
                        <td>
                            <span id="colorPicker-hex8">-</span>
                            <a href="javascript:void(0)" id="colorPicker-hex8-copy"
                               title="Copy to clipboard" data-toggle="tooltip" class="text-success float-right">
                                <i class="mdi mdi-content-copy mr-2"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">RGB</td>
                        <td>
                            <span id="colorPicker-rgb" data-toggle="tooltip" title="Red, Green, Blue">-</span>
                            <a href="javascript:void(0)" id="colorPicker-rgb-copy"
                               title="Copy to clipboard" data-toggle="tooltip" class="text-success float-right">
                                <i class="mdi mdi-content-copy mr-2"></i>
                            </a>
                        </td>
                        <td style="width: 15%" class="font-weight-bold">Brightness</td>
                        <td>
                            <span id="colorPicker-brightness">-</span>
                            &nbsp;
                            <i class="mdi mdi-brightness-6"></i>
                            <span id="colorPicker-brightness-info">-</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">HSL</td>
                        <td>
                            <span id="colorPicker-hsl" data-toggle="tooltip" title="Hue, Saturation, Lightness">-</span>
                            <a href="javascript:void(0)" id="colorPicker-hsl-copy"
                               title="Copy to clipboard" data-toggle="tooltip" class="text-success float-right">
                                <i class="mdi mdi-content-copy mr-2"></i>
                            </a>
                        </td>
                        <td class="font-weight-bold">Alpha</td>
                        <td>
                            <span id="colorPicker-alpha">-</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">HSV</td>
                        <td>
                            <span id="colorPicker-hsv" data-toggle="tooltip" title="Hue, Saturation, Value">-</span>
                            <a href="javascript:void(0)" id="colorPicker-hsv-copy"
                               title="Copy to clipboard" data-toggle="tooltip" class="text-success float-right">
                                <i class="mdi mdi-content-copy mr-2"></i>
                            </a>
                        </td>
                        <td class="font-weight-bold">Name</td>
                        <td>
                            <span id="colorPicker-name">-</span>
                            <a href="https://css-tricks.com/snippets/css/named-colors-and-hex-equivalents/"
                               target="_blank"
                               title="Open list of color names" data-toggle="tooltip" class="text-success float-right">
                                <i class="mdi mdi-palette mr-2"></i>
                            </a>
                            <a href="http://www.colors.commutercreative.com/" target="_blank"
                               title="Random color name" data-toggle="tooltip" class="text-success float-right">
                                <i class="mdi mdi-shuffle-variant mr-2"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td class="font-weight-bold">RGB colors</td>
                        <td>
                            <span id="colorPicker-rgbColors"></span>
                        <td class="font-weight-bold">CMYK colors</td>
                        <td>
                            <span id="colorPicker-cmykColors"></span>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card mt-4">
                <div class="card-header p-2">
                    <i class="mdi mdi-palette"></i> Combinations
                </div>
                <div class="card-body p-2" id="colorPicker-combination">
                    <div class="colorPicker-combination-title">
                        Analogous
                    </div>
                    <div class="colorPicker-combination-list">
                        <div id="colorPicker-analogous"></div>
                    </div>
                    <div class="colorPicker-combination-title">
                        Monochromatic
                    </div>
                    <div class="colorPicker-combination-list">
                        <div id="colorPicker-monochromatic"></div>
                    </div>
                    <div class="colorPicker-combination-multicell">
                        <div class="colorPicker-combination-cell" style="min-width: 40%;">
                            <div class="colorPicker-combination-title">
                                Triad
                            </div>
                            <div class="colorPicker-combination-list">
                                <div id="colorPicker-triad"></div>
                            </div>
                        </div>
                        <div class="colorPicker-combination-cell">
                            <div class="colorPicker-combination-title">
                                Split Complement
                            </div>
                            <div class="colorPicker-combination-list">
                                <div id="colorPicker-splitcomplement"></div>
                            </div>
                        </div>
                    </div>
                    <div class="colorPicker-combination-title">
                        Tetrad
                    </div>
                    <div class="colorPicker-combination-list">
                        <div id="colorPicker-tetrad"></div>
                    </div>
                    <div class="colorPicker-combination-title">
                        Transformation
                    </div>
                    <div class="colorPicker-combination-list">
                        <div id="colorPicker-transform"></div>
                    </div>
                    <div class="colorPicker-combination-title">
                        Lighten - Darken
                    </div>
                    <div class="colorPicker-combination-list">
                        <div id="colorPicker-lighten"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
