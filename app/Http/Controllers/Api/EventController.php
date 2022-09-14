<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Event;
use Exception;
use Log;
use Mail;
use Validator;

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

            $this->sendEmail($event);
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

            $this->sendEmail($event);
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

    public function sendEmail(Event $event) {
        // Send email function here
        $data = array(
            "name" => $event->name,
            "slug" => $event->slug,
        );

        Mail::send("mail.email-template", $data , function($message) use ($data)
        {
            $message->to(env('MAIL_FROM_ADDRESS', 'test@gmail.com'), env('MAIL_FROM_NAME', 'Tester'))
                    ->subject('You just created a new event | '.config('app.name'));
        });
    }
}
