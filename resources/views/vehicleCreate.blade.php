@extends('layouts/main')

@section('content')

    <x-page-title
        title="Add Vehicle"
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
                'label' => 'Add Vehicle',
            ]
        ]"
    />

    <hr class="w-100 mb-4 mt-0" />

    <x-validation-errors :errors="$errors" />

    <x-auto-form
        :action="route('vehicle.store')"
        :fieldDefs="$formFieldDefs"
    />

@endsection
