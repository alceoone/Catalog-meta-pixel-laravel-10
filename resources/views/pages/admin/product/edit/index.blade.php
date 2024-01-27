<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product Create') }}
                {{ $data->id }}
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
                            <div class="py-5">
                                Product Information
                            </div>
                            <div class="p-1">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4 relative">
                                        <label for="name" class="block text-base font-medium text-gray-700">Name
                                            Product<span class="pl-1 text-red-500">*</span></label>

                                        <div class="relative">
                                            <input type="text" name="name" id="name"
                                                class="mt-1 p-2 w-full border border-gray-300 rounded-md text-gray-700 relative z-10"
                                                placeholder="Name Product" maxlength="120"
                                                oninput="updateCharacterCount()">
                                            <div id="characterCount"
                                                class="absolute inset-y-0 mx-auto right-2 flex items-center justify-center text-sm text-gray-500 z-20">
                                                0/120</div>
                                        </div>
                                        @error('name')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="mb-4 relative">
                                        <label for="category" class="block text-base font-medium text-gray-700">Category
                                            Product<span class="pl-1 text-red-500">*</span></label>

                                        <div class="relative">
                                            <input type="text" name="name" id="name"
                                                class="mt-1 p-2 w-full border border-gray-300 rounded-md text-gray-700 relative z-10"
                                                placeholder="Name Product" maxlength="120"
                                                oninput="updateCharacterCount()">
                                            <div id="characterCount"
                                                class="absolute inset-y-0 mx-auto right-2 flex items-center justify-center text-sm text-gray-500 z-20">
                                                0/120</div>
                                        </div>
                                        @error('name')
                                            <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                                        @enderror
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
                <button onclick="confirmDelete()" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Confirm</button>
                <!-- Cancel button closes the modal -->
                <button onclick="closeConfirmationModal()"
                    class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
            </div>
        </div>
    </div>
    <script>
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
