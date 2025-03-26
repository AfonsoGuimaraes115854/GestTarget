<!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])

    <title>Página não encontrada</title>
    <script src="https://cdn.jsdelivr.net/npm/tailwindcss@3.1.8/dist/tailwind.min.js"></script> <!-- Adicionando o Tailwind CSS -->

    </head>
    <body class="bg-gray-100 flex items-center justify-center min-h-screen m-0">
    <div class="flex bg-white rounded-lg shadow-lg w-11/12 max-w-5xl">
        <!-- Logo à esquerda -->
        <div class="flex justify-center items-center p-4">
            <img src="{{ asset('images/ttsimple.png') }}" alt="Logo" class="max-w-xs"> <!-- Substitua pelo caminho do seu logo -->
        </div>

        <!-- Conteúdo do erro à direita -->
        <div class="flex flex-col justify-center items-start p-6 w-full text-right">
            <h1 class="text-6xl font-bold text-red-500">404</h1>
            <h2 class="text-2xl font-semibold mt-4">Página não encontrada</h2>
            <p class="text-lg mt-2">Desculpe, a página que procura não existe ou foi removida.</p>
            <a href="{{ url('/') }}" class="mt-4 text-blue-500 hover:underline text-lg">Voltar para a página inicial</a>
        </div>
    </div>
    </body>
    </html>
