<!doctype html>
<html class="no-js" lang="">
@include('partials._head')
@yield('custom-css')
</head>
    <body>
            <!--[if lt IE 8]>
                <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
            <![endif]-->

            <!-- Add your site or application content here -->
        <!-- header start -->
        <header class="header-home">
            @include('partials._header')
        </header>
        <!-- header end -->
        
        @yield('content')
        
        @include('partials._footer')
        
        @include('partials._javascript')

        @yield('scripts')
    </body>
</html>
