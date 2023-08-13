<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;


class TasksController extends Controller
{

    // --------- Get a list of tasks------------------
    public function index()
    {
        $user = Auth::user();        
        $tasks = Task::where('user_id', $user->id)->get();

        return response()->json($tasks);
    }


    // --------- Store a new tasks------------------
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


    // --------- Update a task------------------
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

    // --------- Delete a task------------------
    public function destroy($taskId)
    {
        Task::find($taskId)->delete();

        return response()->json(['message' => 'Task deleted']);
    }

}



