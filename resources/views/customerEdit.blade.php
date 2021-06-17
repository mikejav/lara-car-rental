@extends('layouts/main')

@section('content')

    <x-page-title
        title="Edit Customer"
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
                'label' => 'Edit Customer',
            ]
        ]"
    />

    <hr class="w-100 mb-4 mt-0" />

    <x-validation-errors :errors="$errors" />

    <x-auto-form
        :action="route('customer.update', $customer->id)"
        :fieldDefs="$formFieldDefs"
        :values="$customer"
        method="PUT"
    />

@endsection
