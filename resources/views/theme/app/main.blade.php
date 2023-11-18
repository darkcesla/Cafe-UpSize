<html lang="en" data-layout="vertical" data-layout-style="detached" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg">
    @include('theme.app.head')
    <body class="ltr app sidebar-mini">
        <div id="global-loader">
            <img src="{{ asset('admin-assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <div class="page">
            <div class="page-main">
                @include('theme.app.header')
                @include('theme.app.aside')
                {{ $slot }}
            </div>
        </div>
        <a href="#top" id="back-to-top"><i class="fa fa-long-arrow-up"></i></a>
        @include('theme.app.js')
    </body>
</html>