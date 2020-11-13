<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Session;
use App\Room;
use App\Event;


class SessionController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $event = Event::where('slug',$slug)->firstOrFail();
        return view('sessions.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$slug)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room' => 'required',
            'cost' => "nullable",
            'start' => "required",
            'end' => 'required',
            'description' => "required"
        ]);
        $event = Event::where('slug',$slug)->first();
        $session = Session::create([
            'room_id' => $request->room,
            'title' => $request->title,
            'description' => $request->description,
            'speaker' => $request->speaker,
            'start' => $request->start,
            'end' => $request->end,
            'type' => $request->type,
            'cost' => $request->cost ?: 0
        ]);

        session()->flash('success','Session successfully created');
        return redirect()->route('events.show',['event' => $event->slug]);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,$id)
    {
        $event = Event::where('slug',$slug)->first();
        $session = Session::find($id);

        return view('sessions.edit', compact('session', 'event'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, $id)
    {
        $request->validate([
            'type' => 'required',
            'title' => 'required',
            'speaker' => 'required',
            'room' => 'required',
            'cost' => "nullable",
            'start' => "required",
            'end' => 'required',
            'description' => "required"
        ]);
        $event = Event::where('slug',$slug)->first();
        $session = Session::find($id)->update([
            'room_id' => $request->room,
            'title' => $request->title,
            'description' => $request->description,
            'speaker' => $request->speaker,
            'start' => $request->start,
            'end' => $request->end,
            'type' => $request->type,
            'cost' => $request->cost ?: 0
        ]);

        session()->flash('success','Session successfully updated');
        return redirect()->route('events.show',['event' => $event->slug]);
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
