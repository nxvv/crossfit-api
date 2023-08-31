<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use App\Services\WorkoutService;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse as HttpFoundationJsonResponse;
use Exception;

class WorkoutController extends Controller
{
    public function index(WorkoutService $workoutService)
    {
        try {
            $workouts = $workoutService->index();
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
                'message' => 'Something went wrong.',
                'errors' => $validator->errors()
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
