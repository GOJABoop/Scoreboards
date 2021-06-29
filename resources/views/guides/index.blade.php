@extends('layouts.windmil')

@section('title', 'Published guides')

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong>Published guides</strong></label>
    </div>
    <br>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                  <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    {{--<th class="px-4 py-3">ID</th>--}}
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">description</th>
                    <th class="px-4 py-3">Created</th>
                    <th class="px-4 py-3">
                        <form action="{{route('guides.create')}}" method="GET">
                            @csrf
                            <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red">
                                Add guide
                            </button>
                        </form>
                    </th>
                  </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($guides as $guide)
                        <tr class="text-gray-700 dark:text-gray-400">
                            {{--TITLE--}}
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <a href="{{route('guides.show',$guide)}}" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            {{$guide->title}}
                                        </a>
                                    </div>
                                </div>
                            </td>
                            {{--AUTHOR--}}
                            <td class="px-4 py-3 text-sm">
                                {{$guide->description}}
                            </td>
                            {{--TYPE--}}
                            <td class="px-4 py-3 text-xs">
                                {{$guide->created_at->format('d/m/Y')}}
                            </td>
                            {{--ACTIONS--}}
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <form action="{{route('guides.edit',$guide)}}" method="GET">
                                        @csrf
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-full active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{route('guides.destroy',$guide)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple" aria-label="Like">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{--PAGINATION--}}
        <div class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
          
        </div>
      </div>
      {{$guides->links()}}  
@endsection