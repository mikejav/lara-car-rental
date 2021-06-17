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

    <h2 class="mb-4">Select Vehicle Segment</h2>

    <div class="list-group">
        @foreach ($vehicleSegment as $key => $value)
            <a href="{{ route('rental.create.selectVehicleNarrowedToSegmentStep') }}?customerId={{ Request::get('customerId') }}&segment={{ $key }}" class="list-group-item list-group-item-action">
                <b><?=$value?></b> - <?=$vehicleKeyToDescriptionMap[$value]?>
            </a>
        @endforeach
    </div>

@endsection
