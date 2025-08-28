<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            📑 My Reports
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8">
                @if($reports->count())
                    <table class="w-full border">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="p-3 border">Doctor</th>
                                <th class="p-3 border">Report</th>
                                <th class="p-3 border">Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reports as $report)
                                <tr>
                                    <td class="p-3 border">{{ $report->doctor->name }}</td>
                                    <td class="p-3 border">{{ $report->report_text }}</td>
                                    <td class="p-3 border">{{ $report->created_at->format('d M Y') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <p class="text-gray-600">No reports available yet.</p>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
