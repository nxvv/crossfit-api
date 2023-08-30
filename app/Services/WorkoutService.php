<?php

namespace App\Services;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;

class WorkoutService {

    public function index()
    {
        return new WorkoutCollection(Workout::all());
    }

    public function create(Array $newWorkout)
    {
        $workout = Workout::create($newWorkout);
        return new WorkoutResource($workout);
    }

    public function show(Workout $workout)
    {
        return new WorkoutResource($workout);
    }

    public function update(Request $request, Workout $workout)
    {
        $workout->update($request->input());
        return new WorkoutResource($workout);
    }

    public function delete(Workout $workout)
    {
        $workout->delete();
    }

}



