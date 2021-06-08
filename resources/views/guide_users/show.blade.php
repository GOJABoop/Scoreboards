@extends('layouts.windmil')

@section('title', 'Guide: ' . $guide->title)

@section('content')
    <h1> <strong>Guide_id: </strong> {{$guide->id}} </h1>
    {{print $guide}}
    {{--<p> <strong> Description: </strong>{{$task->description}} </p>
    <p> <strong> Due date: </strong>{{$task->due_date}}</p>
    <p> <strong> Aggregation date: </strong>{{$task->created_at}}</p>
    <p> <strong> Update date: </strong>{{$task->updated_at}}</p>
    <br>--}}
    <form action="#{{--route('guide_users.destroy', $guide)--}}" method="POST">
        @csrf
        @method('delete')
        <button type="submit"> Unfollow guide </button>
    </form>
@endsection