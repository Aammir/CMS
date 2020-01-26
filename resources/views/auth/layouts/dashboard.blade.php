<!DOCTYPE html>
<html lang="en">
    @include('auth.layouts.inc.head')
    <body>
        <div class="wrapper">
            @include('auth.layouts.inc.sidebar')
            <div class="main-panel">
                @include('auth.layouts.inc.header')
                 @yield('content')
                @include('auth.layouts.inc.footer')
            </div>
        </div>
    </body>
    @include('auth.layouts.inc.scripts')
</html>