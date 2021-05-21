@extends('layouts.template')

@section('title', 'Bookmarks notes ' . $book->title)

@section('content')
    <h1>BookMarks {{$book->title}}</h1>
    <a href="{{route('notes.create',$book)}}">Add bookmark</a>
    <ul>
        @foreach ($notes as $note)
            <li> 
                <p>{{$note->description}}</p>
            </li>
        @endforeach
    </ul>

@endsection