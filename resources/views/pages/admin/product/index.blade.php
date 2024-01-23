<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product List') }}
            </h2>
            <a href="{{ route('admin.product.create')}}"
                class="bg-gray-800 text-white border border-gray-500 rounded hover:bg-gray-100 hover:text-gray-800 py-2 px-5">
                Tambah data
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-300">
                            <!-- Table Head -->
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border">ID</th>
                                    <th class="py-2 px-4 border">Image</th>
                                    <th class="py-2 px-4 border">Title</th>
                                    <th class="py-2 px-4 border">Category</th>
                                    <th class="py-2 px-4 border">pages</th>
                                    <th class="py-2 px-4 border">Action</th>
                                </tr>
                            </thead>
                            <!-- Table Body -->
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border">1</td>
                                    <td class="py-2 px-4 border">John Doe</td>
                                    <td class="py-2 px-4 border">john@example.com</td>
                                    <td class="py-2 px-4 border">Admin</td>
                                    <td class="py-2 px-4 border">Admin</td>
                                    <td class="py-2 px-4 border">
                                        <div class="flex flex-wrap space-x-1">
                                            <div>view</div>
                                            <div>edit</div>
                                            <div>delete</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
