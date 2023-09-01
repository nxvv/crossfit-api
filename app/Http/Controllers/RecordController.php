<?php

namespace App\Http\Controllers;

use App\Models\Workout;
use Illuminate\Http\Request;
use App\Services\RecordService;
use Exception;

class RecordController extends Controller
{
    public function getRecordForWorkout(RecordService $recordService, Workout $workout)
    {
        try {
            $records = $recordService->getRecordForWorkout($workout);
            return $records;
        } catch (Exception $e) {
            $response = [
                'status' => 'FAILED',
                'data' => [
                    'error' => $e->getMessage()
                ]
            ];
            return response($response, $e->getCode());
        }
    }
}
