<?php

namespace App\Services;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;


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

    public function show()
    {
        return;
    }

    public function update()
    {
        return;
    }

    public function delete()
    {
        return;
    }

}



