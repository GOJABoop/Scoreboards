<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\task;
use App\Http\Requests\UpdateTask;
use App\Http\Requests\StoreTask;

class TaskController extends Controller
{
    public function index(){
        $tasks = Task::orderBy('id','desc')->where('user_id',"=",Auth::id())->paginate();
        return view('tasks.index',compact('tasks'));
    }

    public function create(){
        return view('tasks.create');
    }

    public function store(Request /*StoreTask*/ $request){
        //$task = Task::create($request->all());
        $task = new Task();
        $task->user_id = Auth::id();
        $task->title = $request->title;
        $task->description = $request->description;
        $task->due_date = $request->due_date;
        $task->save();
        return redirect()->route('tasks.show', $task);
    }

    public function show(Task $task){
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
