<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Employee;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saleList = Sale::all()->load('employee');

        return view('sales.index', ['saleList' => $saleList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employeeList = Employee::all();
        return view('sales.create', ['employeeList' => $employeeList]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'darbuotojas' => 'required',
            'sutartiesNr' => 'required|unique:pardavimai,sutarties_nr',
            'sutikimas' => 'required',
        ]);

        Sale::create([
            'darbuotojo_id' => $request->darbuotojas,
            'sutarties_nr' => $request->sutartiesNr,
            'greitis' => $request->greitis ?? 0,
            'aptarnavimas' => $request->aptarnavimas ?? 0,
            'rekomendacija' => $request->rekomendacija ?? 0,
            'pastabos' => $request->pastabos ?? '',
            'sutikimas' => $request->sutikimas,
        ]);

        $saleList = Sale::all()->load('employee');

        return view('sales.index', ['saleList' => $saleList]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        //
    }
}
