<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guide;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateGuide;
use App\Http\Requests\StoreGuide;

class GuideController extends Controller
{
    public function index(){
        $guides = Guide::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
        return view('guides.index',compact('guides'));
    }

    public function create(){
        return view('guides.create');
    }

    public function store(Request /*StoreBook*/ $request){
        //$book = Book::create($request->all());
        $guide = new Guide();
        $guide->user_id = Auth::id();
        $guide->title = $request->title;
        $guide->description = $request->description;
        $guide->body = $request->body;
        $guide->author = $request->author;
        $guide->save();
        return redirect()->route('guides.show', $guide);
    }

    public function show(Guide $guide){
        return view('guides.show', compact('guide')); 
    }

    public function edit(Guide $guide){
        return view('guides.edit', compact('guide'));
    }

    public function update(UpdateGuide $request, Guide $guide){
        $guide->update($request->all());
        return redirect()->route('guides.show', $guide);
    }

    public function destroy(Guide $guide){
        $guide->delete();
        return redirect()->route('guides.index');
    }
}
