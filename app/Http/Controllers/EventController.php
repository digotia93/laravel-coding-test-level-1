<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Exception;
use Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return $events;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        try {
            $event = Event::create([
                'name' => $request->event_name,
                'slug' => Str::slug($request->event_name),
            ]);

            Session::flash('success', 'Event Created');
        } catch(\Exception $e) {
            Session::flash('error', 'Internal Error when create event');
        }

        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        if (!$event) {
            Session::flash('error', 'Event not found');
            return redirect()->route('events.index');
        }
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, Event $event)
    {
        if ($event) {
            $validator = Validator::make($request, [
                'event_name'   => "required|unique:events,name,{$event}",
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $event->update([
                'name' => $request['event_name'],
                'slug' => Str::slug($request['event_name']),
            ]);

            Session::flash('success', 'Event Updated');
        } else {
            $validator   =  Validator::make($request, [
                'event_name'   => 'required|unique:events,name',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $event = Event::create([
                'name' => $request->event_name,
                'slug' => Str::slug($request->event_name),
            ]);
            
            $input_data['name']  =   $input['event_name'];
            $input_data['slug']  =   Str::slug($input['event_name']);

            Session::flash('success', 'Event Created');
        }
       
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        if ($event) {
            $event->delete();
            Session::flash('success', 'Event Deleted');
        }

        return redirect()->route('event.index');
    }

    public function activeEvents(Request $request)
    {
        $activeEvents = [];
        if($request->startAt && $request->endAt) {
            $activeEvents = Event::whereBetween('createdAt', [$startAt, $endAt])->get();
        }

        return $activeEvents;
    }
}
