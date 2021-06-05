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

    @if ($errors->any())
        {{-- // TODO move this logic to another component  --}}
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <x-auto-form
        :action="route('vehicle.store')"
        :fieldDefs="$formFieldDefs"
    />

@endsection
