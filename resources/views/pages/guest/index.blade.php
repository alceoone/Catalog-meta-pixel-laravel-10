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

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <style>
        .swiper-button-next,
        .swiper-button-prev {
            color: white;
            background-color: #374151;
            border-radius: 50%;
            width: 40px;
            height: 40px;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 24px;
            /* Adjust arrow icon size */
        }

        /* Custom styles for Swiper pagination */
        .swiper-pagination {
            color: #374151;
            /* Change pagination color */
        }

        .swiper-pagination-bullet {
            background-color: #374151;
            /* Change individual dot color */
        }

        .swiper-pagination-bullet-active {
            background-color: #2c3e50;
            /* Change active dot color */
        }
    </style>


</head>

<body>


    <nav class="bg-gray-800 p-4" x-data="{ open: false, mouseTimeout = null }">
        <div class="container m-auto flex justify-between">
            <div class="text-white">
                <a href="" class="text-2xl">
                    Brand Name
                </a>
            </div>
            <ul class="flex items-center space-x-4">
                <li><a href="#" class="text-white">Home</a></li>
                <li x-data="{ open: false }" @click="open = !open" @click.away="open = false" @mouseenter="open = true"
                    @mouseleave="mouseTimeout = setTimeout(() => { open = false }, 1000)" class="static group">
                    <a href="#" class="text-white">Men's Clothing</a>
                    <div x-show="open" @mouseenter="clearTimeout(mouseTimeout)"
                        @mouseleave="mouseTimeout = setTimeout(() => { open = false }, 1000)"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
                        x-transition:leave="transition ease-in duration-300"
                        x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90"
                        class="absolute left-0 right-0 z-[1000] mt-5 w-full bg-white border-none shadow-lg dark:bg-neutral-700 dark:text-neutral-200">
                        <div class="p-4 container m-auto">
                            <h3 class="text-lg font-bold mb-2">Web Design</h3>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">Responsive
                                Design</a>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">UI/UX Design</a>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">Wireframing</a>

                            <h3 class="text-lg font-bold mt-4 mb-2">Development</h3>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">Front-end</a>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">Back-end</a>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">Database Design</a>

                            <h3 class="text-lg font-bold mt-4 mb-2">Other Services</h3>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">SEO</a>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">Social Media
                                Marketing</a>
                            <a href="#" class="block text-neutral-600 hover:text-neutral-800">Content Writing</a>
                        </div>
                    </div>
                </li>

                <li><a href="#" class="text-white">Women's Clothing</a></li>
            </ul>
            <div class="text-center">
                <div class="flex items-center">
                    <button class="m-auto py-1 text-xl text-white">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>




    <main class="container m-auto w-max-7 my-5">
        <section class="my-5">
            <div class="flex">

                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="object-cover w-full h-96" src="https://source.unsplash.com/user/erondu/3000x900"
                                alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="object-cover w-full h-96"
                                src="https://source.unsplash.com/collection/190727/3000x900" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="object-cover w-full h-96"
                                src="https://source.unsplash.com/collection/190728/3000x900" alt="image" />
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-pagination"></div>
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
                                    <span class="text-xs bg-red-500 text-white py-0.5 px-1">Diskon</span>
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
                                        <p class="text-xs md:text-base text-base font-bold text-red-500">Rp
                                            {{ number_format(500000) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-auto text-center my-3">
                    <a href=""
                        class="bg-gray-500 text-white hover:bg-gray-50 hover:text-gray-700 hover:border border-gray-700 hover:shadow py-2 px-12">Show
                        More</a>
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
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit molestias temporibus
                                omnis labore ab iste reiciendis sapiente adipisci voluptatibus esse dolore, maiores
                                neque qui cum totam, iure corporis nisi necessitatibus?
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-1/2 md:w-1/3 lg:w-1/6 p-1">
                        <div class="relative hover:shadow-md transition-opacity duration-600">
                            <div class="absolute left-0">
                                <div class="flex">
                                    <span class="text-xs bg-red-500 text-white py-0.5 px-1">Diskon</span>
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
                                        <p class="text-xs md:text-base text-base font-bold text-red-500">Rp
                                            {{ number_format(500000) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-auto text-center my-3">
                    <a href=""
                        class="bg-gray-500 text-white hover:bg-gray-50 hover:text-gray-700 hover:border border-gray-700 hover:shadow py-2 px-12">Show
                        More</a>
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
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit molestias temporibus
                                omnis labore ab iste reiciendis sapiente adipisci voluptatibus esse dolore, maiores
                                neque qui cum totam, iure corporis nisi necessitatibus?
                            </span>
                        </div>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-1/2 md:w-1/3 lg:w-1/6 p-1">
                        <div class="relative hover:shadow-md transition-opacity duration-600">
                            <div class="absolute left-0">
                                <div class="flex">
                                    <span class="text-xs bg-red-500 text-white py-0.5 px-1">Diskon</span>
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
                                        <p class="text-xs md:text-base text-base font-bold text-red-500">Rp
                                            {{ number_format(500000) }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-auto text-center my-3">
                    <a href=""
                        class="bg-gray-500 text-white hover:bg-gray-50 hover:text-gray-700 hover:border border-gray-700 hover:shadow py-2 px-12">Show
                        More</a>
                </div>
            </div>
        </section>
    </main>
    <footer class="bg-gray-800 text-white p-8 mt-8">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Bagian 1 -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Tentang Kami</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vel urna mauris.</p>
                </div>

                <!-- Bagian 2 -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Hubungi Kami</h2>
                    <p>Email: info@example.com</p>
                    <p>Telepon: (123) 456-7890</p>
                </div>

                <!-- Bagian 3 -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Link Penting</h2>
                    <ul>
                        <li><a href="#">Kebijakan Privasi</a></li>
                        <li><a href="#">Syarat dan Ketentuan</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>

                <!-- Bagian 4 -->
                <div>
                    <h2 class="text-xl font-semibold mb-4">Ikuti Kami</h2>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container m-auto mt-5 py-5">
            <p>&copy; {{ date('Y') }} Brand Name.</p>
        </div>
    </footer>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            loop: true,
            autoplay: {
                delay: 6000,
                disableOnInteraction: false,
            },

            cssMode: true,

            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            pagination: {
                el: ".swiper-pagination",
            },
            scrollbar: {
                el: '.swiper-scrollbar',
            },

            mousewheel: true,
            keyboard: true,

        });
    </script>
</body>

</html>
