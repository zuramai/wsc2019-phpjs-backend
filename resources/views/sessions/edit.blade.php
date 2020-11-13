@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="events/index.html">Manage Events</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>{{$event->name}}</span>
                </h6>
                <ul class="nav flex-column">
                    <li class="nav-item"><a class="nav-link" href="events/detail.html">Overview</a></li>
                </ul>

                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Reports</span>
                </h6>
                <ul class="nav flex-column mb-2">
                    <li class="nav-item"><a class="nav-link" href="reports/index.html">Room capacity</a></li>
                </ul>
            </div>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <div class="border-bottom mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h1 class="h2">{{$event->name}}</h1>
                </div>
                <span class="h6">{{ $event->date }}</span>
            </div>

            <div class="mb-3 pt-3 pb-2">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">
                    <h2 class="h4">Edit session</h2>
                </div>
            </div>

            <form class="needs-validation" novalidate method="POSt" action="{{route('sessions.update', ['event' => $event->slug, 'session' => $session->id])}}">
                @csrf 
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="selectType">Type</label>
                        <select class="form-control" id="selectType" name="type">
                            <option value="talk" {{ $session->type == 'talk' ? 'selected': ''}}>Talk</option>
                            <option value="workshop" {{ $session->type == 'workshop' ? 'selected': ''}}>Workshop</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputTitle">Title</label>
                        <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                        <input type="text" class="form-control {{ $errors->has('title') ? 'is-invalid' : ''}}" id="inputTitle" name="title" placeholder="" value="{{$session->title}}">
                        @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{$errors->first('title')}}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputSpeaker">Speaker</label>
                        <input type="text" class="form-control {{ $errors->has('speaker') ? 'is-invalid' : ''}}" id="inputSpeaker" name="speaker" placeholder="" value="{{$session->speaker}}">
                        @if($errors->has('speaker'))
                        <div class="invalid-feedback">
                            {{$errors->first('speaker')}}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="selectRoom">Room</label>
                        <select class="form-control" id="selectRoom" name="room">
                            @foreach($event->rooms as $room)
                            <option value="{{$room->id}}" {{$session->room_id == $room->id ? 'selected' : ''}}>{{$room->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-4 mb-3">
                        <label for="inputCost">Cost</label>
                        <input type="number" class="form-control {{ $errors->has('cost') ? 'is-invalid' : ''}}" id="inputCost" name="cost" placeholder="" value="{{$session->cost}}">
                        @if($errors->has('cost'))
                        <div class="invalid-feedback">
                            {{$errors->first('cost')}}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="inputStart">Start</label>
                        <input type="text"
                               class="form-control {{ $errors->has('start') ? 'is-invalid' : ''}}"
                               id="inputStart"
                               name="start"
                               placeholder="yyyy-mm-dd HH:MM"
                               value="{{$session->start}}">
                        @if($errors->has('start'))
                        <div class="invalid-feedback">
                            {{$errors->first('start')}}
                        </div>
                        @endif
                    </div>
                    <div class="col-12 col-lg-6 mb-3">
                        <label for="inputEnd">End</label>
                        <input type="text"
                               class="form-control {{ $errors->has('end') ? 'is-invalid' : ''}}"
                               id="inputEnd"
                               name="end"
                               placeholder="yyyy-mm-dd HH:MM"
                               value="{{$session->end}}">
                        @if($errors->has('end'))
                        <div class="invalid-feedback">
                            {{$errors->first('end')}}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="textareaDescription">Description</label>
                        <textarea class="form-control" id="textareaDescription" name="description" placeholder="" rows="5">
                        {{$session->description}}
                        </textarea>
                        @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{$errors->first('description')}}
                        </div>
                        @endif
                    </div>
                </div>

                <hr class="mb-4">
                <button class="btn btn-primary" type="submit">Save session</button>
                <a href="events/detail.html" class="btn btn-link">Cancel</a>
            </form>

        </main>
    </div>
</div>
@endsection