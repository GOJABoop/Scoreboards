<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function createBook(){
        return view('books.createBook');
    }

    public function showBook($book){
        //compact('book');  = ['book' => $book]
        return view('books.showBook', compact('book')); 
    }
}
