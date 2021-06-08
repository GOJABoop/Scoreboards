@extends('layouts.windmil')

@section('title', 'Guides')

@section('content')
    <form action="#{{--route('guide_users.store',$guide)--}}", method="POST">
        @csrf
        <label>Public guides: </label>
        <select name="guide">
            @foreach ($user->guides as $guide)
                <option value="{{$guide}}">{{$guide->title}}</option>
            @endforeach
        </select>
        <button type="submit">Follow guide</button>
    </form>
    
    <br>
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