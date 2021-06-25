@extends('layouts.windmil')

@section('title', 'Add bookmark')

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label><strong>{{$book->title}}</strong></label><br>
        <label> <strong> Add bookmark </strong></label>
    </div>    
    <form action="{{route('notes.store',$book)}}", method="POST">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{--DESCRIPTION--}}
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Description</span>
              <input 
                type="text" 
                name="description" 
                value="{{old('description')}}"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                placeholder="Write something meaningful">
            </label>
            @error('description')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
            {{--BODY--}}
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Body</span>
                <textarea 
                    name="body"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                    rows="3" 
                    placeholder="Enter some description"
                >{{old('body')}}</textarea>
            </label>
            @error('body')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
        </div>
        {{--BUTTOM--}}
        <button 
            type="submit"
            Class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
            Add bookmark </button>
    </form> 

@endsection