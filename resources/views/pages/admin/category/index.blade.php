<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Category') }}
            </h2>
            <div>
                @include('pages.admin.category.partials.dropdown-create-category-option')
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="overflow-x-auto">

                        <table class="min-w-full bg-white border border-gray-300">
                            <thead>
                                <tr>
                                    <th class="py-1 border">No.</th>
                                    <th class="py-1 border">Category
                                    </th>
                                    <th class="py-1 border">Sub Category</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($categories as $index => $category)
                                    <tr>
                                        <td class="py-2 px-2 border text-center">{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}.</td>
                                        <td class="py-2 px-2 border">{{ $category->name }}</td>
                                        <td class="py-2 px-2 border">
                                            @if ($category->children->isNotEmpty())
                                                @foreach ($category->children as $child)
                                                    <div class="bg-gray-50 p-2">
                                                        {{ $child->name }}
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="p-2 bg-gray-200 text-center">
                                                    Belum ada subcategory
                                                </div>
                                            @endif
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <td class="py-1 border">None</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="my-2">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
