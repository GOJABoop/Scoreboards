@extends('layouts.windmil')

@section('title', 'Add bookmark: ' . $book->title)

@section('content')
    <h1><strong> New bookmark:</strong> {{$book->title}}</h1>
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

        <br><br><button type="submit">Add bookmark </button>
    </form> 
@endsection