<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Write Report
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('doctor.reports.store', $appointment->id) }}" method="POST">
                    @csrf
                    <label for="report_text" class="block font-medium text-gray-700">Report</label>
                    <textarea id="report_text" name="report_text" rows="6" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                    <button type="submit" class="mt-3 px-4 py-2 bg-blue-600 text-white rounded-md">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
