@extends('layouts.windmil')

@section('title', 'Add task')

@section('content')
    <h1> <strong> Add task </strong> </h1>
    <form action="{{route('tasks.store')}}" method="POST">
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
            Description: <input type="text" name="description" value="{{old('description')}}">
        </label>
        @error('description')
            <small> *{{$message }} </small>
        @enderror

        <br><br>
        <label>
            Due date: <input type="date" name="due_date" value="{{old('due_date')}}">
        </label>
        @error('due_date')
            <small> *{{$message }} </small>
        @enderror
        <br><br>
        <button type="submit">Add task </button>
    </form>
@endsection