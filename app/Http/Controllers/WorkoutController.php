<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use App\Services\WorkoutService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;

class WorkoutController extends Controller
{
    public function index(WorkoutService $workoutService)
    {
        $workouts = $workoutService->index();
        return $workouts;
    }

    public function create(WorkoutService $workoutService, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:workouts',
            'mode' => 'required',
            'equipment' => 'required',
            'exercises' => 'required',
            'trainerTips' => 'required',
        ]);

        if ($validator->fails()) {
            $response = [
                'message' => 'Something went wrong.',
                'errors' => $validator->errors()
            ];
            return response($response, 400);
        }

        $newWorkout = $workoutService->create($request->input());
        return $newWorkout;
    }

    public function show(WorkoutService $workoutService, Workout $workout)
    {
        $workout = $workoutService->show($workout);
        return $workout;
    }

    public function update(WorkoutService $workoutService, Request $request, Workout $workout)
    {
        $workout = $workoutService->update($request, $workout);
        return $workout;

    }

    public function delete(WorkoutService $workoutService, Workout $workout)
    {
        $workoutService->delete($workout);
        return response('OK', 204);
    }
}
