@extends('layouts.template')

@section('title', 'Bookmarks ' . $book->title)

@section('content')
    <h1> Edit a book </h1>
    <form action="{{route('books.update', $book)}}" method="POST">
        @csrf
        @method('put')
        <label>
            Title:
            <input type="text" name="title" value="{{$book->title}}">
        </label>
        <br>
        <label>
            Author:
            <input type="text" name="author" value="{{$book->author}}">
        </label>
        <br>
        <label>
            Type:
            <input type="text" name="type" value="{{$book->type}}">
        </label>
        <br>
        <button type="submit">Edit book </button>
    </form>
@endsection