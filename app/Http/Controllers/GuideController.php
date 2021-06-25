<?php

namespace App\Http\Controllers;

use App\Models\Guide;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateGuide;
use App\Http\Requests\StoreGuide;
use Illuminate\Support\Facades\Gate;

class GuideController extends Controller
{
    public function index(){
        $guides = Guide::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
        return view('guides.index',compact('guides'));
    }

    public function create(){
        return view('guides.create');
    }

    public function store(StoreGuide $request){
        $guide = Guide::create($request->all());
        return redirect()->route('guides.show', $guide);
    }

    public function show(Guide $guide){
        Gate::authorize('show-guide',$guide);
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
