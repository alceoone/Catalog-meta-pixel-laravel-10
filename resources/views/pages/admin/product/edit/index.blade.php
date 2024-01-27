<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex">
                @if ($data->name_product == null)
                    <div class="text-gray-500 px-2">Title Empty</div>
                @endif
                {{ $data->name_product }}
            </h2>
            <button onclick="openConfirmationModal('{{ $data->id }}')"
                class="bg-red-500 text-white border border-red-500 rounded hover:bg-red-100 hover:text-red-500 py-2 px-5">Delete
                Draf</button>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <div class="">
                            @include('pages.admin.product.partials.add-images')
                            <div class="p-1">
                                <form action="" method="POST" enctype="multipart/form-data"
                                    x-data="{ toggle: false }" @submit.prevent="submitForm">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="block text-base font-medium text-gray-700">Name
                                            Product<span class="pl-1 text-red-500">*</span></label>

                                        <div class="mt-1 relative">
                                            <input type="text" name="name" id="name"
                                                class="mt-1 p-2 w-full border border-gray-300 rounded-md text-gray-700 relative z-10"
                                                placeholder="Example : men's shoes (type, category) + shop name (brand name) + green color (description)"
                                                maxlength="120" oninput="updateCharacterCount()">
                                            <div id="characterCount"
                                                class="absolute inset-y-0 mx-auto right-2 flex items-center justify-center text-sm text-gray-500 z-20">
                                                0/120</div>
                                        </div>
                                        @error('name')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="flex flex-wrap">
                                        <div class="mb-4 w-7/12">
                                            <label for="category"
                                                class="block text-base font-medium text-gray-700">Category
                                                Product<span class="pl-1 text-red-500">*</span></label>
                                            <select id="category" name="category"
                                                class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
                                                @foreach ($dataCategory as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div x-data="{ condition: null }" class="w-5/12 pl-4">
                                            <label class="block text-base font-medium text-gray-700">Condition</label>

                                            <div class="mt-3">
                                                <label class="inline-flex items-center">
                                                    <input type="radio" x-model="condition" value="new"
                                                        class="form-radio text-gray-800" />
                                                    <span class="ml-2">New</span>
                                                </label>

                                                <label class="inline-flex items-center ml-6">
                                                    <input type="radio" x-model="condition" value="second"
                                                        class="form-radio text-gray-800" />
                                                    <span class="ml-2">Second</span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    {{-- Price --}}
                                    <div class="w-full flex flex-wrap">
                                        <div class="mb-4 w-full">
                                            <label class="block text-base font-medium text-gray-700">Status Discount</label>

                                            <div class="mt-2 flex w-1/2">
                                                <button x-on:click.prevent="toggle = !toggle"
                                                    :class="{ 'bg-blue-500': toggle, 'bg-gray-300': !toggle }"
                                                    class="relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring focus:border-blue-300">
                                                    <span :class="{ 'translate-x-5': toggle, 'translate-x-0': !toggle }"
                                                        class="pointer-events-none relative inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200"></span>
                                                </button>
                                                <div x-show="toggle" class="ml-2 text-gray-700">
                                                    Price of Discount is ON.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4 w-1/2 pr-1">
                                            <label for="price"
                                                class="block text-base font-medium text-gray-700">Price<span
                                                    class="pl-1 text-red-500">*</span></label>

                                            <div class="mt-1">
                                                <input type="text" name="price" id="price"
                                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md text-gray-700 z-10"
                                                    placeholder="Example : $ 1.000.000,00" maxlength="12"
                                                    oninput="formatCurrency(this)">
                                            </div>
                                            @error('price')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="mb-4 w-1/2 pl-1">
                                            <label for="price_discount"
                                                class="block text-base font-medium text-gray-700">Price of
                                                Discount</label>

                                            <div class="mt-1">
                                                <input type="text" name="price_discount" id="price_discount"
                                                    class="mt-1 p-2 w-full border border-gray-300 rounded-md text-gray-700 z-10"
                                                    placeholder="Example : $ 1.000.000,00" maxlength="12"
                                                    oninput="formatCurrency(this)">
                                            </div>
                                            @error('price')
                                                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <label for="category" class="block text-base font-medium text-gray-700">Category
                                            Product<span class="pl-1 text-red-500">*</span></label>
                                        <textarea class="mt-1 block w-full" id="content" placeholder="Enter the Description" name="body"></textarea>
                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Dark Overlay -->
    <div id="dark-overlay" class="z-[999] fixed inset-0 bg-gray-800 bg-opacity-50 hidden transition-opacity"></div>

    <!-- Confirmation Modal -->
    <div id="confirmation-modal"
        class="fixed z-[1000] top-1/4 inset-x-0 mx-auto flex items-center justify-center hidden transition-opacity">
        <div class="bg-white p-4 rounded shadow-md">
            <p class="mb-4">Are you sure you want to delete this product?</p>
            <div class="flex justify-end">
                <!-- Confirm button triggers form submission -->
                <button onclick="confirmDelete()"
                    class="bg-red-500 text-white px-4 py-2 rounded mr-2">Confirm</button>
                <!-- Cancel button closes the modal -->
                <button onclick="closeConfirmationModal()"
                    class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            ClassicEditor.create(document.querySelector('#content'), {
                    toolbar: {
                        items: [
                            'heading',
                            '|',
                            'bold',
                            'italic',
                            'link',
                            'bulletedList',
                            'numberedList',
                            '|',
                            'indent',
                            'outdent',
                            '|',
                            // 'imageUpload',
                            'blockQuote',
                            'insertTable',
                            '|',
                            'undo',
                            'redo'
                        ],
                        shouldNotGroupWhenFull: true
                    },
                    language: 'en',
                    image: {
                        toolbar: [
                            'imageTextAlternative',
                            '|',
                            'imageStyle:full',
                            'imageStyle:side',
                            '|',
                            'imageResize'
                        ],
                        styles: [
                            'full',
                            'side'
                        ]
                    },
                    table: {
                        contentToolbar: [
                            'tableColumn',
                            'tableRow',
                            'mergeTableCells'
                        ]
                    },
                    licenseKey: '',
                })
                .catch(error => {
                    console.error('There was an error initializing CKEditor', error);
                });
        });

        function formatCurrency(input) {
            // Menghapus karakter selain angka
            const numericValue = input.value.replace(/[^\d]/g, '');

            // Mengonversi angka ke format mata uang
            const formattedValue = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'USD',
            }).format(numericValue / 100); // Memperhitungkan bahwa nilai harga umumnya dihitung dalam sen

            // Menetapkan nilai yang telah diformat kembali ke input
            input.value = formattedValue;
        }

        function updateCharacterCount() {
            const input = document.getElementById('name');
            const characterCount = document.getElementById('characterCount');

            const currentLength = input.value.length;
            const maxLength = parseInt(input.getAttribute('maxlength'));

            characterCount.textContent = `${currentLength}/${maxLength}`;
        }

        function openConfirmationModal(productId) {
            // Set the form action based on the product ID
            const confirmationForm = document.getElementById('confirmation-form');
            if (confirmationForm) {
                confirmationForm.action = "{{ url('products') }}/" + productId;
            }
            // Show the modal
            document.getElementById('confirmation-modal').classList.remove('hidden');

            // Show the dark overlay
            document.getElementById('dark-overlay').classList.remove('hidden');
        }

        function closeConfirmationModal() {
            // Hide the modal
            document.getElementById('confirmation-modal').classList.add('hidden');

            // Hide the dark overlay
            document.getElementById('dark-overlay').classList.add('hidden');
        }

        function confirmDelete() {
            // Submit the form
            document.getElementById('confirmation-form').submit();
        }
    </script>
</x-app-layout>
