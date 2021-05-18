<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Facade\FlareClient\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(){
        $books = Book::paginate();
        return view('books.index',compact('books'));
    }

    public function add(){
        return view('books.add');
    }

    public function show($id){
        //compact('book');  = ['book' => $book]
        $book = Book::find($id);
        return view('books.show', compact('book')); 
    }
}
