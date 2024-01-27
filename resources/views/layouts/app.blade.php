<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    {{-- CKEditor CDN --}}<script src="https://cdn.ckeditor.com/ckeditor5/41.0.0/classic/ckeditor.js"></script>

    
    <style>
        .ck-editor__editable_inline {
            min-height: 600px;
            margin : 2px;
        }
    </style>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @if (isset($header))
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition:enter="transition ease-out duration-300"
                x-transition:leave="transition ease-in duration-300" @click.away="show = false"
                class="fixed top-10 right-5 p-4 bg-green-500 text-white flex items-center shadow rounded-xl">
                {{ session('success') }}
                <button @click="show = false" class="ml-2 focus:outline-none">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        @endif
        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Sembunyikan Flash Message setelah beberapa detik
            setTimeout(() => {
                document.querySelector('[x-data="{ show: true }"]').style.display = 'none';
            }, 5000); // Sesuaikan dengan kebutuhan Anda
        });
    </script>
</body>

</html>
