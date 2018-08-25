<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('frontend.scripts.gtm')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

      {{--{!! SEOMeta::generate() !!}--}}

    @if (count(config('laravellocalization.supportedLocales')) > 1)
    @include('partials.alternates')
    @endif

    <!-- Styles -->
    @if (!$hmr)
    <link rel="stylesheet" href="{{ Html::asset('frontend.css') }}">
    @endif
</head>
<body class="@yield('body_class')">
    @include('frontend.scripts.gtmiframe')

    <div id="app">
        @include('partials.logged-as')
        @include('partials.not-confirmed')
        @include('frontend.partials.header')
        @hasSection('highlight')
            <section class="highlight">
                @yield('highlight')
            </section>
        @endif

        @if(Breadcrumbs::exists() && !request()->routeIs('home'))
            <section class="nav-breadcrumb bg-dark">
                <div class="container">
                    {!! Breadcrumbs::render() !!}
                </div>
            </section>
        @endif

        <div class="main-container container py-4">
            @hasSection('title')
                <h1 class="mb-4">@yield('title')</h1>
            @endif
            @include('partials.messages')

            <div class="content">
                @yield('content')
            </div>
        </div>
    </div>

    @include('frontend.partials.footer')

    <!-- JS settings -->
    <script type="application/json" data-settings-selector="settings-json">
        {!! json_encode([
            'cookieconsent' => [
                'message' => __('labels.cookieconsent.message'),
                'dismiss' => __('labels.cookieconsent.dismiss'),
            ],
        ]) !!}
    </script>

    <!-- Scripts -->
    <script src="{{ Html::asset('manifest.js') }}"></script>
    <script src="{{ Html::asset('vendor.js') }}"></script>
    <script src="{{ Html::asset('vendor_frontend.js') }}"></script>
    <script src="{{ Html::asset('locales.js') }}"></script>
    <script src="{{ Html::asset('frontend.js') }}"></script>

    @stack('scripts')
</body>
</html>
