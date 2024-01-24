<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Product List') }}
            </h2>
            <a href="{{ route('admin.product.store') }}"
                class="bg-gray-800 text-white border border-gray-500 rounded hover:bg-gray-100 hover:text-gray-800 py-2 px-5">
                Create Items
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
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="py-2 px-4 border">1</td>
                                        <td class="py-2 px-4 border">John Doe</td>
                                        <td class="py-2 px-4 border">john@example.com</td>
                                        <td class="py-2 px-4 border">Admin</td>
                                        <td class="py-2 px-4 border">Admin</td>
                                        <td class="py-2 px-4 border">
                                            <div class="flex flex-wrap space-x-1">
                                                <div>view</div>
                                                <div class="bg-orange-100 text-sm py-1 px-2 text-orange-500 rounded border border-orange-500 hover:bg-orange-500 hover:text-white">
                                                    <a href="{{ route('admin.product.edit', $item->id) }}">
                                                        edit
                                                    </a>
                                                </div>
                                                <div>delete</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-2">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
