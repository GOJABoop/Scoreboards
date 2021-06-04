@php
    use App\Models\Book;
    $books = Book::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
@endphp

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My books') }}
        </h2>
    </x-slot>

    <div class="py-12"> 
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="{{route('books.create')}}">Add book</a>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{--<ul>
                    @foreach ($books as $book)
                        <li> 
                            <a href="{{route('books.show', $book)}}">{{$book->title}} </a>
                        </li>
                    @endforeach
                </ul>
                {{$books->links()}}--}}
                <x-jet-welcome />
            </div>
        </div>
    </div>
</x-app-layout>
