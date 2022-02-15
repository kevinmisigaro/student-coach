<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventAttendee;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index(){
        $events = Event::where('event_date','>=', Carbon::now())->get();
        return view('events',\compact('events'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'eventdate' => 'required',
            'eventtime' => 'required',
            'picture' => 'required',
            'location' => 'required',
            'description' => 'required'
        ]);

        if ($validator->fails()) {
            session()->flash('error', 'Please input all fields');
           return back();
        }

        if($request->hasFile('picture')){

            $image = $request->file('picture')->store('events', 'public');

            Event::create([
                'name' => $request->name,
                'event_date' => $request->eventdate,
                'event_time' => $request->eventtime,
                'image' => "images/$image",
                'location' => $request->location, 
                'description' => $request->description,
                'link' => $request->link
            ]);
    
            session()->flash('success', 'Event created successfully');
            return back();
        }
        
    }

    public function viewAttendees($id){
        $event = Event::where('id', $id)->with('attendees')->first();

        return view('dashboard.attendees',compact('event'));
    }

    public function show($id){
        $event = Event::find($id);
        return view('event',\compact('event'));
    }

    public function update(Request $request,$id){
        $event = Event::find($id);

        $event->update([
            'name' => $request->name,
            'event_date' => $request->date,
            'event_time' => $request->time,
            'location' => $request->location, 
            'description' => $request->description,
            'link' => $request->link
        ]);

        \session()->flash('success','Event updated');
        return back();
    }

    public function attend($id){

        if (!Auth::check()) {
            session()->flash('error', 'Please login first');
            return back();
        }

        EventAttendee::firstOrCreate([
            'event_id' => $id, 'user_id' => Auth::id()
        ]);

        session()->flash('success','Event attendance booked');
        return back();
    }

    public function delete($id){
        $event = Event::find($id);
        $event->delete();
        session()->flash('success','Event deleted successfully');
        return back();
    }

}
