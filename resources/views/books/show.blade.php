@extends('layouts.windmil')

@section('title', 'Book: ' . $book->title)

@section('content')
    <h1> <strong>Title: </strong> {{$book->title}} </h1>
    <p> <strong> Author: </strong>{{$book->author}} </p>
    <p> <strong> Type: </strong>{{$book->type}}</p>
    <p> <strong> Aggregation date: </strong>{{$book->created_at}}</p>
    <p> <strong> Update date: </strong>{{$book->updated_at}}</p>
    <br>
    <form action="{{route('books.destroy', $book)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit"> Delete book </button>
    </form>
    <a href="{{route('books.edit', $book->id)}}">Edit book</a> <br>
    <h3><strong>BOOKMARKS</strong></h3>
    <a href="{{route('notes.create',$book)}}">Add bookmark</a>
    <ul>
        @foreach ($notes as $note)
            <li> 
                <p> <strong>Description: </strong> <a href="{{route('notes.show', $note)}}">{{$note->description}} </a>
                <br><strong>Body: </strong>{{$note->body}}</p>
                <br>
            </li>
        @endforeach
    </ul>
@endsection