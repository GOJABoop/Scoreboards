@extends('layouts.template')

@section('title', 'Bookmarks')

@section('content')
    <h1> Add new book </h1>
    <form action="{{route('books.store')}}" method="POST">
        @csrf
        <label>
            Title: <input type="text" name="title" value="{{old('title')}}">
        </label>
        @error('title')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <label>
            Author: <input type="text" name="author" value="{{old('author')}}">
        </label>
        @error('author')
            <small> *{{$message }} </small>
        @enderror

        <br>
        <label>
            Type: <input type="text" name="type" value="{{old('type')}}">
        </label>
        @error('type')
            <small> *{{$message }} </small>
        @enderror
        <br>
        <button type="submit">Add book </button>
    </form>
@endsection
