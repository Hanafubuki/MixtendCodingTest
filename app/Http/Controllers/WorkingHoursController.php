<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateWorkingHourRequest;
use App\Http\Resources\WorkingHourResource;
use App\Models\WorkingHour;

class WorkingHoursController extends Controller
{

    /**
     * Get all workinghours
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAll(){
        return WorkingHourResource::collection(WorkingHour::get());
    }

    /**
     * Get one workinghour by it's id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getOne(WorkingHour $working_hour){
        return new WorkingHourResource($working_hour);
    }


    /**
     * Store a newly created workinghour in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateWorkingHourRequest $request)
    {
        $working_hour = WorkingHour::create($request->validated());
        return new WorkingHourResource($working_hour);
    }

    /**
     * Update the specified workinghour in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateWorkingHourRequest $request, WorkingHour $working_hour)
    {
        $working_hour->fill($request->validated());
        $working_hour->save();
        return new WorkingHourResource($working_hour);   
    }

    /**
     * Remove the specified workinghour from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkingHour $working_hour)
    {
        $working_hour->delete();
        return response()->json(['message' => 'Working hour deleted']);
    }
}
