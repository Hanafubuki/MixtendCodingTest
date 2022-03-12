<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkingHourResource;
use App\Models\Meeting;
use App\Models\WorkingHour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SchedulesController extends Controller
{
    public function get()
    {        
        $working_hours = WorkingHour::select('start', 'end')->find(1);
        $meetings = Meeting::select('summary', 'date','start', 'end', 'timezone')
                            ->get()
                            ->groupBy('date')
                            ->makeHidden('date')
                            ->toArray();     
        $data = ['working_hours' => new WorkingHourResource($working_hours),'meetings' => $meetings];
        $this->log($data);
        return response()->json($data);
    }

    private function log($data){
        Log::info(request()->ip());
        Log::info(print_r($data, true));
    }
}
