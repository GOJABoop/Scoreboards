@extends('layouts.windmil')

@section('title', 'Add book')

@section('content')
    <h1> <strong> Add book </strong> </h1>
    <form action="{{route('books.store')}}" method="POST">
        @csrf
        <br>
        <label>
            Title: <input type="text" name="title" value="{{old('title')}}">
        </label>
        @error('title')
            <small> *{{$message }} </small>
        @enderror
        
        <br><br>
        <label>
            Author: <input type="text" name="author" value="{{old('author')}}">
        </label>
        @error('author')
            <small> *{{$message }} </small>
        @enderror

        <br><br>
        <label>
            Type: <input type="text" name="type" value="{{old('type')}}">
        </label>
        @error('type')
            <small> *{{$message }} </small>
        @enderror
        <br><br>
        <button type="submit">Add book </button>
    </form>
@endsection
