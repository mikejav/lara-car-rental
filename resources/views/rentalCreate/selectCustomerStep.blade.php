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

    <x-validation-errors :errors="$errors" />

    <h2 class="mb-4">Select Customer</h2>
    <div class="list-group">
        @foreach ($customers as $customer)
            <a href="{{ route('rental.create.selectVehicleSegmentStep') }}?customerId={{ $customer['id'] }}" class="list-group-item list-group-item-action">
                <div class="row">
                    <div class="col-7">{{ $customer['first_name'] }} {{ $customer['last_name'] }}</div>
                    <div class="col-5">({{ $customer['email'] }})</div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
