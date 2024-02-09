<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\Auth;

class TaskController extends Controller
{

    public function index()
    {
        // $tasks = auth()->user()->tasks;
        $tasks=Task::where('users_id', auth()->user()->id)->paginate(6);
        return view('tasks.indexPage', compact('tasks'));
    }


    public function create()
    {
        return view('tasks.createTaskForm');
    }


    public function store(Request $request)
    {
        $request->validate([
            'due_date' => "required",
            'description' => "required",
            'taskname' => "required",
        ]);
        $task = new Task;
        $task->taskname = $request['taskname'];
        $task->due_date = $request['due_date'];
        $task->description = $request['description'];
        $task->users_id = $request['users_id'];
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task inserted successfully');;
    }


    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.viewTask', compact('task'));
    }


    public function edit($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.editTaskForm', compact('task'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'due_date' => "required",
            'description' => "required",
            'taskname' => "required",
        ]);
        $task = Task::findOrFail($id);
        $task->update($request->only(['taskname', 'due_date', 'description']));
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully');
    }


    public function delete($id)
    {
        $data = Task::find($id);
        if(!$data){
            return redirect()->route('tasks.index')->with('fail', 'We can not found data');;
        }
        $data->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully');;
    }
}
