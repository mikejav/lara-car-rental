@extends('layouts/main')

@section('content')

    <x-page-title
        title="Customers"
        :action="[
            'label' => 'Add Customer',
            'link' => route('customer.create'),
        ]"
    />

    <x-breadcrumbs
        :breadcrumbs="[
            [
                'link' => route('customer.index'),
                'label' => 'Home',
            ],
            [
                'link' => route('customer.index'),
                'label' => 'Customers',
            ]
        ]"
    />

    <x-flash-message />

    <x-data-grid
        :columnDefs="$columnDefs"
        :rows="$gridRows"
        :makeRowEditAction="function ($row) { return route('customer.edit', $row->id); }"
        :makeRowDeleteAction="function ($row) { return route('customer.destroy', $row->id); }"
    />

@endsection
