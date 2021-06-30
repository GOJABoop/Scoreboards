@extends('layouts.windmil')

@section('title', 'Guides')

@section('content')
    @include('partials.user-message')
    <div class="min-w-0 p-4 text-white bg-blue-600 rounded-lg shadow-xs">
        <label> <strong>Guides</strong></label>
    </div>
    
    <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
        <label class="block mt-4 text-sm">
            <div class="relative text-gray-500 focus-within:text-purple-600">
                <label class="block mt-4 text-sm">
                    <form action="{{route('guide_users.store')}}", method="POST">
                        @csrf
                        <select 
                            class="block w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input"
                            name="guide_id">
                            @foreach ($guides as $guide)
                                <option value="{{$guide->id}}">{{$guide->title}}</option>
                            @endforeach
                        </select>
                        <button 
                            class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-r-md active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red"
                            type="submit">
                            Follow
                        </button>
                    </form>
                </label>
            </div>
        </label>
    </div>
    <form action="{{route('guide_users.show_all')}}" method="GET">
        @csrf
        <button type="submit"
        class="mb-2 text-sm font-medium text-red-600 dark:text-red-400"> see all guides </button>
    </form>
    <div class="w-full overflow-hidden rounded-lg shadow-xs">
        <div class="w-full overflow-x-auto">
            <table class="w-full whitespace-no-wrap">
                <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="px-4 py-3">Title</th>
                    <th class="px-4 py-3">Created</th>
                    <th class="px-4 py-3">Updated</th>
                    <th class="px-4 py-3">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                    @foreach ($user->guides as $guide)
                        <tr>
                            {{--TITLE--}}
                            <td class="px-4 py-3 text-xs">
                                <a href="{{route('guide_users.show',$guide)}}" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$guide->title}}
                                </a>
                            </td>
                            {{--CREATED DATE--}}
                            <td class="px-4 py-3 text-sm">
                                {{$guide->created_at->format('d/m/Y')}}
                            </td>
                            {{--UPDATED DATE--}}
                            <td class="px-4 py-3 text-sm">
                                {{$guide->updated_at->format('d/m/Y')}}
                            </td>
                            {{--ACTIONS--}}
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <form action="{{route('guide_users.destroy', $guide)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-transparent-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-transparent-700 focus:outline-none focus:shadow-outline-red" aria-label="Like">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="#fd0061" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                                <line x1="3" y1="3" x2="21" y2="21" />
                                                <path d="M10.012 6.016l1.981 -4.014l3.086 6.253l6.9 1l-4.421 4.304m.012 4.01l.588 3.426l-6.158 -3.245l-6.172 3.245l1.179 -6.873l-5 -4.867l6.327 -.917" />
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