@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="border-bottom mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h1 class="h2">{{ $event->name }} </h1>
        </div>
        <span class="h6">{{ $event->date }} </span>
    </div>

    <div class="mb-3 pt-3 pb-2">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
            <h2 class="h4">Edit session</h2>
        </div>
    </div>

    <form method="POST" class="needs-validation" novalidate action="{{ route('sessions.update', ['event' => $event->id, 'session' => $session->id]) }}">
        @csrf
        @method("PUT")
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectType">Type</label>
                <select class="form-control" id="selectType" name="type">
                    <option value="talk" selected>Talk</option>
                    <option value="workshop">Workshop</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputTitle">Title</label>
                <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                <input type="text" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" id="inputTitle" name="title" placeholder="" value="{{$session->title}}">
                <div class="invalid-feedback">
                    Title is required.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputSpeaker">Speaker</label>
                <input type="text" class="form-control" id="inputSpeaker" name="speaker" placeholder="" value="{{$session->speaker}}">
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectRoom">Room</label>
                <select class="form-control" id="selectRoom" name="room">
                    @foreach($event->rooms as $room)
                    <option value="{{$room->id}}" {{$room->id == $session->room_id ? 'selected' : ''}}>{{$room->name}}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback">
                    Room is required.
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputCost">Cost</label>
                <input type="number" class="form-control" id="inputCost" name="cost" placeholder="" value="{{$session->cost}}">
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6 mb-3">
                <label for="inputStart">Start</label>
                <input type="text"
                        class="form-control"
                        id="inputStart"
                        name="start"
                        placeholder="yyyy-mm-dd HH:MM"
                        value="{{$session->start}}">
            </div>
            <div class="col-12 col-lg-6 mb-3">
                <label for="inputEnd">End</label>
                <input type="text"
                        class="form-control"
                        id="inputEnd"
                        name="end"
                        placeholder="yyyy-mm-dd HH:MM"
                        value="{{$session->end}}">
            </div>
        </div>

        <div class="row">
            <div class="col-12 mb-3">
                <label for="textareaDescription">Description</label>
                <textarea class="form-control" id="textareaDescription" name="description" placeholder="" rows="5">{{$session->description}}</textarea>
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Save session</button>
        <a href="{{ route('events.index', ['event ' => $event->id]) }}" class="btn btn-link">Cancel</a>
    </form>

</main>
@endsection