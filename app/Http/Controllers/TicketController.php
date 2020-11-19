<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EventTicket;
use App\Event;

class TicketController extends Controller
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
        return view('tickets.create', compact('event'));
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
            'name' => 'required',
            'cost' => 'required',
            'special_validity' => 'required',
            'amount' => 'required_if:special_validity,amount',
            'valid_until' => 'required_if:special_validity,date'
        ]);
        $special_validity = null;
        if($request->special_validity == 'date') $special_validity = ['type' => 'date', 'date' => $request->valid_until];
        else if($request->special_validity == 'amount') $special_validity = ['type' => 'amount', 'amount' => $request->amount];

        $event = Event::where('slug',$slug)->first();
        $ticket = EventTicket::create([
            'event_id' => $event->id,
            'name' => $request->name,
            'cost' => $request->cost,
            'special_validity' => json_encode($special_validity)
        ]);
        session()->flash('success','Ticket Successfully Created!');
        return redirect()->route('events.show', ['event' => $slug]);
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
