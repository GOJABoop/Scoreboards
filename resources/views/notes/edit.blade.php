@extends('layouts.windmil')

@section('title', 'Edit bookmark: ' . $note->description)

@section('content')
    <h1><strong>Edit bookmark: </strong> {{$note->description}} </h1>
    <form action="{{route('notes.update',$note)}}", method="POST">
        @csrf
        @method('put')
        <br>
        <label>
            Description: <br><input type="text" name="description" value="{{old('description',$note->description)}}">
        </label>
        @error('description')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <label>
            Body: <br><textarea name="body" rows="5">{{old('body',$note->body)}}</textarea>
        </label>
        @error('body')
            <small> *{{$message }} </small>
        @enderror

        <br><br><button type="submit">Edit bookmark </button>
    </form> 
@endsection