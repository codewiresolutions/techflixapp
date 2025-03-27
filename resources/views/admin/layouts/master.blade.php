<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.layouts.partials.head')
    @include('admin.layouts.partials.styles')

</head>

<body>
            @include('admin.layouts.partials.sidebar')
            @include('admin.layouts.partials.header')
            @yield('content')
            @include('admin.layouts.partials.footer')
            @include('admin.layouts.partials.scripts')
           
</body>

</html>
