@extends('layouts/main')

@section('content')

    <x-page-title
        title="Rentals"
        :action="[
            'label' => 'Add rental',
            'link' => route('rental.create.selectCustomerStep'),
        ]"
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
            ]
        ]"
    />

    <x-flash-message />

    <x-data-grid
        :columnDefs="$columnDefs"
        :rows="$gridRows"
        :makeRowEditAction="function ($row) { return route('rental.edit', $row->id); }"
        :makeRowDeleteAction="function ($row) { return route('rental.destroy', $row->id); }"
    />

@endsection
