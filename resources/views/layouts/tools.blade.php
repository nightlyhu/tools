<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content="Nightly.hu Tools"/>
    <meta name="author" content="Vincze Tamás Zoltán"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <base href="/"/>

    <title>{{ $title }}</title>

    @yield('meta')

    <link rel="icon" type="image/png" href="{{ url('tools-favicon.png') }}"/>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.materialdesignicons.com/5.0.45/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.css" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/izitoast@1.3.0/dist/css/iziToast.min.css" rel="stylesheet">
    <link href="{{ asset('css/tools.css') }}" rel="stylesheet"/>

    @yield('styles')
</head>

<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">
        <a href="{{ url('/') }}" class="text-muted">
            <i class="mdi mdi-code-braces"></i> Developer Tools
        </a>
    </h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{ url('/') }}"><i class="mdi mdi-home-outline"></i> Home</a>
        <a class="p-2 text-dark" href="{{ url('generators') }}"><i class="mdi mdi-wrench"></i> Generators</a>
        <a class="p-2 text-dark" href="{{ url('network') }}"><i class="mdi mdi-web"></i> Network</a>
        <a class="p-2 text-dark" href="{{ url('color-picker') }}"><i class="mdi mdi-eyedropper-variant"></i> Color
            Picker</a>
    </nav>
    <a class="btn btn-outline-success" href="{{ url('links') }}">
        <i class="mdi mdi-link"></i> Useful links
    </a>
</div>

<div class="container pt-2 pb-4 pr-4 pl-4 text-muted" id="main-content">
    @yield('content')
</div>

<footer class="border-top">
    <div class="container p-4 text-muted">
        <div class="row">
            <div class="col-12 col-md">
                <small class="d-block mb-3 text-muted">
                    <span class="text-uppercase font-weight-bold" style="font-size: 17px">
                        Developer Tools
                    </span><br>
                    &copy; 2019-{{ date('Y') }} <a href="http://vitamas.hu" class="text-muted">Vincze Tamás Zoltán</a>
                </small>

                <br>
                <b>Created by </b> &nbsp;
                <a href="https://vitozy.dev">
                    <img src="https://vitozy.dev/images/logo_v2.png" alt="Logo" style="width: 100px"/>
                </a>
            </div>
            <div class="col-6 col-md">
                <h5>Features</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="{{ url('/') }}">
                            <i class="mdi mdi-home"></i> Home
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="{{ url('generators') }}">
                            <i class="mdi mdi-wrench"></i> Generators
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="{{ url('network') }}">
                            <i class="mdi mdi-web"></i> Network
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="{{ url('links') }}">
                            <i class="mdi mdi-link"></i> Useful links
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="{{ url('color-picker') }}">
                            <i class="mdi mdi-eyedropper-variant"></i> Color Picker
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>Quick links</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="https://stackoverflow.com/" target="_blank">
                            <i class="mdi mdi-stack-overflow"></i> Stack Overflow
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="https://github.com/" target="_blank">
                            <i class="mdi mdi-github"></i> Github
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="https://developer.mozilla.org" target="_blank">
                            <i class="mdi mdi-web"></i> MDN Web Docs
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="https://css-tricks.com/" target="_blank">
                            <i class="mdi mdi-web"></i> CSS-Tricks
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="https://caniuse.com/" target="_blank">
                            <i class="mdi mdi-web"></i> Can I use...?
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-6 col-md">
                <h5>About</h5>
                <ul class="list-unstyled text-small">
                    <li>
                        <a class="text-muted" href="{{ url('about') }}" target="_blank">
                            <i class="mdi mdi-information-outline"></i> What's this?
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="http://nightly.hu" target="_blank">
                            <i class="mdi mdi-comment-text-outline"></i> Developer's blog
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="http://vitamas.hu" target="_blank">
                            <i class="mdi mdi-web"></i> ViTamas.hu
                        </a>
                    </li>
                    <li>
                        <a class="text-muted" href="http://vitamas.hu/#contact" target="_blank">
                            <i class="mdi mdi-email-outline"></i> Contact
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.6.10/sweetalert2.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/izitoast@1.3.0/dist/js/iziToast.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ asset('js/tools.js') }}" type="module"></script>
@yield('scripts')
</body>
</html>
