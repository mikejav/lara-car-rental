<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\DataConstants\CustomerType;
use View;

class CustomerController extends Controller
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
                'columnKey' => 'email',
                'columnDisplayName' => 'Email',
            ],
            [
                'columnKey' => 'first_name',
                'columnDisplayName' => 'First Name',
            ],
            [
                'columnKey' => 'last_name',
                'columnDisplayName' => 'Last Name',
            ],
            [
                'columnKey' => 'type',
                'columnDisplayName' => 'Type',
                'valueFormatter' => function($value) { return CustomerType::getSelectOptions()[$value]; },
            ],
            [
                'columnKey' => 'address1',
                'columnDisplayName' => 'Address 1',
            ],
            [
                'columnKey' => 'address2',
                'columnDisplayName' => 'Address 2',
            ],
            [
                'columnKey' => 'city',
                'columnDisplayName' => 'City',
            ],
            [
                'columnKey' => 'postcode',
                'columnDisplayName' => 'Post Code',
            ],
        ];
        $gridRows = Customer::all();

        return view('customerList', compact('columnDefs', 'gridRows'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customerCreate', [
            'formFieldDefs' => [
                [
                    'name' => 'email',
                    'type' => 'TEXT',
                    'label' => 'Email',
                    'required' => true,
                ],
                [
                    'name' => 'first_name',
                    'type' => 'TEXT',
                    'label' => 'First Name',
                    'required' => true,
                ],
                [
                    'name' => 'last_name',
                    'type' => 'TEXT',
                    'label' => 'Last Name',
                    'required' => true,
                ],
                [
                    'name' => 'type',
                    'type' => 'SELECT',
                    'label' => 'Type',
                    'options' => CustomerType::getSelectOptions(),
                    'required' => true,
                ],
                [
                    'name' => 'address1',
                    'type' => 'TEXT',
                    'label' => 'Address 1',
                    'required' => true,
                ],
                [
                    'name' => 'address2',
                    'type' => 'TEXT',
                    'label' => 'Address 2',
                ],
                [
                    'name' => 'city',
                    'type' => 'TEXT',
                    'label' => 'City',
                    'required' => true,
                ],
                [
                    'name' => 'postcode',
                    'type' => 'NUMBER',
                    'label' => 'Postcode',
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
            'email' => ['required', 'email'],
            'first_name' => 'required',
            'last_name' => 'required',
            'type' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        $customer = Customer::create(
            $request->all()
        );

        return redirect()
            ->route('customer.index')
            ->with('success', 'Customer created successfully.');
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
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $formFieldDefs = [
            [
                'name' => 'email',
                'type' => 'TEXT',
                'label' => 'Email',
                'required' => true,
            ],
            [
                'name' => 'first_name',
                'type' => 'TEXT',
                'label' => 'First Name',
                'required' => true,
            ],
            [
                'name' => 'last_name',
                'type' => 'TEXT',
                'label' => 'Last Name',
                'required' => true,
            ],
            [
                'name' => 'type',
                'type' => 'SELECT',
                'label' => 'Type',
                'options' => CustomerType::getSelectOptions(),
                'required' => true,
            ],
            [
                'name' => 'address1',
                'type' => 'TEXT',
                'label' => 'Address 1',
                'required' => true,
            ],
            [
                'name' => 'address2',
                'type' => 'TEXT',
                'label' => 'Address 2',
            ],
            [
                'name' => 'city',
                'type' => 'TEXT',
                'label' => 'City',
                'required' => true,
            ],
            [
                'name' => 'postcode',
                'type' => 'NUMBER',
                'label' => 'Postcode',
                'required' => true,
            ],
        ];

        return View::make('customerEdit', compact('customer', 'formFieldDefs'));
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
            'email' => ['required', 'email'],
            'first_name' => 'required',
            'last_name' => 'required',
            'type' => 'required',
            'address1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        $input = $request->all();
        $customer = Customer::find($id);
        $customer->fill($input);

        $customer->update();

        return redirect()
            ->route('customer.index')
            ->with('success', 'Customer updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()
            ->route('customer.index')
            ->with('success', 'Customer deleted successfully');
    }
}
