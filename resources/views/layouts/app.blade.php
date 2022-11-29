<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>
    <meta name="description" content="@yield('description')">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    {{--
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</head>

<body class="antialiased">
    <main>
        <div class="container py-4">
            <header class="pb-3 mb-4 border-bottom">
                <a href="/" class="d-flex align-items-center text-dark text-decoration-none">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="body_1"
                        width="40" height="40">
                        <g transform="matrix(1.3333334 0 0 1.3333334 0 0)">
                            <image x="0" y="0"
                                xlink:href="data:image/png;base64,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"
                                width="30" height="30" />
                        </g>
                    </svg>
                    <span class="fs-4 mx-3">Электронная приемная РКС-энерго</span>
                </a>
            </header>
        </div>
        <div class="px-4 py-1 my-1 text-center">
            <h1 class="display-5 fw-bold">@yield('title')</h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4">@yield('description')</p>
            </div>
        </div>
        <div class="container py-4">
            @yield('content')
            <footer class="pt-3 mt-4 text-muted border-top">
                <p class="small m-n">
                    © Copyright {{date('Y')}}
                    <a href="https://www.rks-energo.ru/" target="_blank">РКС-энерго</a>
                </p>
            </footer>
        </div>
    </main>

</body>

</html>
