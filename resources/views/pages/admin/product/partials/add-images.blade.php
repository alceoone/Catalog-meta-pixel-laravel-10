<div class="mb-3" x-data="{ openUploadImage: false }">
    <label for="imageProduct" class="block text-base font-medium text-gray-700 mb-3">Image<span
            class="pl-1 text-red-500">*</span></label>
    <div class="flex flex-wrap">
        @foreach ($dataImage as $item)
        <div class="mr-2 mt-2 relative h-48 w-48 border rounded-lg">
            <img src="{{ url($item->image_path) }}" class="w-full h-full object-cover rounded-lg" alt="{{ $item->image_name }}" />
        
            <div class="absolute top-1 right-1 p-2 bg-white rounded-full">
                <!-- You can replace the '#' with the actual delete route or endpoint -->
                <a href="{{ route('admin.product.delete.image', ['id' => $item->id]) }}" class="text-red-500 hover:text-red-700">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </a>
            </div>
        </div>
        
        @endforeach
        <button @click="openUploadImage = !openUploadImage"
            class="mr-2 mt-2 border text-gray-500 bg-gray-50 hover:text-gray-700 hover:bg-gray-200 hover:border-gray-700 border-gray-500 border-dashed rounded-lg h-48 w-48">
            <i class="fa-solid fa-square-plus text-3xl"></i>
            <div> Add Image</div>
        </button>
    </div>

    <div x-show="openUploadImage" x-bind:class="{ 'hidden': !openUploadImage }"
        class="hidden fixed inset-0 z-50 w-full h-1/2 md:w-3/6 m-auto flex items-center justify-center">
        <div class="bg-black opacity-50 fixed inset-0"></div>
        <div class="bg-white p-4 z-20 rounded w-full h-full">
            <div class="flex flex-wrap justify-between m-auto mb-3">
                <h2 class="text-lg font-semibold mb-4">Add Image</h2>
                <button @click="openUploadImage = false"
                    class="bg-gray-800 text-white hover:bg-gray-50 hover:text-gray-800 border border-gray-800 py-2 px-4 rounded">Close</button>
            </div>
            <div x-data="{ activeTab: 'tab1' }" class="w-full h-2/3">
                <ul class="flex text-center border">
                    <li @click="activeTab = 'tab1'" :class="{ 'bg-gray-800 text-white': activeTab === 'tab1' }"
                        class="py-2 border-r">
                        <a href="#" class="py-4 px-8">Uploaded From Browser</a>
                    </li>
                    <li @click="activeTab = 'tab2'" :class="{ 'bg-gray-800 text-white': activeTab === 'tab2' }"
                        class="py-2 border-r">
                        <a href="#" class="py-4 px-8">Url Image</a>
                    </li>
                </ul>

                <div x-show="activeTab === 'tab1'" class="py-4 px-4">
                    <!-- Konten Tab 1 -->
                    <form method="post" action="{{ route('admin.product.image.upload') }}" class="mt-6 space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- add @method('put') for edit mode --}}
                        @isset($post)
                            @method('put')
                        @endisset
                        <div class="hidden">
                            <input type="text" name="typeFile" value="local" />
                            <input type="text" name="idProduct" :value={{ $data->id }} />
                        </div>
                        <div class="mb-3">
                            <label class="block mt-2">
                                <span class="sr-only">Choose images</span>
                                <input type="file" id="featured_images" name="featured_images[]"
                                    class="block w-full text-sm text-slate-500
                                    file:mr-4 file:py-2 file:px-4
                                    file:rounded-full file:border-0
                                    file:text-sm file:font-semibold
                                    file:bg-violet-50 file:text-violet-700
                                    hover:file:bg-violet-100"
                                    multiple />
                            </label>
                            <div class="shrink-0 my-2">
                                <div id="featured_images_preview" class="flex space-x-4">
                                    @if (isset($post) && $post->featured_images->count() > 0)
                                        @foreach ($post->featured_images as $index => $image)
                                            <div class="relative">
                                                <img class="h-24 w-32 object-cover rounded-md"
                                                    src="{{ Storage::url($image) }}" alt="Featured image preview" />
                                                <button type="button"
                                                    class="absolute top-0 right-0 p-1 bg-red-500 text-white rounded-full"
                                                    onclick="removeImage({{ $index }})">
                                                    X
                                                </button>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                            <x-input-error class="mt-2" :messages="$errors->get('featured_images.*')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>

                </div>

                <div x-show="activeTab === 'tab2'" class="py-4 px-4">
                    <form method="post" action="{{ route('admin.product.image.upload') }}" class="mt-6 space-y-6"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="hidden">
                            <input type="text" name="typeFile" value="url" />
                            <input type="text" name="idProduct" :value={{ $data->id }} />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="title" :value="__('Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error :messages="$errors->updatePassword->get('title')" class="mt-2" />
                        </div>
                        <div class="mb-3">
                            <x-input-label for="url" :value="__('Url Image')" />
                            <x-text-input id="url" name="url" type="text" class="mt-1 block w-full"
                                required autofocus />
                            <x-input-error :messages="$errors->updatePassword->get('url')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
    <script>
        // create onchange event listener for featured_images input
        document.getElementById('featured_images').onchange = function(evt) {
            const previewContainer = document.getElementById('featured_images_preview');
            previewContainer.innerHTML = ''; // Clear previous previews



            const files = this.files;

            console.log(files.length)
            if (files.length > 0) {
                // if there are images, create previews in featured_images_preview
                Array.from(files).forEach(file => {
                    const imgContainer = document.createElement('div');
                    imgContainer.className = 'relative';


                    const img = document.createElement('img');
                    img.className = 'h-32 w-32 object-cover rounded-md';
                    img.src = URL.createObjectURL(file);

                    const deleteBtn = document.createElement('button');
                    deleteBtn.type = 'button';
                    deleteBtn.className = 'absolute top-0 right-0 p-1 bg-red-500 text-white rounded-full';
                    deleteBtn.innerText = 'X';
                    deleteBtn.onclick = function() {
                        removeImage(imgContainer, files);
                    };

                    imgContainer.appendChild(img);
                    imgContainer.appendChild(deleteBtn);
                    previewContainer.appendChild(imgContainer);
                });
            }
        }

        function removeImage(container, files) {

            console.log(files.length - 1)
            container.remove();
        }
    </script>


</div>
