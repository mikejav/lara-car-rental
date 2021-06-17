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

    <h2 class="mb-4">Select Vehicle</h2>

    <div class="list-group">
        @foreach ($vehicles as $vehicle)
            <a
                href="{{ route('rental.create.selectDateRangeStep') }}?customerId={{ Request::get('customerId') }}&vehicleId={{ $vehicle['id'] }}"
                class="list-group-item list-group-item-action"
            >
                <div class="row">
                    <div class="col-3">
                        {{ $vehicle['manufacturer'].' '.$vehicle['model'] }}
                    </div>
                    <div class="col-3">
                        Data produkcji: {{ $vehicle['production_date'] }}
                    </div>
                    <div class="col-3">
                        Typ paliwa: {{ $fuelType[$vehicle['fuel_type']] }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
