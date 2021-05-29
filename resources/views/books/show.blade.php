@extends('layouts.template')

@section('title', 'Bookmarks ' . $book->title)

@section('content')
    <h1> Title: {{$book->title}} </h1>
    <p> <strong> Author: </strong>{{$book->author}} </p>
    <p> <strong> Type: </strong>{{$book->type}}</p>
    <p> <strong> Aggregation date: </strong>{{$book->created_at}}</p>
    <p> <strong> Update date: </strong>{{$book->updated_at}}</p>
    <form action="{{route('books.destroy', $book)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit"> Delete book </button>
    </form>
    <a href="{{route('books.edit', $book->id)}}">Edit book</a> <br>
    <a href="{{route('dashboard')}}">Back to books</a> <br>
    <h3>BOOKMARKS</h3>
    <a href="{{route('notes.create',$book)}}">Add bookmark</a>
    <ul>
        @foreach ($notes as $note)
            <li> 
                <p> <strong>Description: </strong> <a href="{{route('notes.show', $note)}}">{{$note->description}} </a>
                <br><strong>Body: </strong>{{$note->body}}</p>
            </li>
        @endforeach
    </ul>
@endsection