@extends('layouts.windmil')

@section('title', 'Add book')

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong> Add book </strong> </label>
    </div>
    <form action="{{route('books.store')}}" method="POST">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Title</span>
              <input 
                type="text" 
                name="title" 
                value="{{old('title')}}"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                placeholder="Hamlet">
            </label>
            @error('title')
                <small> *{{$message }} </small>
            @enderror
            
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Author</span>
                <input 
                    type="text" 
                    name="author" 
                    value="{{old('author')}}"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                    placeholder="William Shakespeare">
            </label>
            @error('author')
                <small> *{{$message }} </small>
            @enderror
            
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Type</span>
                <input
                    type="text" 
                    name="type" 
                    value="{{old('type')}}" 
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                    placeholder="Theater">
            </label>
            @error('type')
                <small> *{{$message }} </small>
            @enderror
        </div>
        <button 
            type="submit" 
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
            Add book </button>
    </form>
    
   
@endsection
