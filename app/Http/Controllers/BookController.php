<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::orderBy('id','desc')->paginate();
        return view('books.index',compact('books'));
    }

    public function add(){
        return view('books.add');
    }

    public function store(Request $request){
        $book = new Book();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->save();
        return redirect()->route('books.show', $book);
    }

    public function show(Book $book){
        //compact('book');  = ['book' => $book]
        return view('books.show', compact('book')); 
    }

    public function edit(Book $book){
        return view('books.edit', compact('book'));
    }

    public function update(Request $request, Book $book){
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->save();
        return redirect()->route('books.show', $book);
    }
}
