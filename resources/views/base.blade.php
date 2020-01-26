<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        @include('parts.head')
    </head>
    <body id="top">

        <!-- pageheader
        ================================================== -->
        @include('parts.header')

        @yield('content')

        @include('parts.bottomSection')

        @include('parts.footer')


    </body>
</html>