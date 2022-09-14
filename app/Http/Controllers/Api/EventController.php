<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use Validator;
use Exception;
use Log;

class EventController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $event = Event::create([
                'id' => Str::uuid(),
                'name' => $request->event_name,
                'slug' => Str::slug($request->event_name),
            ]);
        } catch (Exception $exception) {
            Log::error($exception);
            return $this->respondInternalError();
        }

        return $this->respond($event);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $event = Event::find($id);

        if ($event) {
            $validator = Validator::make($input, [
                'event_name' => "required|unique:events,name,{$id}",
            ]);

            if ($validator->fails()) {
                return $this->showValidationError($validator);
            }

            $event->update([
                'name' => $input['event_name'],
                'slug' => Str::slug($input['event_name']),
            ]);

            $event->update = 1;
        } else {
            $validator = Validator::make($input, [
                'event_name' => 'required|unique:events,name',
            ]);

            if ($validator->fails()) {
                return $this->showValidationError($validator);
            }

            $event = Event::create([
                'id' => Str::uuid(),
                'name' => $input['event_name'],
                'slug' => Str::slug($input['event_name']),
            ]);
        }

        return $this->respond($event);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
