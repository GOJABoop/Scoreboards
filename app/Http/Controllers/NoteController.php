<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facade\FlareClient\View;
use App\Models\Book;
use App\Models\Note;

class NoteController extends Controller
{
    public function index(Book $book){
        $notes = Book::find($book->id)->notes;
        return view('notes.index',compact('book','notes'));
    }

    public function create(Book $book){
        return view('notes.create',compact('book'));
    }

    public function store(Request $request){
        $note = new Note();
        $note->book_id = $request->book_id;
        $note->description = $request->description;
        $note->body = $request->body;
        //$note->save();
        return redirect()->route('books.index'/*,$request*/);
    }
}
