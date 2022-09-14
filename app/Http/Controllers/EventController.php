<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use App\Http\Requests\CreateEventRequest;
use App\Http\Controllers\Api\EventController as ApiEventController;
use Validator;
use Exception;
use Session;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->all()){
            $events = Event::where('name', 'LIKE', '%'.$request->search.'%')
            ->orWhere('slug', 'LIKE', '%'.$request->search.'%')
            ->orWhere('id', 'LIKE', '%'.$request->search.'%')
            ->orderBy('createdAt', 'desc')->paginate(10);
        } else {
            $events = Event::orderBy('createdAt')->paginate(10);
        }

        return view('admin.events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEventRequest $request)
    {
        $apiController = new ApiEventController();
        $response = $apiController->store($request);
        $response = $response->getData();
        if ($response->meta->error == false) {
            Session::flash('success', 'Event Created');
        } else {
            $errors = explode('|', $response->meta->message);
            foreach ($errors as $error) {
                Session::flash('error', $error);
            }
            return redirect()->back()->withInput();
        }
        return redirect()->route('events.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $event = Event::find($id);

        if (!$event) {
            Session::flash('error', 'Event not found');
            return redirect()->route('events.index');
        }

        return view('admin.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $event = Event::find($id);

        if (!$event) {
            Session::flash('error', 'Event not found');
            return redirect()->route('events.index');
        }

        return view('admin.events.edit', compact('event'));
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
        $apiController = new ApiEventController();
        $response = $apiController->update($request, $id);
        $response = $response->getData();

        if ($response->meta->error == false) {
            if (isset($response->response->update)) {
                Session::flash('success', 'Event Updated');
            } else {
                Session::flash('success', 'Event Created');
            }
        } else {
            $errors = explode('|', $response->meta->message);
            foreach ($errors as $error) {
                flash($error)->error();
            }
            return redirect()->back()->withInput();
        }
        return redirect()->route('events.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);

        if ($event) {
            $event->delete();
            Session::flash('success', 'Event Deleted');
        }

        return redirect()->route('events.index');
    }

    public function activeEvents(Request $request)
    {
        $activeEvents = [];
        if($request->startAt && $request->endAt) {
            $activeEvents = Event::whereBetween('createdAt', [$startAt, $endAt])->get();
        }

        return view('admin.events.index', compact('activeEvents'));
    }
}
