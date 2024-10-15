@extends('base.index')

@section('content')
  <div class="container mt-6 px-4 mx-auto">
    @if (session('success'))
      <div class="bg-green-100 text-green-800 border border-green-400 px-4 py-3 rounded relative" role="alert">
        <span class="block sm:inline">{{ session('success') }}</span>
      </div>
    @endif

    @if ($errors->any())
      <div class="bg-red-100 text-red-800 border border-red-400 px-4 py-3 rounded relative" role="alert">
        @foreach ($errors->all() as $error)
          <span class="block sm:inline">{{ $error }}</span>
        @endforeach
      </div>
    @endif
  </div>



  <div class="container mt-6 px-4 mx-auto mb-16">
    <div class="flex justify-center">
      <h1 class="text-xl font-semibold">Airplane Booking System</h1>

    </div>
    @isset($flightData)
      <div class="flex justify justify-between">
        <h1 class="text-5xl font-bold">Booking Tickets</h1>
        <h1 class="text-5xl font-bold">{{ $flightData->flight_code }}</h1>
      </div>

      <hr class="my-2 h-0.5 border-t-0 bg-black" />
      <div class="flex justify-evenly">
        <p class="text-xl font-semibold">Departure: <span class="font-normal">
            {{ $flightData->departure_time->format('Y-m-d H:i') }}
          </span></p>
        <p class="text-xl font-semibold">Arrival: <span class="font-normal">
            {{ $flightData->arrival_time->format('Y-m-d H:i') }}
          </span></p>
        <p class="text-xl font-semibold">Route: <span class="font-normal">{{ $flightData->origin }} ->
            {{ $flightData->destination }}</span>
        </p>
      </div>
    @endisset

    <div class="container flex justify-center items-center mt-8">
      <form action="{{ route('ticket.store') }}" method="POST">

        <input type="hidden" name="flight_id" value="{{ $flightData->id }}">

        @csrf
        <label class="form-control w-full max-w-xs">
          <div class="label">
            <span class="label-text text-lg font-semibold">Passenger Name</span>
          </div>
          <div class="bg-white rounded-lg">
            <div class="relative bg-inherit">
              <input required type="text" name="passenger_name"
                     class="text-black peer bg-transparent h-10 w-72 rounded-lg  placeholder-transparent ring-2 px-2 ring-gray-500"
                     placeholder="Type inside me" />

            </div>
          </div>

          <div class="label">
            <span class="label-text text-lg font-semibold">Passenger Phone</span>
          </div>
          <div class="bg-white rounded-lg">
            <div class="relative bg-inherit">
              <input required type="text" name="passenger_phone"
                     class="text-black peer bg-transparent h-10 w-72 rounded-lg  placeholder-transparent ring-2 px-2 ring-gray-500"
                     placeholder="Type inside me" />

            </div>
          </div>

          <div class="label mt-2">
            <span class="label-text text-lg font-semibold">Seat</span>
          </div>
          <div class="bg-white rounded-lg">
            <div class="relative bg-inherit">
              <input required type="text" name="seat_number"
                     class="peer bg-transparent h-10 w-72 rounded-lg text-black placeholder-transparent ring-2 px-2 ring-gray-500"
                     placeholder="Type inside me" />

            </div>
          </div>

        </label>
        <div class="flex justify-between">
          <a href="{{ route('flights/index') }}"
             class="mt-4 middle none center rounded-lg bg-amber-400 py-3 px-6 font-sans text-xs font-bold uppercase text-black">Back</a>
          <button class="mt-4 middle none center rounded-lg bg-blue-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-blue-500/20 transition-all hover:shadow-lg hover:shadow-blue-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                  data-ripple-light="true"> Order </button>

        </div>

      </form>
    </div>
  </div>
@endsection
