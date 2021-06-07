@extends('layouts.windmil')

@section('title', 'Tasks')

@section('content')
    <a href="{{route('tasks.create')}}">Add task</a> <br><br>
    <ul>
        @foreach ($tasks as $task)
            <li> 
                <a href="{{route('tasks.show', $task)}}">{{$task->title}} </a>
            </li>
        @endforeach
    </ul>
    {{$tasks->links()}}
@endsection