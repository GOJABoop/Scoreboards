@extends('layouts.windmil')

@section('title', 'Guide: ' . $guide->title)

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
         <form action="{{route('guide_users.destroy', $guide)}}" method="POST">
            @csrf
            @method('delete')
            <button type="submit"
            class="mb-2 text-sm font-medium text-red-600 dark:text-red-400"> Unfollow guide </button>
        </form>
    </div>
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Body
        </h4>
        <p class="text-sm text-gray-600 dark:text-gray-400">
            {{$guide->body}}
        </p>
    </div>
@endsection