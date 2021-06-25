<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Note;
use App\Http\Requests\StoreNote;
use App\Http\Requests\UpdateNote;
use Illuminate\Support\Facades\Gate;

class NoteController extends Controller
{
    public function index(Book $book){
        $notes = Book::find($book->id)->notes;
        return view('notes.index',compact('book','notes'));
    }

    public function create(Book $book){
        return view('notes.create',compact('book'));
    }

    public function store(StoreNote $request,Book $book){
        $request->merge(['book_id' => $book->id]);
        Note::create($request->all());
        return redirect()->route('books.show',compact('book'));
    }

    public function show(Note $note){
        Gate::authorize('show-note',$note);
        return view('notes.show',compact('note'));
    }

    public function edit(Note $note){
        return view('notes.edit', compact('note'));
    }

    public function update(UpdateNote $request, Note $note){
        $note->update($request->all());
        $book = Note::find($note->id)->book;
        return redirect()->route('books.show',compact('book'));
    }

    public function destroy(Note $note){
        $book = Note::find($note->id)->book;
        $note->delete();
        return redirect()->route('books.show',compact('book'));
    }
}
