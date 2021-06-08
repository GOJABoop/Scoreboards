@extends('layouts.windmil')

@section('title', 'Guides')

@section('content')
    <form action="{{route('guide_users.store')}}", method="POST">
        @csrf
        <label>Public guides: </label><br>
        <select name="guide_id">
            @foreach ($guides as $guide)
                <option value="{{$guide->id}}">{{$guide->title}}</option>
            @endforeach
        </select>
        <button type="submit">Follow guide</button>
    </form>
    
    <br>
    <ul>
        @foreach ($user->guides as $guide)
            <li>
                <a href="{{route('guide_users.show', $guide->id)}}">{{$guide->title}} </a>
                {{--<label> Title: {{$guide->title}}</label>--}}
            </li>
        @endforeach
    </ul>
    {{--$tasks->links()--}}
@endsection