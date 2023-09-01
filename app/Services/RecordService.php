<?php

namespace App\Services;

use App\Http\Resources\RecordCollection;
use App\Models\Record;
use App\Models\Workout;
use Illuminate\Http\Request;
use Exception;

class RecordService {

    public function getRecordForWorkout(Workout $workout)
    {
        try {
            $records = Record::whereBelongsTo($workout)->get();
            if (!$records->isEmpty()){
                return new RecordCollection($records);
            }else{
                throw new Exception("Can't find workout with the id " . $workout->id, 400);
            }
        } catch (Exception $e) {
            throw $e;
        }
    }
}
