@extends('dashboard.layouts.main')

@section('container')
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article class="mx-auto w-full max-w-4xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-1 lg:mb-6 not-format">
                    <a href="/dashboard/posts" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 hover:underline text-sm mb-2">
                        <svg class="w-6 h-6 text-blue-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                          </svg>
                          <p>Back to all posts</p>
                    </a>
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full" src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="{{ $post->author->name }}">
                            <div>
                                <p class="text-base text-gray-500 dark:text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                                <a href="/posts?category={{ $post->category->slug }}">                            <span class="bg-{{ $post->category->color }}-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">
                                    {{ $post->category->name }}
                                </span></a>
                            </div>
                        </div>
                    </address>
                    <div class="flex gap-4 mb-2">
                        <a href="/dashboard/posts/{{ $post->slug }}/edit" class="block py-2 px-4 text-white rounded-md bg-blue-500 hover:bg-blue-700 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                        <form action="/dashboard/posts/{{ $post->slug }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="block py-2 px-4 text-white rounded-md bg-red-500 hover:bg-red-700 dark:hover:bg-gray-600 dark:hover:text-white" onclick="return confirm('yakin??')">Delete</button>
                        </form>
                    </div>
                    <h1 class="mb-2 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-4 lg:text-4xl dark:text-white">{{ $post->title }}</h1>
                </header>
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}">
                @endif
                <p>{!! $post->body !!}</p>
            </article>
        </div>
    </main>   
@endsection