<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/c8b27e79a0.js" crossorigin="anonymous"></script>
    <title>Kunjol - @yield('title')</title>
</head>
<body class="bg-slate-100 dark:bg-gray-700 dark:text-white">
    <div class="flex">
       @include('admin.includes.sideNav')

        <div class="w-screen">
            @include('admin.includes.nav')

            <div class="p-10">
                 @yield('content')
            </div>

        </div>


    </div>

    <script>
        var dMode = document.getElementById("darkMode");
        var lMode = document.getElementById("lightMode");

        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
                document.documentElement.classList.add('dark')
                dMode.classList.add('hidden');
                lMode.classList.remove('hidden');
        } else {
                document.documentElement.classList.remove('dark')
                lMode.classList.add('hidden');
                dMode.classList.remove('hidden');
        }

        dMode.onclick = function name() {
            localStorage.theme = 'dark';
             document.documentElement.classList.add('dark');
             dMode.classList.add('hidden');
             lMode.classList.remove('hidden');
             console.log('dark');
        };

         lMode.onclick = function name() {
            document.documentElement.classList.remove('dark')
            localStorage.theme = 'light'
            lMode.classList.add('hidden');
            dMode.classList.remove('hidden');
        };

    </script>

    @vite('resources/js/app.js')
</body>
</html>
