@extends('layouts/main')

@section('content')

    <x-page-title
        title="Add Customer"
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
            ],
            [
                'label' => 'Add Customer',
            ]
        ]"
    />

    <hr class="w-100 mb-4 mt-0" />

    <x-validation-errors :errors="$errors" />

    <x-auto-form
        :action="route('customer.store')"
        :fieldDefs="$formFieldDefs"
    />

@endsection
