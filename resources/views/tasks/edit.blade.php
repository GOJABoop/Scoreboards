@extends('layouts.windmil')

@section('title', 'Edit book: ' . $task->title)

@section('content')
    <h2> <strong> Edit Task </strong>{{$task->title}}</h2>
    <form action="{{route('tasks.update', $task)}}" method="POST">
        @csrf
        @method('put')
        <br>
        <label>
            Title: <input type="text" name="title" value="{{old('title',$task->title)}}">
        </label>
        @error('title')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <label>
            Description: <input type="text" name="description" value="{{ old('description',$task->description)}}">
        </label>
        @error('description')
            <small> *{{$message }} </small>
        @enderror
        
        <br>
        <label>
            Due date: <input type="date" name="due_date" value="{{old('due_date',$task->due_date)}}">
        </label>
        @error('due_date')
            <small> *{{$message }} </small>
        @enderror
        
        <br><br>
        <button type="submit">Edit task </button>
    </form>
@endsection