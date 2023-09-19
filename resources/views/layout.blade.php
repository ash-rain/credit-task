<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Credit Task</title>

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body>
        <header class="px-4 py-8 bg-gradient-to-tl from-slate-500 to-slate-300 text-2xl text-slate-800">
            Credit Task
        </header>
        <nav class="bg-slate-900 text-gray-500">
            <a href="{{ route('home') }}" class="inline-block p-2 hover:text-white {{ Route::is('home') ? 'text-white bg-black' : '' }}">
                List Credits
            </a>
            <a href="{{ route('add_credit') }}" class="inline-block p-2 hover:text-white {{ Route::is('add_credit') ? 'text-white bg-black' : '' }}">
                Add Credit
            </a>
        </nav>
        <main class="p-4">
            @yield('content')
        </main>
    </body>
</html>
