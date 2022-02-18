<!doctype html>
<html lang="tr" xmlns:livewire="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Movie App</title>

    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <livewire:styles />
{{--    Alpine js--}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>

</head>
<body class="font-sans bg-gray-900 text-white">
    <nav class="border-b border-gray-800">
        <div class="container mx-auto flex flex-col md:flex-row items-center justify-between px-4 py-6">
            <ul class="flex flex-col md:flex-row items-center">
                <li class="md:ml-4">
                    <a class="hover:text-gray-300  mt-3 md:mt-0" href="{{route('movies.index')}}">Filmler</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a class="hover:text-gray-300" href="#">TV Programları</a>
                </li>
                <li class="md:ml-6 mt-3 md:mt-0">
                    <a class="hover:text-gray-300" href="#">Oyuncular</a>
                </li>
            </ul>
            <div class="flex flex-col md:flex-row items-center">
                <livewire:search-dropdown>
                <div class="md:ml-4 mt-3 md:mt-0">
                    <a href="#">
                        <img src="{{asset('img/profil.png')}}" alt="Profil" class="rounded-full w-8 h-8">
                    </a>
                </div>
            </div>
        </div>
    </nav>
    @yield('content')
    <livewire:scripts />
</body>
</html>
