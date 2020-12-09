@extends('layouts.app')

@section('content')
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Manage Events</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <a href="events/create.html" class="btn btn-sm btn-outline-secondary">Create new event</a>
            </div>
        </div>
    </div>
    <div class="row events">
        <div class="col-md-4">
            <div class="card mb-4 shadow-sm">
                <a href="{{ route('events.index', ['event ' => $event->id]) }}" class="btn text-left event">
                    <div class="card-body">
                        <h5 class="card-title">WorldSkills Conference 2019</h5>
                        <p class="card-subtitle">{{ $event->date }} </p>
                        <hr>
                        <p class="card-text">3,546 registrations</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</main>

@endsection