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
        <section class="my-5">
            <div class="flex">
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
                <div class="w-full m-auto flex flex-wrap">
                    {{-- Pilihan --}}
                    <div class="w-full text-center my-3 py-3">
                        <div class="flex items-center">
                            <div class="flex-grow border-t border-b border-gray-500"></div>
                            <span class="text-3xl mx-4">THE BEST FOR YOU</span>
                            <div class="flex-grow border-t border-b border-gray-500"></div>
                        </div>
                    </div>
                    <ul class="flex flex-wrap justify-center m-auto border border-gray-500">
                        <li>
                            <button class="bg-gray-500 text-white py-2 px-8 hover:bg-gray-50 hover:text-gray-700">
                                New Product
                            </button>
                        </li>
                        <li>
                            <button class="py-2 px-8">
                                New Product
                            </button>
                        </li>
                        <li>
                            <button class="py-2 px-8">
                                New Product
                            </button>
                        </li>
                    </ul>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-1/2 md:w-1/3 lg:w-1/6 p-1">
                        <div class="relative hover:shadow-md transition-opacity duration-600">
                            <div class="absolute left-0">
                                <div class="flex">
                                    <span class="text-xs bg-red-500 text-white py-0.5 px-1">Diskon 20%</span>
                                </div>
                                <div class="flex">
                                    <span class="text-xs bg-white text-grey-500 py-0.5 px-1">New</span>
                                </div>
                            </div>
                            <div class="aspect-w-1 aspect-h-1">
                                <img class="object-cover object-center w-full h-full"
                                    src="{{ asset('assets/gambar/assets1.png') }}" alt="Gambar" />
                            </div>
                            <div class="py-3 px-1 text-center">
                                <a href="" class="hover:underline">
                                    <p class="text-xs md:text-base">
                                        Brand Name T-Shirt Basic Meghan Black
                                    </p>
                                </a>
                                <div class="my-3 flex flex-wrap justify-center items-center space-x-1">
                                    <div>
                                        <p class="text-xs md:text-base font-bold font-bold line-through">Rp
                                            {{ number_format(5000000) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs md:text-base text-base font-bold text-red-500">Rp {{ number_format(500000) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-auto text-center my-3">
                    <a href="" class="bg-gray-500 text-white hover:bg-gray-50 hover:text-gray-700 hover:border border-gray-700 hover:shadow py-2 px-12">Show More</a>
                </div>
            </div>
        </section>
        <section>
            <div class="w-full">
                <div class="w-full m-auto flex flex-wrap">
                    {{-- Pilihan --}}
                    <div class="w-full text-center my-3 py-3">
                        <div class="flex items-center">
                            <div class="flex-grow border-t border-b border-gray-500"></div>
                            <span class="text-3xl mx-4">COLLECTION</span>
                            <div class="flex-grow border-t border-b border-gray-500"></div>
                        </div>
                        <div class="w-1/2 m-auto">
                            <span>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit molestias temporibus omnis labore ab iste reiciendis sapiente adipisci voluptatibus esse dolore, maiores neque qui cum totam, iure corporis nisi necessitatibus?
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-1/2 md:w-1/3 lg:w-1/6 p-1">
                        <div class="relative hover:shadow-md transition-opacity duration-600">
                            <div class="absolute left-0">
                                <div class="flex">
                                    <span class="text-xs bg-red-500 text-white py-0.5 px-1">Diskon 20%</span>
                                </div>
                                <div class="flex">
                                    <span class="text-xs bg-white text-grey-500 py-0.5 px-1">New</span>
                                </div>
                            </div>
                            <div class="aspect-w-1 aspect-h-1">
                                <img class="object-cover object-center w-full h-full"
                                    src="{{ asset('assets/gambar/assets1.png') }}" alt="Gambar" />
                            </div>
                            <div class="py-3 px-1 text-center">
                                <a href="" class="hover:underline">
                                    <p class="text-xs md:text-base">
                                        Brand Name T-Shirt Basic Meghan Black
                                    </p>
                                </a>
                                <div class="my-3 flex flex-wrap justify-center items-center space-x-1">
                                    <div>
                                        <p class="text-xs md:text-base font-bold font-bold line-through">Rp
                                            {{ number_format(5000000) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs md:text-base text-base font-bold text-red-500">Rp {{ number_format(500000) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-auto text-center my-3">
                    <a href="" class="bg-gray-500 text-white hover:bg-gray-50 hover:text-gray-700 hover:border border-gray-700 hover:shadow py-2 px-12">Show More</a>
                </div>
            </div>
        </section>
        <section>
            <div class="w-full">
                <div class="w-full m-auto flex flex-wrap">
                    {{-- Pilihan --}}
                    <div class="w-full text-center my-3 py-3">
                        <div class="flex items-center">
                            <div class="flex-grow border-t border-b border-gray-500"></div>
                            <span class="text-3xl mx-4">CASUAL CLOTHES</span>
                            <div class="flex-grow border-t border-b border-gray-500"></div>
                        </div>
                        <div class="w-1/2 m-auto">
                            <span>
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit molestias temporibus omnis labore ab iste reiciendis sapiente adipisci voluptatibus esse dolore, maiores neque qui cum totam, iure corporis nisi necessitatibus?
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-1/2 md:w-1/3 lg:w-1/6 p-1">
                        <div class="relative hover:shadow-md transition-opacity duration-600">
                            <div class="absolute left-0">
                                <div class="flex">
                                    <span class="text-xs bg-red-500 text-white py-0.5 px-1">Diskon 20%</span>
                                </div>
                                <div class="flex">
                                    <span class="text-xs bg-white text-grey-500 py-0.5 px-1">New</span>
                                </div>
                            </div>
                            <div class="aspect-w-1 aspect-h-1">
                                <img class="object-cover object-center w-full h-full"
                                    src="{{ asset('assets/gambar/assets1.png') }}" alt="Gambar" />
                            </div>
                            <div class="py-3 px-1 text-center">
                                <a href="" class="hover:underline">
                                    <p class="text-xs md:text-base">
                                        Brand Name T-Shirt Basic Meghan Black
                                    </p>
                                </a>
                                <div class="my-3 flex flex-wrap justify-center items-center space-x-1">
                                    <div>
                                        <p class="text-xs md:text-base font-bold font-bold line-through">Rp
                                            {{ number_format(5000000) }}</p>
                                    </div>
                                    <div>
                                        <p class="text-xs md:text-base text-base font-bold text-red-500">Rp {{ number_format(500000) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-auto text-center my-3">
                    <a href="" class="bg-gray-500 text-white hover:bg-gray-50 hover:text-gray-700 hover:border border-gray-700 hover:shadow py-2 px-12">Show More</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-gray-500 relative bottom-0">
        <div class="container m-auto py-5">
            footeer
        </div>
        <div class="bg-white">
            <div class="container m-auto py-5">
                <p>&copy; {{ date('Y') }} Brand Name.</p>
            </div>
        </div>
    </footer>
</body>

</html>
