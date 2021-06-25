@extends('layouts.windmil')

@section('title', 'Task: ' . $task->title)

@section('content')
    <div class="min-w-0 p-4 text-white bg-purple-600 rounded-lg shadow-xs">
        <label><strong>{{$task->title}}</strong></label>
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
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar" width="32" height="32" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <rect x="4" y="5" width="16" height="16" rx="2" />
                <line x1="16" y1="3" x2="16" y2="7" />
                <line x1="8" y1="3" x2="8" y2="7" />
                <line x1="4" y1="11" x2="20" y2="11" />
                <line x1="11" y1="15" x2="12" y2="15" />
                <line x1="12" y1="15" x2="12" y2="18" />
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
                        class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-lg active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple">
                        Edit
                    </button>
                </form>
            </div>
            <div>
                <form action="{{route('tasks.destroy',$task)}}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple">
                        Delete
                    </button>
                </form>
            </div>
        </div>
    </div> 
@endsection
