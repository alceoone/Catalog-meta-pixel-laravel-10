<div x-data="{ open: false, selectedOptionCategory: false, selectedOption: null }" class="relative">
    <button @click="open = !open" class="bg-gray-300 px-4 py-2 rounded-md">
        Create Items
    </button>

    <div x-show="open" @click.away="open = false" class="absolute mt-2 w-64 bg-white border rounded-md shadow-lg">
        <div class="py-1">
            <div x-on:click="selectedOption = 'category'; selectedOptionCategory = true; open = false"
                class="cursor-pointer px-4 py-2 hover:bg-gray-200">Category
            </div>
            <div x-on:click="selectedOption = 'subcategory'; selectedOptionCategory = true; open = false" class="cursor-pointer px-4 py-2 hover:bg-gray-200">Sub
                Category
            </div>
        </div>
    </div>

    <!-- Modal !==  -->
    <div x-show="selectedOptionCategory" x-bind:class="{ 'hidden': !selectedOptionCategory }"
        class="hidden fixed inset-0 z-10 w-full md:w-2/6 m-auto flex items-center justify-center">
        <div class="bg-black opacity-50 fixed inset-0"></div>
        <div class="bg-white p-4 z-20 rounded w-full">
            <h2 class="text-lg font-semibold mb-4">Create Category</h2>

            <form method="post" action="{{ route('admin.category.store') }}" class="mt-6 space-y-6">
                @csrf
                <input type="text" name="inisial" id="inisial"
                    class="hidden mt-1 p-2 w-full border border-gray-300 rounded-md text-gray-700 relative z-10"
                    :value="selectedOption">

                <div class="mb-4">
                    <label for="categorySelect" class="block text-base font-medium text-gray-700"
                        x-text="selectedOption === 'category' ? 'Category' : 'Sub Category'">
                        <span class="pl-1 text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <input type="text" name="title" id="title"
                            class="mt-1 p-2 w-full border border-gray-300 rounded-md text-gray-700 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200"
                            placeholder="Name Category" maxlength="40" oninput="updateCharacterCount()">
                        <div id="characterCount"
                            class="absolute inset-y-0 mx-auto right-2 flex items-center justify-center text-sm text-gray-500 z-20">
                            0/40
                        </div>
                    </div>

                    @error('name')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>

                <div x-bind:class="{ 'hidden': selectedOption === 'category' }" class="mb-4">
                    <label for="category_id" class="block text-base font-medium text-gray-700">Select Main Category
                        <span class="pl-1 text-red-500">*</span>
                    </label>

                    <div class="relative">
                        <select id="category_id" name="category_id"
                            class="block w-full bg-white border border-gray-300 hover:border-gray-400 px-4 py-2 pr-8 rounded-md text-gray-700 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200">
                            <option value="">Select an option</option>
                            @forelse ($categories as $index => $category)
                                @if ($category->parent === null)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @empty
                                <option value="">Select an option</option>
                            @endforelse
                        </select>
                    </div>

                    @error('category_id')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>


                <div class="flex flex-wrap">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">Submit</button>
                    <button type="reset" @click="selectedOptionCategory = false"
                        class="bg-gray-300 px-4 py-2 rounded-md ml-2">Cancel</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function selectOption(option) {
        // Set the selected option
        this.selectedOption = option;

        // Close the dropdown
        this.open = false;
    }

    function updateCharacterCount() {
        const input = document.getElementById('title');
        const characterCount = document.getElementById('characterCount');

        const currentLength = input.value.length;
        const maxLength = parseInt(input.getAttribute('maxlength'));

        characterCount.textContent = `${currentLength}/${maxLength}`;
    }
</script>
