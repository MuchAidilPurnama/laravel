<?php
namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::paginate(10);
    return TaskResource::collection($tasks);
}

public function show(Task $task)
{
    return new TaskResource($task);
}

public function store(Request $request)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'due_date' => 'nullable|date',
    ]);

    $goal = Goal::create($validatedData);
    return response()->json($goal, 201);
}

public function update(Request $request, Goal $goal)
{
    $validatedData = $request->validate([
        'title' => 'required|max:255',
        'description' => 'nullable',
        'due_date' => 'nullable|date',
        'completed' => 'boolean',
    ]);

    $goal->update($validatedData);
    return response()->json($goal, 200);
}

public function destroy(Task $task)
{
    $task->delete();
    return response()->json(null, 204);
}
}

