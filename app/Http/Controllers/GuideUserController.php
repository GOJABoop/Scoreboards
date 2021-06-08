<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideUserController extends Controller{
    public function index(){
        $user = User::find(Auth::id());
        $guides = Guide::get();
        return view('guide_users.index',compact('user','guides'));
    }
    
    public function show(Guide $guide){
        return view('guide_users.show', compact('guide')); 
    }

    public function store(Request $request){
        $user = User::find(Auth::id());
        $user->guides()->attach($request->guide_id);
        return redirect()->route('guide_users.index');
    }

    public function destroy(Guide $guide){
        $user = User::find(Auth::id());
        $user->guides()->detach($guide->id);
        return redirect()->route('guide_users.index');
    }
}
