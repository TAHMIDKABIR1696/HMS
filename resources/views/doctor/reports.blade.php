<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Reports
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="table-auto w-full border-collapse border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">Patient</th>
                            <th class="border px-4 py-2">Appointment Date</th>
                            <th class="border px-4 py-2">Report</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                            <tr>
                                <td class="border px-4 py-2">{{ $report->appointment->patient->name }}</td>
                                <td class="border px-4 py-2">{{ $report->appointment->date }}</td>
                                <td class="border px-4 py-2">{{ $report->report_text }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
