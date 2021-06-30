<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideUserController extends Controller{
    public function index(){
        $user = User::find(Auth::id());
        $guides = Guide::with('user')->get();
        return view('guide_users.index',compact('user','guides'));
    }
    
    public function show(Guide $guide){
        $files = $guide->files;
        return view('guide_users.show', compact('guide','files')); 
    }

    public function store(Request $request){
        $user = User::find(Auth::id());
        $user->guides()->attach($request->guide_id);
        return redirect()->route('guide_users.index')
            ->with(['message' => 'New guide has been followed!']);
    }

    public function destroy(Guide $guide){
        $user = User::find(Auth::id());
        $user->guides()->detach($guide->id);
        return redirect()->route('guide_users.index')
            ->with(['message' => 'Guide has been unfollowed!']);
    }

    public function showAll(){
        $guides = Guide::with('user')->get(); //Eager loading
        return view('guide_users.show_all',compact('guides'));
    }
}
