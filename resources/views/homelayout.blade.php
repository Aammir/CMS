<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        @include('parts.head')
    </head>
    <body id="top">

        <!-- pageheader
        ================================================== -->
        @include('parts.header-home')

        @yield('content')

        @include('parts.bottomSection')

        @include('parts.footer')
        <!-- Java Script
       ================================================== -->
        <script src="{{url('/js/jquery-3.2.1.min.js')}}"></script>
        <script src="{{url('/js/plugins.js')}}"></script>
        <script src="{{url('/js/main.js')}}"></script>
    </body>
</html>