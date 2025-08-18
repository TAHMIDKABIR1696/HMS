<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            📅 Patient Appointments
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8">
                {{-- Success & Error Messages --}}
                @if(session('success'))
                    <div class="bg-green-100 text-green-700 p-3 mb-4 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="bg-red-100 text-red-700 p-3 mb-4 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                {{-- Appointment Table --}}
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 border">Patient Name</th>
                            <th class="py-3 px-4 border">Email</th>
                            <th class="py-3 px-4 border">Phone</th>
                            <th class="py-3 px-4 border">Appointment Date</th>
                            <th class="py-3 px-4 border">Status</th>
                            <th class="py-3 px-4 border text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr class="text-center">
                                <td class="py-3 px-4 border">{{ $appointment->full_name }}</td>
                                <td class="py-3 px-4 border">{{ $appointment->email }}</td>
                                <td class="py-3 px-4 border">{{ $appointment->phone }}</td>
                                <td class="py-3 px-4 border">
                                    {{ \Carbon\Carbon::parse($appointment->date)->format('d M Y') }}
                                </td>
                                <td class="py-3 px-4 border">
                                    @if($appointment->status === 'pending')
                                        <span class="bg-yellow-200 text-yellow-800 px-2 py-1 rounded text-sm">Pending</span>
                                    @elseif($appointment->status === 'approved')
                                        <span class="bg-green-200 text-green-800 px-2 py-1 rounded text-sm">Approved</span>
                                    @else
                                        <span class="bg-red-200 text-red-800 px-2 py-1 rounded text-sm">Cancelled</span>
                                    @endif
                                </td>
                                <td class="py-3 px-4 border flex justify-center gap-2">
                                    @if($appointment->status === 'pending')
                                        <form method="POST" action="{{ route('doctor.appointment.approve', $appointment->id) }}">
                                            @csrf
                                            <button class="bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded">
                                                Approve
                                            </button>
                                        </form>
                                        <form method="POST" action="{{ route('doctor.appointment.cancel', $appointment->id) }}">
                                            @csrf
                                            <button class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                                Cancel
                                            </button>
                                        </form>
                                    @else
                                        <span class="text-gray-500">No Action</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-4 text-center text-gray-500">
                                    No appointments found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
