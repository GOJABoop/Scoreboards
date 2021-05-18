@extends('layouts.template')

@section('title', 'Bookmakrs')

@section('content')
    <h1> Books </h1>
    <a href="{{route('books.add')}}">Add book</a>
    <ul>
        @foreach ($books as $book)
            <li> 
                <a href="{{route('books.show', $book->id)}}">{{$book->title}} </a>
            </li>
        @endforeach
    </ul>

    {{$books->links()}}
@endsection