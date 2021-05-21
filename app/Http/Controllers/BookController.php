<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;

class BookController extends Controller
{
    public function index(){
        $books = Book::orderBy('id','desc')->paginate();
        return view('books.index',compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(StoreBook $request){
        $book = Book::create($request->all());
        return redirect()->route('books.show', $book);
    }

    public function show(Book $book){
        return view('books.show', compact('book')); 
    }

    public function edit(Book $book){
        return view('books.edit', compact('book'));
    }

    public function update(UpdateBook $request, Book $book){
        $book->update($request->all());
        return redirect()->route('books.show', $book);
    }

    public function destroy(Book $book){
        $book->delete();
        return redirect()->route('books.index');
    }
}
