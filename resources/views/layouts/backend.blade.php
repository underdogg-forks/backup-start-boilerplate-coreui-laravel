<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Administration | {{ config('app.name') }}</title>
    @if (count(config('laravellocalization.supportedLocales')) > 1)
    @include('partials.alternates')
    @endif

    <!-- Styles -->
    @if (!$hmr)
    <link rel="stylesheet" href="{{ Html::asset('frontend.css') }}">
    @endif
</head>
<body class="app @yield('body_class')">

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
    @yield('body')
            </div>
        </div>

    @include('frontend.partials.footer')

    @stack('scripts')
</body>
</html>
