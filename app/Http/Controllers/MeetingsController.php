<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateMeetingRequest;
use App\Http\Resources\MeetingResource;
use App\Models\Meeting;

class MeetingsController extends Controller
{

    /**
     * Get all meetings
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getAll(){
        return MeetingResource::collection(Meeting::get());
    }

    /**
     * Get one meeting by it's id.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getOne(Meeting $meeting){
        return new MeetingResource($meeting);
    }
    /**
     * Store a newly created meeting in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateMeetingRequest $request)
    {
        $meeting = Meeting::create($request->validated());
        return new MeetingResource($meeting);
    }

    /**
     * Update the specified meeting in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateMeetingRequest $request, Meeting $meeting)
    {
        $meeting->fill($request->validated());
        $meeting->save();     
        return new MeetingResource($meeting);   
    }

    /**
     * Remove the specified meeting from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meeting $meeting)
    {
        $meeting->delete();
        return response()->json(['message' => 'Meeting deleted']);
    }
}
