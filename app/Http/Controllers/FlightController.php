<?php

namespace App\Http\Controllers;

use App\Models\Flight;
use Illuminate\Http\Request;

class FlightController extends Controller
{
    public function index(){
        $flightData = Flight::query()->get();

        return view("flights/index",compact("flightData"));
    }

    public function show($id){
        $flight = Flight::with('tickets')->findOrFail($id);

        $tickets = $flight->tickets;

        return view('flights/view',compact("flight","tickets"));
    }

    public function create($id){
        $flightData = Flight::findOrFail($id);

        return view('flights/book', compact('flightData'));
    }
}