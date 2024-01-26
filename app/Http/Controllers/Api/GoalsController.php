<?php

namespace App\Http\Controllers\api;

use App\Models\Goals;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//import Resource "PostResource"
use App\Http\Resources\PostResource;

//import Facade "Storage"
use Illuminate\Support\Facades\Storage;

//import Facade "Validator"
use Illuminate\Support\Facades\Validator;

class GoalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Goals $goals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Goals $goals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Goals $goals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Goals $goals)
    {
        //
    }
}
