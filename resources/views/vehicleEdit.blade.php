@extends('layouts/main')

@section('content')

    <x-page-title
        title="Edit Vehicle"
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
            ],
            [
                'label' => 'Edit Vehicle',
            ]
        ]"
    />

    <hr class="w-100 mb-4 mt-0" />

    <x-validation-errors :errors="$errors" />

    <x-auto-form
        :action="route('vehicle.update', $vehicle->id)"
        :fieldDefs="$formFieldDefs"
        :values="$vehicle"
        method="PUT"
    />

@endsection
