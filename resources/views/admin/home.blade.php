<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            👋 Welcome, {{ Auth::user()->name }}!
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <!-- Dashboard Stats -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Patients -->
            <div class="bg-white shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Patients</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $patientsCount ?? 0 }}</h3>
                </div>
                <div class="bg-blue-100 p-3 rounded-full">
                    <i class="fas fa-users text-blue-600 text-xl"></i>
                </div>
            </div>

            <!-- Doctors -->
            <div class="bg-white shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Total Doctors</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $doctorsCount ?? 0 }}</h3>
                </div>
                <div class="bg-purple-100 p-3 rounded-full">
                    <i class="fas fa-user-md text-purple-600 text-xl"></i>
                </div>
            </div>

            <!-- Appointments -->
            <div class="bg-white shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Appointments</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $appointmentsCount ?? 0 }}</h3>
                </div>
                <div class="bg-green-100 p-3 rounded-full">
                    <i class="fas fa-calendar-check text-green-600 text-xl"></i>
                </div>
            </div>

            <!-- Ambulance -->
            <div class="bg-white shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
                <div>
                    <p class="text-gray-500 text-sm font-medium">Ambulance Bookings</p>
                    <h3 class="text-2xl font-bold text-gray-800">{{ $ambulanceCount ?? 0 }}</h3>
                </div>
                <div class="bg-red-100 p-3 rounded-full">
                    <i class="fas fa-ambulance text-red-600 text-xl"></i>
                </div>
            </div>
        </div>
            <!-- Quick Actions -->
            <div>
                <h3 class="text-lg font-semibold text-gray-700 mb-6">Quick Actions</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    <a href="{{ route('admin.patient') }}" 
                       class="block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-5 px-6 rounded-2xl shadow-md transition transform hover:scale-105 text-center">
                        Manage Patients
                    </a>
                    <a href="{{ route('admin.doctor') }}" 
                       class="block bg-purple-600 hover:bg-purple-700 text-white font-semibold py-5 px-6 rounded-2xl shadow-md transition transform hover:scale-105 text-center">
                        Manage Doctors
                    </a>
                    <a href="{{ route('admin.ambulance.bookings') }}" 
                       class="block bg-green-600 hover:bg-green-700 text-white font-semibold py-5 px-6 rounded-2xl shadow-md transition transform hover:scale-105 text-center">
                        View Ambulance Bookings
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
