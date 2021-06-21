<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rental;
use App\Models\Customer;
use App\Models\Vehicle;
use App\Models\DataConstants\VehicleSegment;
use App\Models\DataConstants\FuelType;
use View;
use DB;

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $columnDefs = [
            [
                'columnKey' => 'from_date',
                'columnDisplayName' => 'From',
            ],
            [
                'columnKey' => 'to_date',
                'columnDisplayName' => 'To',
            ],
            [
                'columnKey' => 'customer_id',
                'columnDisplayName' => 'Customer',
                'valueFormatter' => function($value, $row) {
                    return '<a href="'.route('customer.edit', $row->customer->id).'">'
                        .htmlentities("{$row->customer->first_name} {$row->customer?->last_name}")
                        ."</a>";
                }
            ],
            [
                'columnKey' => 'vehicle_id',
                'columnDisplayName' => 'Vehicle',
                'valueFormatter' => function($value, $row) {
                    return '<a href="'.route('vehicle.edit', $row->vehicle->id).'">'
                        .htmlentities("{$row->vehicle->manufacturer} {$row->vehicle->model} ({$row->vehicle->production_date})")
                        ."</a>";
                },
            ],
        ];
        $gridRows = Rental::with(['vehicle'])->get();

        return view('rentalList', compact('columnDefs', 'gridRows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectCustomerStep()
    {
        $customers = Customer::all();
        return view('rentalCreate/selectCustomerStep', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectVehicleSegmentStep()
    {
        $vehicleSegment = VehicleSegment::getSelectOptions();
        $vehicleKeyToDescriptionMap = VehicleSegment::getKeyToDescriptionMap();

        return view('rentalCreate/selectVehicleSegmentStep', compact('vehicleSegment', 'vehicleKeyToDescriptionMap'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectVehicleNarrowedToSegmentStep(Request $request)
    {
        $vehicles = Vehicle::where('segment', $request->input('segment'))->get();
        $fuelType = FuelType::getSelectOptions();

        return view('rentalCreate/selectVehicleNarrowedToSegmentStep', compact('vehicles', 'fuelType'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function selectDateRangeStep(Request $request)
    {
        return view('rentalCreate/selectDateRangeStep');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function summaryStep(Request $request)
    {
        $vehicle = Vehicle::where('id', $request->input('vehicleId'))->first();
        $customer = Customer::where('id', $request->input('customerId'))->first();
        $fuelType = FuelType::getSelectOptions();

        return view('rentalCreate/summary', compact('vehicle', 'customer', 'fuelType'));
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
            'customer_id' => 'required',
            'vehicle_id' => 'required',
            'from_date' => 'required',
            'to_date' => 'required',
        ]);

        $vehicle = Rental::create(
            $request->all()
        );

        return redirect()
            ->route('rental.index')
            ->with('success', 'Rental created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Rental $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        $rental->delete();

        return redirect()
            ->route('rental.index')
            ->with('success', 'Rental deleted successfully.');
    }
}
