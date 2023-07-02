<!DOCTYPE html>
<html lang="en">
@include('layouts.components.header')

<body class="bg-slate-50 dark:bg-slate-900 ">

    @include('layouts.dashboard.sidebar')

    <div class="p-4 sm:ml-64">
        <div class="p-4 rounded-lg mt-14">
            @yield('dashboard')
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.6/flowbite.min.js"></script>
</body>

</html>
