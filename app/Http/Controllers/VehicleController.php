<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataConstants\VehicleSegment;
use App\Models\DataConstants\Color;
use App\Models\DataConstants\FuelType;
use App\Models\Vehicle;
use View;


class VehicleController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columnDefs = [
            [
                'columnKey' => 'manufacturer',
                'columnDisplayName' => 'Producent',
            ],
            [
                'columnKey' => 'model',
                'columnDisplayName' => 'Model',
            ],
            [
                'columnKey' => 'segment',
                'columnDisplayName' => 'Segment',
            ],
            [
                'columnKey' => 'describtion',
                'columnDisplayName' => 'Opis',
            ],
            [
                'columnKey' => 'production_date',
                'columnDisplayName' => 'Data produkcji',
            ],
            [
                'columnKey' => 'first_registration_date',
                'columnDisplayName' => 'Data pierwszej rejestracji',
            ],
            [
                'columnKey' => 'color',
                'columnDisplayName' => 'Kolor',
                'valueFormatter' => function($value) { return Color::getSelectOptions()[$value]; },
            ],
            [
                'columnKey' => 'doors_count',
                'columnDisplayName' => 'Ilość drzwi',
            ],
            [
                'columnKey' => 'engine_displacement',
                'columnDisplayName' => 'Pojemność skokowa',
            ],
            [
                'columnKey' => 'fuel_type',
                'columnDisplayName' => 'Rodzaj paliwa',
                'valueFormatter' => function($value) { return FuelType::getSelectOptions()[$value]; },
            ],
        ];
        $gridRows = Vehicle::all();

        return view('vehicleList', compact('columnDefs', 'gridRows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicleCreate', [
            'formFieldDefs' => [
                [
                    'name' => 'manufacturer',
                    'type' => 'TEXT',
                    'label' => 'Manufacturer',
                    'required' => true,
                ],
                [
                    'name' => 'model',
                    'type' => 'TEXT',
                    'label' => 'Model',
                    'required' => true,
                ],
                [
                    'name' => 'segment',
                    'type' => 'SELECT',
                    'label' => 'Segment',
                    'options' => VehicleSegment::getSelectOptions(),
                    'required' => true,
                ],
                [
                    'name' => 'description',
                    'type' => 'TEXTAREA',
                    'label' => 'Description',
                ],
                [
                    'name' => 'production_date',
                    'type' => 'DATE',
                    'label' => 'Production Date',
                    'required' => true,
                ],
                [
                    'name' => 'first_registration_date',
                    'type' => 'DATE',
                    'label' => 'First Registration Date',
                    'required' => true,
                ],
                [
                    'name' => 'color',
                    'type' => 'SELECT',
                    'label' => 'Color',
                    'options' => Color::getSelectOptions(),
                    'required' => true,
                ],
                [
                    'name' => 'doors_count',
                    'type' => 'NUMBER',
                    'label' => 'Doors count',
                    'required' => true,
                ],
                [
                    'name' => 'engine_displacement',
                    'type' => 'NUMBER',
                    'label' => 'Engine Displacement',
                    'required' => true,
                ],
                [
                    'name' => 'fuel_type',
                    'type' => 'SELECT',
                    'label' => 'Fuel Type',
                    'options' => FuelType::getSelectOptions(),
                    'required' => true,
                ],
            ]
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'manufacturer' => 'required',
            'model' => 'required',
            'segment' => 'required',
            'production_date' => 'required',
            'first_registration_date' => 'required',
            'color' => 'required',
            'doors_count' => 'required',
            'engine_displacement' => 'required',
            'fuel_type' => 'required',
        ]);

        $vehicle = Vehicle::create(
            $request->all()
        );

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $formFieldDefs = [
            [
                'name' => 'manufacturer',
                'type' => 'TEXT',
                'label' => 'Manufacturer',
                'required' => true,
            ],
            [
                'name' => 'model',
                'type' => 'TEXT',
                'label' => 'Model',
                'required' => true,
            ],
            [
                'name' => 'segment',
                'type' => 'SELECT',
                'label' => 'Segment',
                'options' => VehicleSegment::getSelectOptions(),
                'required' => true,
            ],
            [
                'name' => 'description',
                'type' => 'TEXTAREA',
                'label' => 'Description',
            ],
            [
                'name' => 'production_date',
                'type' => 'DATE',
                'label' => 'Production Date',
                'required' => true,
            ],
            [
                'name' => 'first_registration_date',
                'type' => 'DATE',
                'label' => 'First Registration Date',
                'required' => true,
            ],
            [
                'name' => 'color',
                'type' => 'SELECT',
                'label' => 'Color',
                'options' => Color::getSelectOptions(),
                'required' => true,
            ],
            [
                'name' => 'doors_count',
                'type' => 'NUMBER',
                'label' => 'Doors count',
                'required' => true,
            ],
            [
                'name' => 'engine_displacement',
                'type' => 'NUMBER',
                'label' => 'Engine Displacement',
                'required' => true,
            ],
            [
                'name' => 'fuel_type',
                'type' => 'SELECT',
                'label' => 'Fuel Type',
                'options' => FuelType::getSelectOptions(),
                'required' => true,
            ],
        ];

        return View::make('vehicleEdit', compact('vehicle', 'formFieldDefs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'manufacturer' => 'required',
            'model' => 'required',
            'segment' => 'required',
            'production_date' => 'required',
            'first_registration_date' => 'required',
            'color' => 'required',
            'doors_count' => 'required',
            'engine_displacement' => 'required',
            'fuel_type' => 'required',
        ]);

        $input = $request->all();
        $vehicle = Vehicle::find($id);
        $vehicle->fill($input);

        $vehicle->update();

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle deleted successfully');
    }
}
