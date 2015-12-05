<!DOCTYPE html>
<html lang="zh-Hant-TW">
    <head>
        {{-- MetaTag --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="{{ Config::get('site.desc') }}">

        {{-- MetaTag(OpenGraph) --}}
        <meta property="og:title" content="@if(trim($__env->yieldContent('title'))) @yield('title') - @endif{{ Config::get('site.name') }}">
        <meta property="og:url" content="{{ URL::current() }}">
        <meta property="og:description" content="{{ Config::get('site.desc') }}">

        {{-- Title --}}
        <title>@if (trim($__env->yieldContent('title'))) @yield('title') - @endif{{ Config::get('site.name') }}</title>

        {{-- Sheetstyle --}}
        {!! HTML::style('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css') !!}
        {!! HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css') !!}
        {!! HTML::style('css/animate.css') !!}
        {!! HTML::style('css/app.css') !!}
        {!! HTML::style('css/tipped.css') !!}

        @yield('css')

        @yield('head-javascript')
    </head>
    <body>
        {{-- Header --}}
        @yield('header')

        {{-- Navbar --}}
        @include('navbar.navbar')

        {{-- Content --}}
        @yield('content')

        {{-- Footer --}}
        <footer class="footer">
            <div class="container">
                <p class="text-center">
                    {{-- 超連結 --}}

                    {{-- 版權宣告 --}}
                    Copyright &copy; 2015-2016 FISA. All rights reserved.
                </p>
            </div>
        </footer>


        {{-- Javascript --}}
        {!! HTML::script('//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js') !!}
        {!! HTML::script('//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js') !!}
        {{-- 好看的彈出訊息框 --}}
        {!! HTML::script('js/bootstrap-notify.min.js') !!}
        {!! HTML::script('js/notify.js') !!}
        {!! HTML::script('js/tipped.js') !!}

        @yield('js')

        <script type="text/javascript">
            @if(Session::has('global'))
                /* Global message */
                notifySuccess('{!! Session::get('global') !!}');
            @endif
            @if(Session::has('warning'))
                /* Warning message */
                notifyWarning('{!! Session::get('warning') !!}', '{{ Session::get('delay', 0) }}');
            @endif

            $(document).ready(function() {
                Tipped.create('*',{
                    fadeIn: 0,
                    fadeOut: 0,
                    position: 'right',
                    target: 'mouse',
                    showDelay: 0,
                    hideDelay: 0,
                    offset: { x: 0, y: 15 },
                    stem: false
                });
            });
        </script>

    </body>
</html>
