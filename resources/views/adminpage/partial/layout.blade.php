<!DOCTYPE html>
<html lang="en">

{{-- head --}}
@include('adminpage.partial.head')
@include('sweetalert::alert')

<body style="background-image: url({{ asset('assets-admin/img/18410.jpg') }});">

    {{-- header --}}
    @include('adminpage.partial.header')


    {{-- navbar --}}
    @include('adminpage.partial.navbar')
    {{-- content --}}
    @yield('content')

    {{-- footer --}}
    @include('adminpage.partial.footer')

</body>

</html>