@extends('layouts.windmil')

@section('title', 'Publication: '. $guide->title)

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong>{{$guide->title}}</strong></label>
    </div>
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <p class="text-gray-600 dark:text-gray-400">
            {{$guide->description}}
        </p>
     
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            By {{$guide->author}} <br>
            Aggregate: {{$guide->created_at}}<br>
            Last update: {{$guide->updated_at}}
         </p>
    </div>
    
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Body
        </h4>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{$guide->body}}
        </p>
    </div>
    <div class="flex flex-col flex-wrap mb-8 space-y-4 md:flex-row md:items-end md:space-x-4">
        <div>
            <form action="{{route('guides.edit',$guide)}}" method="GET">
                @csrf
                <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                <span>Edit</span>
                <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                    <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
                </button>
            </form>
          </div>
          <form action="{{route('guides.destroy',$guide)}}" method="POST">
            @csrf
            @method('delete')
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                <span>Delete</span>
                <svg class="w-4 h-4 ml-2 -mr-1" fill="currentColor" aria-hidden="true" viewBox="0 0 20 20">
                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
          </form>
        </div>
    </div>
@endsection