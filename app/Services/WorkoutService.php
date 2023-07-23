<?php

namespace App\Services;

use App\Http\Resources\WorkoutCollection;
use App\Models\Workout;


class WorkoutService {

    public function index()
    {
        return new WorkoutCollection(Workout::all());
    }

    public function create()
    {
        return;
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



