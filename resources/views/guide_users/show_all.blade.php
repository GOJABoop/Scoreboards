@extends('layouts.windmil')

@section('title', 'Guides')

@section('content')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong>All Guides</strong></label>
    </div>
    
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Author</th>
                    <th class="px-4 py-3">Created</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($guides as $guide)
                        <tr>
                            {{--TITLE--}}
                            <td class="px-4 py-3 text-xs">
                                <a href="#" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$guide->title}}
                                </a>
                            </td>
                            {{--CREATED DATE--}}
                            <td class="px-4 py-3 text-sm">
                                {{$guide->user->name}}
                            </td>
                            {{--UPDATED DATE--}}
                            <td class="px-4 py-3 text-sm">
                                {{$guide->created_at->format('d/m/Y')}}
                            </td>
                            {{--ACTIONS--}}
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <form action="{{route('guide_users.store')}}", method="POST">
                                        @csrf
                                        <input id="guide_id" name="guide_id" type="hidden" value="{{$guide->id}}">
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-transparent-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-transparent-700 focus:outline-none focus:shadow-outline-red" aria-label="Like">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fd0061" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
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
@endsection