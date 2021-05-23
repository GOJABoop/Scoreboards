@extends('layouts.template')

@section('title', 'Bookmark ' . $note->description)

@section('content')
    <h1> Description: {{$note->description}} </h1>
    <p> <strong> Body: </strong>{{$note->body}} </p>
    <p> <strong> Book ID: </strong>{{$note->book_id}}</p>
    <p> <strong> Aggregation date: </strong>{{$note->created_at}}</p>
    <p> <strong> Update date: </strong>{{$note->updated_at}}</p>

    <form action="{{route('notes.destroy', $note)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit"> Delete bookmark </button>
    </form>
    <a href="{{route('notes.edit', $note->id)}}">Edit bookmark</a> <br>
    <a href="{{route('books.index')}}">Back to books</a> <br>
@endsection