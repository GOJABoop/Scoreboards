@extends('layouts.windmil')

@section('title', 'Add task')

@section('content')
    <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
        <label> <strong> Add task </strong> </label>
    </div>
    <form action="{{route('tasks.store')}}" method="POST">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            {{--TITLE--}}
            <label class="block text-sm">
              <span class="text-gray-700 dark:text-gray-400">Title</span>
              <input 
                type="text" 
                name="title" 
                value="{{old('title')}}"
                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                placeholder="Study for test">
            </label>
            @error('title')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
            {{--DESCRIPTION--}}
            <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">Description</span>
                <textarea 
                    name="description"
                    class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray" 
                    rows="3" 
                    placeholder="Enter some description"
                >{{old('description')}}</textarea>
            </label>
            @error('description')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
            {{--DUE DATE--}}
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Due date</span>
                <input 
                    type="date" 
                    name="due_date" 
                    value="{{old('due_date')}}"
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" 
                    placeholder="The Aleph"
                >
            </label>
            @error('due_date')
                <span class="text-xs text-red-600 dark:text-red-400">
                    *{{$message }}
                </span>
            @enderror
        </div>
        <button 
            type="submit" 
            class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Add task
        </button>
    </form>
    <!--Imagen de la mascota-->
    {{--<div class="form-group">
        <label for="foto"><strong>Subir foto:</strong></label><br>
        <img class="img-thumbnail" id="fotoPreview" alt="Imagen subida" width="200" height="auto"/>
        <div class="custom-file">
            <input class="custom-file-input form-control" type="file" name="foto" id="foto" onchange="document.getElementById('fotoPreview').src = window.URL.createObjectURL(this.files[0])">
            <label class="custom-file-label" for="foto">Seleccionar imagen...</label>
        </div>
    </div>--}}
    
@endsection