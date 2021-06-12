@extends('layouts.windmil')

@section('title', 'Task: ' . $task->title)

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <h4 class="mb-4 font-semibold">
            <strong>{{$task->title}}</strong>
        </h4>
    </div>
    <div class="min-w-0 p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
        <h4 class="mb-4 font-semibold text-gray-600 dark:text-gray-300">
          Description
        </h4>
        <p class="text-gray-600 dark:text-gray-400">
           {{$task->description}}
        </p>
        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
            Aggregation date: {{$task->created_at}} <br>
             Update date: {{$task->updated_at}}
        </p>
    </div> <br>
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">
        <!-- DUE DATE -->
        <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500">
            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0 014 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z"></path>
            </svg>
          </div>
          <div>
            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
              Due date
            </p>
            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                {{$task->due_date}}
            </p>
          </div>
        </div>
        <div>
            <div>
                <form action="{{route('tasks.edit',$task)}}" method="GET">
                    @csrf
                    <button 
                        type="submit" 
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Edit
                    </button>
                </form>
            </div>
            <div>
                <form action="{{route('tasks.destroy',$task)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div> 
@endsection
