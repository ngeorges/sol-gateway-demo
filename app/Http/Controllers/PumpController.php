<?php

namespace App\Http\Controllers;

use App\Models\Pump;
use Illuminate\Http\Request;

class PumpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function pump_status()
    {
        //

        $pump = Pump::where('complete', 0)->orderBy('created_at', 'desc')->first();

        return response()->json([
            'pump_status' =>$pump->pump_status
        ]);
    }

    public function start_fueling()
    {
        $pump = Pump::where('complete', 0)->orderBy('created_at', 'desc')->first();
        $pump->pump_status = 2;
        $pump->save();

        return response()->json($pump);
    }


    public function done_fueling()
    {
        $pump = Pump::where('complete', 0)->orderBy('created_at', 'desc')->first();
        $pump->pump_status = 3;
        $pump->complete = 1;
        $pump->save();

        return response()->json($pump);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        if($request->fuel_type = 1){
            $price = '38.87';
        }else{
            $price = '42.66';
        }

        if($request->amount == null){
            $amount = '1500';
        }else{
            $amount = $request->amount;
        }

        $volume =  $amount / $price;
        $volume = round($volume, 3);

        Pump::create([
            'product_id' => $request->fuel_type, 
            'pump_status' => 1, 
            'amount' => $amount, 
            'volume' => $volume
            ]
        );

        return response()->json([
            'pump_auth_response' => [
                'code' => '0',
                'message' => 'Pump Authorization Succes'
            ],
        ]);

        // return from([{"type_transactie":"003","terminal_number":"SOL00011  ","pump_number":"06","feul_type":"1","amount":"0000007000","pump_auth_response":[{"code":"0","message":"Pump Authorization Succes"}]}]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pump $pump)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pump $pump)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pump $pump)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pump $pump)
    {
        //
    }
}
