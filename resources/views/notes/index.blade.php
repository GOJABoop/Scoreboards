@extends('layouts.windmil')

@section('title', 'Bookmarks' . $book->title)

@section('content')
    <h1>BookMarks {{$book->title}}</h1>
    <a href="{{route('notes.create',$book)}}">Add bookmark</a>
    <ul>
        @foreach ($notes as $note)
            <li> 
                <p>{{$note->description}}</p>
            </li>
            <br><br>
        @endforeach
    </ul>

@endsection