@extends('layouts.template')

@section('title', 'Bookmarks')

@section('content')
    <h1> Add new book </h1>
    <form action="{{route('books.store')}}" method="POST">
        @csrf
        <label>
            Title:
            <input type="text" name="title">
        </label>
        <br>
        <label>
            Author:
            <input type="text" name="author">
        </label>
        <br>
        <label>
            Type:
            <input type="text" name="type">
        </label>
        <br>
        <button type="submit">Add book </button>
    </form>
@endsection
