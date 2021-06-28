@extends('layouts.windmil')

@section('title', 'Add task')

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong> Upload file </strong> </label>
    </div>
    <form action="{{route('files.store')}}" method="POST">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{--TITLE--}}
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Select a file</span>
              <input type="file" name="file" id="file" >
            </label>
            @error('title')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
           
        </div>
        <button 
            type="submit" 
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Upload
        </button>
    </form>
@endsection