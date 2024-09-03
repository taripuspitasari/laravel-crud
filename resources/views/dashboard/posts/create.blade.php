@extends('dashboard.layouts.main')

@section('container')
<section class="bg-white dark:bg-gray-900">
    <div class="py-4 p-4 max-w-2xl">
        <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a new product</h2>
        <form action="/dashboard/posts" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex gap-2 flex-col">
                <div class="">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" id="title" name="title" class="@error('title') invalid:border-red-500 @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type title" required autofocus value="{{ old('title') }}">
                    @error('title')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div class="">
                    <label for="slug" class="@error('slug') invalid:border-red-500 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Slug</label>
                    <input type="text" name="slug" id="slug" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type slug" required value="{{ old('slug') }}">
                    @error('slug')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="category" class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                    <select name="category_id" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($categories as $category)
                        @if(old('category_id') == $category->id)
                        <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else 
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="image" class="@error('image') invalid:border-red-500 @enderror block mb-2 text-sm font-medium text-gray-900 dark:text-white">Post Image</label>
                    <img src="" alt="" width="150" class="img-preview mb-2"> 
                    <input type="file" id="image" name="image" onchange="previewImage()" class="file-input file-input-bordered file-input-sm w-full max-w-xs" />
                    @error('image')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                </div>
                <div>
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Body</label>
                    @error('body')
                    <div class="mt-2 text-sm text-red-500">{{ $message }}</div>
                    @enderror
                    <input id="body" type="hidden" name="body" value="{{ old('body') }}">
                    <trix-editor input="body"></trix-editor>
                </div>
            </div>
            <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-primary-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800">
                Create new post
            </button>
        </form>
    </div>
</section>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    title.addEventListener('change', function(){
        fetch('/dashboard/posts/checkSlug?title=' + title.value).then(response=>response.json()).then(data => slug.value = data.slug);
    });

    // nonaktifkan fitur di trix
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    

</script>
@endsection
