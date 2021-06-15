@extends('layouts.windmil')

@section('title', $note->description)

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong>{{$note->description}}</strong></label>
    </div>
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <p class="text-gray-600 dark:text-gray-400">
            {{$note->body}}
        </p>
        <br>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Aggregate: {{$note->created_at}}<br>
            Last update: {{$note->updated_at}}
         </p>
    </div>
    <div class="flex flex-col flex-wrap mb-4 space-y-4 md:flex-row md:items-end md:space-x-4">
        <!-- Divs are used just to display the examples. Use only the button. -->
        <div>
            <form action="{{route('notes.edit',$note)}}" method="GET">
                @csrf
                <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                    Edit
                </button>
            </form>
        </div>
        <div>
            <form action="{{route('notes.destroy',$note)}}" method="POST">
                @csrf
                @method('delete')
                <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                    Delete
                </button>
            </form>
        </div>
    </div>
@endsection