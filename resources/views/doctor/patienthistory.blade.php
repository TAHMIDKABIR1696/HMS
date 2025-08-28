<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            📂 Patient History
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8">

                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 border">Patient Name</th>
                            <th class="py-3 px-4 border">Email</th>
                            <th class="py-3 px-4 border">Phone</th>
                            <th class="py-3 px-4 border">Appointment Date</th>
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-4 text-center text-gray-500">
                                    No history found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
