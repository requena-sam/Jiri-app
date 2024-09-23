<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')
    <title>Accueil</title>
</head>
<body class="pb-4 font-sans">
<a class="sr-only"
   href="#main-menu">Aller au menu principal</a>
<div class="flex flex-col-reverse gap-6">
    <main class="flex flex-col gap-4 px-4">
        {{ $slot }}
    </main>
    <div class="p-4 bg-red-500">
        <x-navigations.main/>
    </div>
</div>
</body>
