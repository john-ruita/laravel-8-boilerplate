<!doctype html>
<html lang="{{ htmlLang() }}" @langrtl dir="rtl" @endlangrtl>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ appName() }} | @yield('title')</title>
    <meta name="description" content="@yield('meta_description', appName())">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    @stack('before-styles')
    <link href="{{ mix('css/backend.css') }}" rel="stylesheet">
    <livewire:styles />
    @stack('after-styles')
</head>
<body class="hold-transition sidebar-mini">
@include('backend.includes.header')
    @include('backend.includes.sidebar')

    <div class="wrapper">
        <div class="content-wrapper">
            @include('includes.partials.read-only')
            @include('includes.partials.logged-in-as')
            @include('includes.partials.announcements')
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">@yield('title')</h1>
                        </div>
                        <div class="col-sm-6">
                            @include('backend.includes.partials.breadcrumbs')
                        </div>
                    </div>
                </div>
            </div>
            <main class="content">
            <div class="container-fluid">
                <div class="fade-in">
                    @include('includes.partials.messages')
                    @yield('content')
                </div>
            </div>
        </main>
        </div>
        @include('backend.includes.footer')
    </div>

    @stack('before-scripts')
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/backend.js') }}"></script>
    <livewire:scripts />
    @stack('after-scripts')
</body>
</html>
