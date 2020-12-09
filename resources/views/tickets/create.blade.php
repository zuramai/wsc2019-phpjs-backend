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
            <h2 class="h4">Create new ticket</h2>
        </div>
    </div>

    <form class="needs-validation" novalidate method="POST" action="{{route('tickets.store', ['event' => $event->id])}}">
        @csrf
        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputName">Name</label>
                <!-- adding the class is-invalid to the input, shows the invalid feedback below -->
                <input type="text" class="form-control {{$errors->first('name') ? 'is-invalid' : ''}}" id="inputName" name="name" placeholder="" value="">
                <div class="invalid-feedback">
                    {{$errors->first('name')}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputCost">Cost</label>
                <input type="number" class="form-control {{$errors->first('cost') ? 'is-invalid' : ''}}" id="inputCost" name="cost" placeholder="" value="0">
                <div class="invalid-feedback">
                    {{$errors->first('cost')}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="selectSpecialValidity">Special Validity</label>
                <select class="form-control {{$errors->first('special_validity') ? 'is-invalid' : ''}}" id="selectSpecialValidity" name="special_validity">
                    <option value="" selected>None</option>
                    <option value="amount">Limited amount</option>
                    <option value="date">Purchaseable till date</option>
                </select>
                <div class="invalid-feedback">
                    {{$errors->first('special_validity')}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputAmount">Maximum amount of tickets to be sold</label>
                <input type="number" class="form-control {{$errors->first('amount') ? 'is-invalid' : ''}}" id="inputAmount" name="amount" placeholder="" value="0">
                <div class="invalid-feedback">
                    {{$errors->first('amount')}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-4 mb-3">
                <label for="inputValidTill">Tickets can be sold until</label>
                <input type="text"
                        class="form-control"
                        id="inputValidTill"
                        name="valid_until"
                        placeholder="yyyy-mm-dd HH:MM"
                        value="">
            </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary" type="submit">Save ticket</button>
        <a href="{{ route('events.index', ['event ' => $event->id]) }}" class="btn btn-link">Cancel</a>
    </form>

    </main>
    @endsection