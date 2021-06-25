<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateTask;
use App\Http\Requests\StoreTask;
use Illuminate\Support\Facades\Gate;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
        return view('tasks.index',compact('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(StoreTask $request){
        $task = Task::create($request->all());
        return redirect()->route('tasks.index', $task);
    }

    public function show(Task $task){
        Gate::authorize('show-task',$task);
        return view('tasks.show', compact('task')); 
    }

    public function edit(Task $task){
        return view('tasks.edit', compact('task'));
    }

    public function update(UpdateTask $request, Task $task){
        $task->update($request->all());
        return redirect()->route('tasks.show', $task);
    }

    public function destroy(Task $task){
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
