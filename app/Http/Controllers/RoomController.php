<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Room;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
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
        $event = Event::where('slug',$slug)->first();
        return view('rooms.create', compact('event'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $slug)
    {
        $request->validate([
            'name' => "required",
            'channel' => "required",
            'capacity' => 'required'
        ]);

        $room = new Room;
        $room->name = $request->name;
        $room->channel_id = $request->channel;
        $room->capacity = $request->capacity;
        $room->save();

        session()->flash('success','Room successfully created');
        return redirect()->route('events.show', ['event' => $slug]);
    }

    public function capacity(Request $request, $slug) {
        $event = Event::where('slug',$slug)->first();
        return view('reports.room_capacity', compact('event'));
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
    public function update(Request $request, $id)
    {
        //
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
