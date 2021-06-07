@extends('layouts.windmil')

@section('title', 'Task: ' . $task->title)

@section('content')
    <h1> <strong>Title: </strong> {{$task->title}} </h1>
    <p> <strong> Description: </strong>{{$task->description}} </p>
    <p> <strong> Due date: </strong>{{$task->due_date}}</p>
    <p> <strong> Aggregation date: </strong>{{$task->created_at}}</p>
    <p> <strong> Update date: </strong>{{$task->updated_at}}</p>
    <br>
    <form action="{{route('tasks.destroy', $task)}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit"> Delete task </button>
    </form>
    <a href="{{route('tasks.edit', $task->id)}}">Edit task</a> <br>
@endsection