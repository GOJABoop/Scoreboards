@extends('layouts.windmil')

@section('title', 'Published guides')

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong>Create guide</strong></label>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <form action="{{route('guides.store')}}", method="POST">
            @csrf
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Title</span>
                <input 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    placeholder="Computing"
                    type="text" 
                    name="title" 
                    value="{{old('title')}}"
                    >
            </label>
            @error('title')
                <small> *{{$message }} </small>
            @enderror

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <input 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                    placeholder="Write something significant"
                    type="text" 
                    name="description" 
                    value="{{old('description')}}"
                    >
            </label>
            @error('description')
                <small> *{{$message }} </small>
            @enderror

            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Author</span>
                <input 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                    placeholder="John Smith"
                    type="text" 
                    name="author" 
                    value="{{old('author')}}"
                    >
            </label>
            @error('author')
                <small> *{{$message }} </small>
            @enderror

            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Body</span>
                <textarea 
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                    rows="18" 
                    placeholder="Enter content."
                    name="body" 
                    >{{old('body')}}</textarea>
            </label>
            @error('body')
                <small> *{{$message }} </small>
            @enderror

            <button 
                type="submit"
                Class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                Public guide 
            </button>
        </form>
    </div>
@endsection