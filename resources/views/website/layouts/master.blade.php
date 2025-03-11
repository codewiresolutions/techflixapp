<!DOCTYPE html>
<html lang="en">

<head>
    @include('website.layouts.partials.head')

    @include('website.layouts.partials.styles')

</head>

<body>
            @include('website.layouts.partials.header')
            @yield('content')
            @include('website.layouts.partials.footer')
            @include('website.layouts.partials.scripts')
</body>

</html>
