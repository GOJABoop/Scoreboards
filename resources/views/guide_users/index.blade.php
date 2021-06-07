@extends('layouts.windmil')

@section('title', 'Guides')

@section('content')
    {{--<a href="{{route('tasks.create')}}">Add task</a> <br><br>--}}
    <ul>
        @foreach ($user->guides as $guide)
            <li> 
                <a href="{{route('guide_users.show', $guide)}}">{{$guide->id}} </a>
                <label> Title: {{$guide->title}}</label>
            </li>
        @endforeach
    </ul>
    {{--$tasks->links()--}}
@endsection