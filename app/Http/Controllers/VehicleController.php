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
        $gridRows = Vehicle::all();
        $columnDefs = $this->getColumnDefs();

        return view('vehicleList', compact('columnDefs', 'gridRows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $formFieldDefs = $this->getFormFieldDefs();

        return view('vehicleCreate', compact('formFieldDefs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);

        $vehicle = Vehicle::create(
            $request->all()
        );

        return redirect()
            ->route('vehicle.index')
            ->with('success', 'Vehicle created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Vehicle $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(Vehicle $vehicle)
    {
        $formFieldDefs = $this->getFormFieldDefs();

        return view('vehicleEdit', compact('vehicle', 'formFieldDefs'));
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
        $this->validateInput($request);

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
            ->with('success', 'Vehicle deleted successfully.');
    }

    private function getColumnDefs()
    {
        return [
            [
                'columnKey' => 'manufacturer',
                'columnDisplayName' => 'Manufacturer',
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
                'columnKey' => 'production_date',
                'columnDisplayName' => 'Production Date',
            ],
            [
                'columnKey' => 'first_registration_date',
                'columnDisplayName' => 'First Registration Date',
            ],
            [
                'columnKey' => 'color',
                'columnDisplayName' => 'Color',
                'valueFormatter' => function($value) { return Color::getSelectOptions()[$value]; },
            ],
            [
                'columnKey' => 'doors_count',
                'columnDisplayName' => 'Doors Count',
            ],
            [
                'columnKey' => 'engine_displacement',
                'columnDisplayName' => 'Engine Displacement',
            ],
            [
                'columnKey' => 'fuel_type',
                'columnDisplayName' => 'Fuel Type',
                'valueFormatter' => function($value) { return FuelType::getSelectOptions()[$value]; },
            ],
        ];
    }

    private function getFormFieldDefs()
    {
        return [
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
    }

    private function validateInput(Request $request)
    {
        $productionDate = $request->input('production_date');

        $request->validate([
            'manufacturer' => 'required',
            'model' => 'required',
            'segment' => 'required',
            'production_date' => ['required', 'date'],
            'first_registration_date' => ['required', 'date', "after_or_equal:$productionDate"],
            'color' => 'required',
            'doors_count' => ['required', 'gt:1', 'lt:10'],
            'engine_displacement' => ['required', 'gte:0'],
            'fuel_type' => 'required',
        ]);
    }
}
