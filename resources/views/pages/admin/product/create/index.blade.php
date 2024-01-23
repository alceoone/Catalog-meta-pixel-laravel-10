<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product Create') }}
            </h2>
            <a href="{{ route('admin.product.create')}}"
                class="bg-gray-800 text-white border border-gray-500 rounded hover:bg-gray-100 hover:text-gray-800 py-2 px-5">
                Simpan Data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        create data
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
