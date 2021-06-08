<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Facade\FlareClient\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBook;
use App\Http\Requests\UpdateBook;

class BookController extends Controller
{
    public function index(){
        //$books = Auth::user()->books()->orderBy('id','desc')->paginate();
        $books = Book::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
        return view('books.index',compact('books'));
    }

    public function create(){
        return view('books.create');
    }

    public function store(Request /*StoreBook*/ $request){
        //$book = Book::create($request->all());
        $book = new Book();
        $book->user_id = Auth::id();
        $book->title = $request->title;
        $book->author = $request->author;
        $book->type = $request->type;
        $book->save();
        return redirect()->route('books.show', $book);
    }

    public function show(Book $book){
        $notes = Book::find($book->id)->notes;
        return view('books.show', compact('book','notes')); 
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
