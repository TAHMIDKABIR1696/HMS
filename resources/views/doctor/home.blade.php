<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            👋 Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8">
                <!-- Quick Actions -->
                <h3 class="text-lg font-semibold text-gray-700 mb-6">Quick Actions</h3>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Appointment -->
                    <a href="{{ route('doctor.appointment') }}" 
                       class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-5 px-6 rounded-lg shadow-md transition transform hover:scale-105 text-center">
                        📅 Check Appointments
                    </a>

                    <!-- Prescription -->
                    <a href="{{ route('doctor.report') }}" 
                       class="block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-5 px-6 rounded-lg shadow-md transition transform hover:scale-105 text-center">
                        📝 Prescriptions
                    </a>

                    <!-- Patient History -->
                    <a href="{{ route('doctor.patienthistory') }}" 
                       class="block bg-green-600 hover:bg-green-700 text-white font-semibold py-5 px-6 rounded-lg shadow-md transition transform hover:scale-105 text-center">
                        📂 Patient History
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
