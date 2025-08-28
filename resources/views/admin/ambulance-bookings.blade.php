<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            🚑 Ambulance Bookings
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8">

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full border border-gray-300 rounded-lg">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-4 py-2 border">ID</th>
                            <th class="px-4 py-2 border">Patient</th>
                            <th class="px-4 py-2 border">Phone</th>
                            <th class="px-4 py-2 border">Pickup Area</th>
                            <th class="px-4 py-2 border">Pickup Address</th>
                            <th class="px-4 py-2 border">Hospital</th>
                            <th class="px-4 py-2 border">Ambulance Type</th>
                            <th class="px-4 py-2 border">Distance (km)</th>
                            <th class="px-4 py-2 border">Fee (BDT)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 border">{{ $booking->id }}</td>
                            <td class="px-4 py-2 border">{{ $booking->patient_name }}</td>
                            <td class="px-4 py-2 border">{{ $booking->phone }}</td>
                            <td class="px-4 py-2 border">{{ $booking->pickup_area }}</td>
                            <td class="px-4 py-2 border">{{ $booking->pickup_address }}</td>
                            <td class="px-4 py-2 border">{{ $booking->drop_hospital }}</td>
                            <td class="px-4 py-2 border">{{ $booking->ambulance_type }}</td>
                            <td class="px-4 py-2 border">{{ $booking->distance_km }}</td>
                            <td class="px-4 py-2 border">{{ $booking->total_fee }}</td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
