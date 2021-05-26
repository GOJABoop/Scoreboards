@extends('layouts.template')

@section('title', 'Bookmarks notes ' . $book->title)

@section('content')
    <h1>Add new bookmark {{$book->title}}</h1>
    <form action="{{route('notes.store',$book)}}", method="POST">
        @csrf
        <br>
        <label>
            Description: <br><input type="text" name="description" value="{{old('description')}}">
        </label>
        @error('description')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <label>
            Body: <br><textarea name="body" rows="5" value="{{old('body')}}"></textarea>
        </label>
        @error('body')
            <small> *{{$message }} </small>
        @enderror
        <br><button type="submit">Add bookmark </button>
    </form> 
@endsection