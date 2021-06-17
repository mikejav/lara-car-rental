@extends('layouts/main')

@section('content')

    <x-page-title
        title="Add Rental"
    />

    <x-breadcrumbs
        :breadcrumbs="[
            [
                'link' => route('rental.index'),
                'label' => 'Home',
            ],
            [
                'link' => route('rental.index'),
                'label' => 'Rentals',
            ],
            [
                'label' => 'Add Rental',
            ]
        ]"
    />

    <hr class="w-100 mb-4 mt-0" />

    <h2 class="mb-4">Summary</h2>


    <form action="{{ route('rental.store') }}" method="POST">
        @csrf

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Pojazd</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" value="{{ $vehicle['manufacturer'].' '.$vehicle['model'].', '.$fuelType[$vehicle['fuel_type']].', Rok produkcji: '.$vehicle['production_date'] }}">
                <input type="hidden" name="vehicle_id" value="{{ $vehicle->id }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">Klient</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" value="{{ $customer['first_name'] }} {{ $customer['last_name'] }} ({{ $customer['email'] }})">
                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">From</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" value="{{ Request::get('fromDate') }}">
                <input type="hidden" name="from_date" value="{{ Request::get('fromDate') }}">
            </div>
        </div>

        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label">To</label>
            <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" value="{{ Request::get('toDate') }}">
                <input type="hidden" name="to_date" value="{{ Request::get('toDate') }}">
            </div>
        </div>
  
        <div class="d-flex">
            <div class="ml-auto">
                <a href="{{ route('rental.index') }}" class="btn btn-secondary ml-auto mr-1">Cancel</a>
                <button type="submit" class="btn btn-primary ml-auto">Save</button>
            </div>
        </div>
    </form>

@endsection
