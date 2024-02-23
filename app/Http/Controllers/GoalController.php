<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use Illuminate\Http\Request;
use App\Http\Resources\GoalResource;
use GuzzleHttp\Client;

class GoalController extends Controller
{
    public function index()
    {
        $key = 'goals.all';
        $goals = Goal::all();
        $goals = cache()->remember($key, now()->addMinutes(10), function () {
            return Goal::all();
        });

        return GoalResource::collection($goals);
        return response()->json($goals);
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

    public function destroy(Goal $goal)
    {
        $goal->delete();
        return response()->json(null, 204);
    }

    public function __construct()
{
    $this->middleware('auth:api');
    $this->middleware(CheckGoalPermission::class)->only(['update', 'destroy']);
}

    public function markAsCompleted(Goal $goal)
    {
    $goal->update(['completed' => true]);
    return response()->json($goal, 200);
    }

    public function search(Request $request)
    {
    $query = $request->input('query');

    $goals = Goal::where('title', 'like', "%$query%")
                ->orWhere('description', 'like', "%$query%")
                ->get();

    return response()->json($goals);
    }

    public function integrateWithExternalService()
{
    $client = new Client();
    $response = $client->get('https://api.example.com');

    return response()->json(json_decode($response->getBody()), 200);
    }
    public function show(Goal $goal)
   {
    try {
        return response()->json($goal);
    } catch (ModelNotFoundException $e) {
        return response()->json(['error' => 'Tujuan tidak ditemukan'], 404);
    }
    }


}
