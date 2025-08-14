<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            📅 Book Appointment
        </h2>
    </x-slot>

    <div class="py-10 max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg sm:rounded-xl p-8">
            @if(session('success'))
                <div class="bg-green-500 text-white p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('patient.book-appointment.store') }}">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                    <input type="text" name="full_name" placeholder="Full name" class="border rounded p-3 w-full" required>
                    <input type="email" name="email" placeholder="Email address.." class="border rounded p-3 w-full" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-4">
                    <input type="date" name="date" class="border rounded p-3 w-full" required>
                    <select name="doctor_id" class="border rounded p-3 w-full" required>
                        <option value="">Select Doctor</option>
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                        @endforeach
                    </select>
                </div>

                <input type="text" name="phone" placeholder="Phone Number" class="border rounded p-3 w-full mb-4" required>

                <textarea name="message" placeholder="Your Problem" class="border rounded p-3 w-full mb-4"></textarea>

                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded shadow-md">
                    Submit Request
                </button>


            </form>
        </div>
    </div>
</x-app-layout>
