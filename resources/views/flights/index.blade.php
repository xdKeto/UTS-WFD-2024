@extends('base.index')

@section('content')
  <div class="container mt-6 px-4 mx-auto text-3xl font-bold">
    Ongoing Flights
  </div>

  <div class="container mt-4 px-4 mb-16">
    <div class="grid grid-cols-3">
      @foreach ($flightData as $flight)
        <div class="relative flex flex-col mt-6 bg-white shadow-sm border border-slate-500 rounded-lg w-96">
          <div class="p-4">
            <h5 class="mb-2 text-black text-xl font-bold">
              {{ $flight->flight_code }}
            </h5>
            <p class="text-slate-600 font-normal">
              <span class="text-black font-semibold">Route:</span> {{$flight->origin}} -> {{$flight->destination}} 
            </p>
            <p class="text-slate-600 font-normal">
              <span class="text-black font-semibold">Departure: </span> {{ $flight->departure_time->format('Y-m-d H:i') }} 
            </p>
            <p class="text-slate-600 font-normal">
              <span class="text-black font-semibold">Arrival: </span>{{ $flight->arrival_time->format('Y-m-d H:i') }} 
            </p>
          </div>
          <div class="p-6 pt-0 flex justify-evenly ">
            <a href="{{route('flights/book', $flight->id)}}"
               class="select-none rounded-lg bg-blue-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button" data-ripple-light="true">
              Book Ticket
            </a>
            <a href="{{route('flights/view', $flight->id)}}"
               class="select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
               type="button" data-ripple-light="true">
              View Tickets
            </a>
          </div>
        </div>
      @endforeach
    </div>
  </div>
@endsection
