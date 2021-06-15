@extends('layouts.windmil')

@section('title', 'Books')

@section('content')
{{--@php
    use App\Models\Book;
    $books = Book::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
@endphp--}}
    <label> <strong>Books</strong></label>
    <form action="{{route('books.create')}}" method="GET">
        @csrf
        <button type="submit" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
            Add book
        </button>
    </form>   
    <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            {{--<th class="px-4 py-3">ID</th>--}}
            <th class="px-4 py-3">Title</th>
            <th class="px-4 py-3">Author</th>
            <th class="px-4 py-3">Type</th>
            <th class="px-4 py-3">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($books as $book)
                <tr class="text-gray-700 dark:text-gray-400">
                    {{--TITLE--}}
                    <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                            <img class="object-cover w-full h-full rounded-full" src="" alt="" loading="lazy">
                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <a href="{{route('books.show',$book)}}" class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$book->title}}
                                </a>
                            </div>
                        </div>
                    </td>
                    {{--AUTHOR--}}
                    <td class="px-4 py-3 text-sm">
                        {{$book->author}}
                    </td>
                    {{--TYPE--}}
                    <td class="px-4 py-3 text-xs">
                        {{$book->type}}
                    </td>
                    {{--ACTIONS--}}
                    <td class="px-4 py-3">
                        <div class="flex items-center space-x-4 text-sm">
                            <form action="{{route('books.edit',$book)}}" method="GET">
                                @csrf
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-blue-600 border border-transparent rounded-full active:bg-blue-600 hover:bg-blue-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                    </svg>
                                </button>
                            </form>
                            <form action="{{route('books.destroy',$book)}}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple" aria-label="Like">
                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
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

    {{$books->links()}}
@endsection

