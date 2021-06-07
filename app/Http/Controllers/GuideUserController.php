<?php

namespace App\Http\Controllers;

use App\Models\GuideUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuideUserController extends Controller{
    public function index(){
        $user = User::find(Auth::id());
        return view('guide_users.index',compact('user'));
    }

    public function store(Request /*StoreTask*/ $request){
        //$task = Task::create($request->all());
        $guide_user = new GuideUser();
        $guide_user->user_id = Auth::id();
        $guide_user->guide_id = $request->guide_id;
        $guide_user->save();
        //return redirect()->route('guide_users.show', $guide_user);
        return redirect()->route('guide_users.index');
    }

    public function show(GuideUser $guide){
        return view('guide_users.show', compact('guide')); 
    }

    public function destroy(GuideUser $guide){
        $guide->delete();
        return redirect()->route('guide_users.index');
    }
}
