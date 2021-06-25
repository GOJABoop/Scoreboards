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
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M4 20h4l10.5 -10.5a1.5 1.5 0 0 0 -4 -4l-10.5 10.5v4" />
                    <line x1="13.5" y1="6.5" x2="17.5" y2="10.5" />
                  </svg>
                </button>
            </form>
          </div>
          <form action="{{route('guides.destroy',$guide)}}" method="POST">
            @csrf
            @method('delete')
            <button class="flex items-center justify-between px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                <span>Delete</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="16" height="16" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <line x1="4" y1="7" x2="20" y2="7" />
                    <line x1="10" y1="11" x2="10" y2="17" />
                    <line x1="14" y1="11" x2="14" y2="17" />
                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                  </svg>
                <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
          </form>
        </div>
    </div>
@endsection