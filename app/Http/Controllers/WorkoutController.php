<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\WorkoutService;

class WorkoutController extends Controller
{
    public function index(WorkoutService $workoutService)
    {
        $workoutServices = $workoutService->index();
        return $workoutServices;
    }

    public function create()
    {

    }

    public function show()
    {

    }

    public function update()
    {

    }

    public function delete()
    {

    }
}
