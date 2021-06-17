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

    <h2 class="mb-4">Select Date Range</h2>

    <form action="{{ route('rental.create.summary') }}" method="GET">
        <input type="hidden" name="customerId" value="{{ Request::get('customerId') }}">
        <input type="hidden" name="vehicleId" value="{{ Request::get('vehicleId') }}">

        <div class="form-group row mb-3">
            <label for="fromDate" class="col-sm-1 col-form-label">From<span class="text-danger ml-1 noselect">*</span></label>
            <div class="col-sm-4"><input type="date" class="form-control" id="fromDate" name="fromDate" required></div>
        </div>
        <div class="form-group row mb-3">
            <label for="toDate" class="col-sm-1 col-form-label">To<span class="text-danger ml-1 noselect">*</span></label>
            <div class="col-sm-4"><input type="date" class="form-control" id="toDate" name="toDate" required></div>
        </div>
        <button type="submit" class="btn btn-primary ml-auto">Next</button>
    </form>

@endsection
