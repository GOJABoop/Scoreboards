<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Facade\FlareClient\View;
use App\Models\Book;
use App\Models\Note;
use App\Http\Requests\StoreNote;
use App\Http\Requests\UpdateNote;

class NoteController extends Controller
{
    public function index(Book $book){
        $notes = Book::find($book->id)->notes;
        return view('notes.index',compact('book','notes'));
    }

    public function create(Book $book){
        return view('notes.create',compact('book'));
    }

    public function store(StoreNote $request){
        $note = Note::create($request->all());
        return redirect()->route('books.index');
    }

    public function show(Note $note){
        return view('notes.show',compact('note'));
    }

    public function edit(Note $note){
        return view('notes.edit', compact('note'));
    }

    public function update(UpdateNote $request, Note $note){
        $note->update($request->all());
        return redirect()->route('notes.show',$note);
    }

    public function destroy(Note $note){
        $note->delete();
        return redirect()->route('books.index');
    }

}
