<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;


class TasksController extends Controller
{

    // --------- get tasks------------------
    public function index()
    {
        $user = Auth::user();        
        $tasks = Task::where('user_id', $user->id)->get();

        return response()->json($tasks);
    }


    // --------- create task------------------
    public function store(Request $request)
    {
        $request->validate(Task::rules());
        $user = Auth::user();        
        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
            'user_id' => $user->id,
        ]);

        return response()->json(compact('task'));
    }


    // --------- update task------------------
    public function update(Request $request, Task $task)
    {
        $request->validate(Task::rules(true, $task->id));

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'completed' => $request->completed,
        ]);

        return response()->json(compact('task'));
    }

    public function destroy($taskId)
    {
        Task::find($taskId)->delete();

        return response()->json(['message' => 'Task deleted']);
    }


// ---------test methode create task------------------
    public function createSampleTask()
    {
        Task::create([
            'title' => 'Sample Task 2',
            'description' => 'This is a sample task description.',
            'completed' => false,
        ]);

        return response()->json(['message' => 'Sample task created.']);
    }
}



