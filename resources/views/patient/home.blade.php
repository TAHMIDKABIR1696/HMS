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
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
                    <a href="{{ route('patient.book-appointment') }}" class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-5 px-6 rounded-lg shadow-md transition transform hover:scale-105 text-center">
                        📅 Book Appointment
                    </a>    
                    <a href="{{ route('patient.medstore') }}" class="block bg-green-600 hover:bg-green-700 text-white font-semibold py-5 px-6 rounded-lg shadow-md transition transform hover:scale-105 text-center">
                        💊 Medicine Store
                    </a>
                    <a href="{{ route('patient.ambulance-booking') }}" class="block bg-red-600 hover:bg-red-700 text-white font-semibold py-5 px-6 rounded-lg shadow-md transition transform hover:scale-105 text-center">
                        🚑 Book Ambulance
                    </a>
                    <a href="{{ route('patient.report') }}" class="block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-5 px-6 rounded-lg shadow-md transition transform hover:scale-105 text-center">
                        📄 Report
                    </a> 
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
