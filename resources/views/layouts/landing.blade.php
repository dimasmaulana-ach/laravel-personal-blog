<!DOCTYPE html>
<html lang="en">
    @include('layouts.components.header')
<body class="bg-slate-50 dark:bg-slate-800">

    @include('layouts.landing.navbar')

    <div class="">
        @yield('landing')
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</body>
</html>
