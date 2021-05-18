@extends('layouts.template')

@section('title', 'Bookmarks ' . $book->title)

@section('content')
    <h1> Title: {{$book->title}} </h1>
    <p> <strong> Author: </strong>{{$book->author}} </p>
    <p> <strong> Type: </strong>{{$book->type}}</p>
    <p> <strong> Aggregation date: </strong>{{$book->created_at}}</p>
    <p> <strong> Update date: </strong>{{$book->updated_at}}</p>
    <a href="{{route('books.index')}}">Back to books</a> <br>
    <a href="">Go to bookmarks</a>
@endsection