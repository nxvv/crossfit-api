<?php

namespace App\Services;

use App\Http\Resources\WorkoutCollection;
use App\Http\Resources\WorkoutResource;
use App\Models\Workout;
use Illuminate\Http\Request;
use Exception;

class WorkoutService {

    public function index()
    {
        try {
            return new WorkoutCollection(Workout::all());
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function create(Array $newWorkout)
    {
        try {
            $workout = Workout::create($newWorkout);
            return new WorkoutResource($workout);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function show(Workout $workout)
    {
        try {
            return new WorkoutResource($workout);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function update(Request $request, Workout $workout)
    {
        try {
            $workout->update($request->input());
            return new WorkoutResource($workout);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function delete(Workout $workout)
    {
        try {
            $workout->delete();
        } catch (Exception $e) {
            throw $e;
        }
    }

}



