<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use App\Services\WorkoutService;
use Illuminate\Support\Facades\Validator;
use Exception;

class WorkoutController extends Controller
{
    public function index(Request $request, WorkoutService $workoutService)
    {
        try {
            $filterParams = $request->input();
            $workouts = $workoutService->index($filterParams);
            return $workouts;
        } catch (Exception $e) {
            $response = [
                'status' => 'FAILED',
                'data' => [
                    'error' => $e->getMessage()
                ]
            ];
            return response($response, 500);
        }
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
                'status' => 'FAILED',
                'data' => [
                    'errors' => $validator->errors()
                ]
            ];
            return response($response, 400);
        }

        try {
            $newWorkout = $workoutService->create($request->input());
            return $newWorkout;
        } catch (Exception $e) {
            $response = [
                'status' => 'FAILED',
                'data' => [
                    'error' => $e->getMessage()
                ]
            ];
            return response($response, 500);
        }
    }

    public function show(WorkoutService $workoutService, Workout $workout)
    {
        try {
            $workout = $workoutService->show($workout);
            return $workout;
        } catch (Exception $e) {
            $response = [
                'status' => 'FAILED',
                'data' => [
                    'error' => $e->getMessage()
                ]
            ];
            return response($response, 500);
        }
    }

    public function update(WorkoutService $workoutService, Request $request, Workout $workout)
    {
        try {
            $workout = $workoutService->update($request, $workout);
            return $workout;
        } catch (Exception $e) {
            $response = [
                'status' => 'FAILED',
                'data' => [
                    'error' => $e->getMessage()
                ]
            ];
            return response($response, 500);
        }
    }

    public function delete(WorkoutService $workoutService, Workout $workout)
    {
        try {
            $workoutService->delete($workout);
            return response('OK', 204);
        } catch (Exception $e) {
            $response = [
                'status' => 'FAILED',
                'data' => [
                    'error' => $e->getMessage()
                ]
            ];
            return response($response, 500);
        }
    }
}
