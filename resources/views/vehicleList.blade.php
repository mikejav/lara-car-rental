@extends('layouts/main')

@section('content')

    <x-page-title
        title="Vehicles"
        :action="[
            'label' => 'Add Vehicle',
            'link' => route('vehicle.create'),
        ]"
    />

    <x-breadcrumbs
        :breadcrumbs="[
            [
                'link' => route('vehicle.index'),
                'label' => 'Home',
            ],
            [
                'link' => route('vehicle.index'),
                'label' => 'Vehicles',
            ]
        ]"
    />

    <x-flash-message />

    <x-data-grid
        :columnDefs="$columnDefs"
        :rows="$gridRows"
        :makeRowEditAction="function ($row) { return route('vehicle.edit', $row->id); }"
        :makeRowDeleteAction="function ($row) { return route('vehicle.destroy', $row->id); }"
    />

@endsection
