<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function store(Request $r){
        $data = $r->validate([
            'flight_id' => 'required|integer|exists:flights,id',
            'passenger_name' => 'required|string',
            'passenger_phone'=> 'required|string|max:14',
            'seat_number' => 'required|string|max:5',
        ]);

        try{
            Ticket::create([
                'flight_id' => $data['flight_id'],
                'passenger_name' => $data['passenger_name'],
                'passenger_phone' => $data['passenger_phone'],
                'seat_number' => $data['seat_number'],
            ]);
    
            return redirect()
            ->route('flights/view', ['id' => $r->flight_id])
            ->with('success', 'Ticket booked successfully.');
        }catch(\Exception){
            return back()->withErrors(['error' => 'An error occurred while booking the ticket. Please try again.']);
        }
    }

    public function update($id){
        $ticket = Ticket::findOrFail($id);

        try{
            $ticket->update([
                'is_boarding' => 1,
                'boarding_time' => now(),
            ]);

            return redirect()
                ->route('flights/view', ['id' => $ticket->flight_id])
                ->with('success', 'Ticket board in success.');
        }catch(\Exception){
            return back()->withErrors(['error' => 'An error occurred while updating the ticket. Please try again.']);
        }
    }

    public function destroy($id){
        $ticket = Ticket::findOrFail($id);

        try{
            $ticket->delete();

            return redirect()
                ->route('flights/view', ['id' => $ticket->flight_id])
                ->with('success', 'Ticket is Deleted.');
        }catch(\Exception){
            return back()->withErrors(['error' => 'An error occurred while deleting the ticket. Please try again.']);
        }
    }
}