@extends('layouts.template')

@section('title', 'Bookmarks ' . $book->title)

@section('content')
    <h1> Edit a book </h1>
    <form action="{{route('books.update', $book)}}" method="POST">
        @csrf
        @method('put')
        <label>
            Title: <input type="text" name="title" value="{{old('title',$book->title)}}">
        </label>
        @error('title')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <label>
            Author: <input type="text" name="author" value="{{ old('author',$book->author)}}">
        </label>
        @error('author')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <label>
            Type: <input type="text" name="type" value="{{old('type',$book->type)}}">
        </label>
        @error('type')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <button type="submit">Edit book </button>
    </form>
@endsection