@extends('layouts.windmil')

@section('title', 'Books')

@section('content')
{{--@php
    use App\Models\Book;
    $books = Book::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
@endphp--}}
    <a href="{{route('books.create')}}">Add book</a> <br><br>
    <ul>
        @foreach ($books as $book)
            <li> 
                <a href="{{route('books.show', $book)}}">{{$book->title}} </a>
            </li>
        @endforeach
    </ul>

    {{$books->links()}}
@endsection

