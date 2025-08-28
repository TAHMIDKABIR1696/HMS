<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            {{ Auth::user()->name }} Income
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8">

                <!-- Income Table -->
                <table class="min-w-full border border-gray-200">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="py-3 px-4 border">Patient Name</th>
                            <th class="py-3 px-4 border">Status</th>
                            <th class="py-3 px-4 border">Amount (৳)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                            <tr class="text-center">
                                <td class="py-3 px-4 border">{{ $appointment->full_name }}</td>
                                <td class="py-3 px-4 border">
                                    <span class="bg-green-200 text-green-800 px-2 py-1 rounded text-sm">
                                        Approved
                                    </span>
                                </td>
                                <td class="py-3 px-4 border">2000 tk</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="py-4 text-center text-gray-500">
                                    No approved appointments yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Total Income -->
                <div class="mt-6 text-right">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Total Income: <span class="text-green-600">৳ {{ $totalIncome }} tk</span>
                    </h3>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
