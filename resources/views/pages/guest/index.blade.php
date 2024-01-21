<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <nav class="shadow">
        <div class="container flex flex-wrap py-5 m-auto justify-between">
            <div class="">
                <a href="">Brand Name</a>
            </div>
            <div class="">
                <ul class="flex flex-wrap space-x-3">
                    <li>beranda</li>
                    <li>produk</li>
                    <li>contak</li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="container m-auto w-max-7 my-5">
        <section class="">
            <div class="flex bg-red-400">
                <div class="w-3/6">
                    image
                </div>
                <div class="w-3/6">
                    title
                </div>
            </div>
        </section>
        <section>
            <div class="w-full">
                <div class="w-3/6 m-auto">
                    Pilihan
                    <ul class="flex flex-wrap justify-center space-x-2 m-auto">
                        <li>New Product</li>
                        <li>Top Product</li>
                        <li>Best Product</li>
                    </ul>
                </div>
                <div class="flex">
                    <div class="w-1/6 border">
                        <div class="aspect-w-1 aspect-h-1">
                            <img class="object-cover object-center w-full h-full"
                                src="{{ asset('assets/gambar/assets1.png') }}" alt="Gambar" />
                        </div>
                        <div class="m-3">
                            Dress
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>

</html>
