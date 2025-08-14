<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-900 leading-tight">
            💊 Medicine Store
        </h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow-lg sm:rounded-xl p-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 px-4 py-3 rounded-lg mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-3">Medicine Name</th>
                        <th class="p-3">Price (৳)</th>
                        <th class="p-3">Stock</th>
                        <th class="p-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($medicines as $med)
                        <tr class="border-b">
                            <td class="p-3">{{ $med['name'] }}</td>
                            <td class="p-3">{{ number_format($med['price'], 2) }}</td>
                            <td class="p-3">{{ $med['stock'] }}</td>
                            <td class="p-3">
                                <form action="{{ route('patient.medstore.purchase') }}" method="POST" class="flex gap-2">
                                    @csrf
                                    <input type="hidden" name="medicine_id" value="{{ $med['id'] }}">
                                    <input type="number" name="quantity" min="1" max="{{ $med['stock'] }}" class="border rounded p-1 w-20">
                                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded">
                                        Buy
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>