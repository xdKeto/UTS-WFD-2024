@extends('base.index')

@section('content')


  <div class="container mt-6 px-4 mx-auto text-3xl font-bold">
    <h1>Tickets</h1>
    <hr class="my-2 h-0.5 border-t-0 bg-black" />
  </div>
  

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

 

  <div class="container mt-4 px-4 mx-auto mb-16">
    <table class="text-center w-full">
      <thead class="bg-black flex text-white w-full">
        <tr class="flex w-full">
          <th class="p-4 w-1/4">No.</th>
          <th class="p-4 w-1/4">Flight Code</th>
          <th class="p-4 w-1/4">Passenger</th>
          <th class="p-4 w-1/4">Phone No.</th>
          <th class="p-4 w-1/4">Seat Number</th>
          <td class="p-4 w-1/4">Boarding Status</td>
          <td class="p-4 w-1/4">Boarding in Time</td>
          <td class="p-4 w-1/4">Boarding</td>
          <td class="p-4 w-1/4">Delete</td>

        </tr>
      </thead>
      <tbody class="bg-white flex flex-col items-center overflow-y-scroll w-full" style="height: 50vh;">
        @foreach ($tickets as $ticket)
          <tr class="flex w-full">

            <td class="p-4 w-1/4 border-b-4 border-r-2">{{ $loop->iteration}}</td>
            <td class="p-4 w-1/4 border-b-4 border-r-2">{{ $flight->flight_code }}</td>
            <td class="p-4 w-1/4 border-b-4 border-r-2">{{ $ticket['passenger_name'] }}</td>
            <td class="p-4 w-1/4 border-b-4 border-r-2">{{ $ticket['passenger_phone'] }}</td>
            <td class="p-4 w-1/4 border-b-4 border-r-2">{{ $ticket['seat_number'] }}</td>
            <td class="p-4 w-1/4 border-b-4 border-r-2">
                @if($ticket['is_boarding'] == 0)
                    NO
                @else
                    YES
                @endif
            </td>
            <td class="p-4 w-1/4 border-b-4 border-r-2">{{ $ticket['boarding_time'] }}</td>
            <td class="p-4 w-1/4 border-b-4 border-r-2">
              @if ($ticket['is_boarding'] == 0)
                <form action="{{ route('ticket.update', $ticket['id']) }}" data-value="{{ $ticket['id'] }}"
                      method="POST">
                  @csrf
                  @method('PUT')
                  <button type="submit" class="select-none rounded-lg bg-green-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-green-500/20 transition-all hover:shadow-lg hover:shadow-green-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Confirm</button>
                </form>
              @endif
            </td>

            <td class="p-4 w-1/4 border-b-4 border-r-2">
              @if ($ticket['is_boarding'] == 0)
                <form action="{{ route('ticket.destroy', $ticket['id']) }}" data-value="{{ $ticket['id'] }}"
                      method="POST" onsubmit="return confirm('Are you sure you want to delete?');">

                  @csrf
                  @method('DELETE')
                  <button type="submit" class="select-none rounded-lg bg-red-500 py-3 px-6 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-red-500/20 transition-all hover:shadow-lg hover:shadow-red-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Delete</button>
                </form>
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
