<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            🚑 Ambulance Booking
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg sm:rounded-xl p-8">

                @if(session('success'))
                    <div class="mb-6 p-4 bg-green-100 text-green-800 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('patient.ambulance.store') }}" method="POST" class="space-y-5">
                    @csrf

                    <div>
                        <label class="block text-gray-700 font-semibold">Patient Name</label>
                        <input type="text" name="patient_name" class="w-full border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">Phone Number</label>
                        <input type="text" name="phone" class="w-full border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">Pickup Area</label>
                        <select id="pickup_area" name="pickup_area" class="w-full border-gray-300 rounded-lg" required>
                            <option value="">-- Select Area --</option>
                            @foreach($areaToHospital as $area => $hospital)
                                <option value="{{ $area }}">{{ $area }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">Pickup Address</label>
                        <input type="text" name="pickup_address" class="w-full border-gray-300 rounded-lg" required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">Drop Hospital</label>
                        <input type="text" id="drop_hospital" name="drop_hospital"
                               class="w-full border-gray-300 rounded-lg bg-gray-100" readonly required>
                    </div>

                    <div>
                        <label class="block text-gray-700 font-semibold">Ambulance Type</label>
                        <select name="ambulance_type" class="w-full border-gray-300 rounded-lg" required>
                            <option value="">-- Select Type --</option>
                            @foreach($ambulanceTypes as $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md">
                            Confirm Booking
                        </button>
                    </div>
                </form>

                <script>
                    const areaToHospital = @json($areaToHospital);

                    document.getElementById('pickup_area').addEventListener('change', function () {
                        let selectedArea = this.value;
                        let hospitalInput = document.getElementById('drop_hospital');

                        if (areaToHospital[selectedArea]) {
                            hospitalInput.value = areaToHospital[selectedArea].hospital;
                        } else {
                            hospitalInput.value = '';
                        }
                    });
                </script>

                
            </div>
        </div>
    </div>
</x-app-layout>
