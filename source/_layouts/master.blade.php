<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Jigsaw – Static Sites for Laravel Developers</title>

        <link rel="icon" type="image/png" href="/assets/img/jigsaw-logo.png">

        <meta name="msapplication-TileColor" content="#773580">
        <meta name="theme-color" content="#ffffff">

        <link rel="stylesheet" href="https://use.typekit.net/fac7rzg.css">

        @viteRefresh()
        <link rel="stylesheet" href="{{ vite('source/_assets/css/app.css') }}">
        <script defer type="module" src="{{ vite('source/_assets/js/app.js') }}"></script>

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital@0;1&display=swap" />

        <link href="https://cdn.jsdelivr.net/npm/@docsearch/css@3" rel="stylesheet" />
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </head>

    <body class="min-h-screen font-sans leading-tight">
        <main id="vue-app">
            <div class="w-full bg-brown-lightest border-t-[5px] border-purple"></div>

            @yield('body')
        </main>
        @yield('scripts')
    </body>
</html>
