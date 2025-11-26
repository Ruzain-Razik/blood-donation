<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body>

    <div class="min-h-screen bg-gray-100 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-8">
            <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Hospital Blood Donation</h2>

            @if (session('success'))
                <p class="mb-4 text-green-600">{{ session('success') }}</p>
            @endif

            <form action="{{ route('blood-donations.store') }}" method="POST" class="space-y-6">
                @csrf

                {{-- hospital --}}

                <div>
                    <label for="hospital" class="block text-sm font-medium text-gray-700 mb-1">Hospital Name *</label>
                    <select id="blood_type" name="blood_type" required
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Select Hospital --</option>
                        @foreach ($hospitals as $hospital)
                            <option value="{{ $hospital->id }}"
                                {{ old($hospital->name) == $hospital->id ? 'selected' : '' }}>
                                {{ $hospital->name }}</option>
                        @endforeach
                    </select>
                    @error('blood_type')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Blood Type -->
                <div>
                    <label for="blood_type" class="block text-sm font-medium text-gray-700 mb-1">Blood Type *</label>
                    <select id="blood_type" name="blood_type" required
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <option value="">-- Select Blood Type --</option>
                        @foreach (['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'] as $type)
                            <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>
                                {{ $type }}</option>
                        @endforeach
                    </select>
                    @error('blood_type')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Quantity -->
                <div>
                    <label for="quantity" class="block text-sm font-medium text-gray-700 mb-1">Quantity (units/ml)
                        *</label>
                    <input type="number" id="quantity" name="quantity" value="{{ old('quantity') }}" required
                        min="1"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    @error('quantity')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Donation Date -->
                <div>
                    <label for="donation_date" class="block text-sm font-medium text-gray-700 mb-1">Donation Date
                        *</label>
                    <input type="date" min="{{ now()->format('Y-m-d') }}" id="donation_date" name="donation_date"
                        value="{{ old('donation_date') }}" required
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">

                    @error('donation_date')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Notes -->
                <div>
                    <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                    <textarea id="notes" name="notes" rows="3"
                        class="w-full border border-gray-300 rounded-md py-2 px-3 focus:outline-none focus:ring-2 focus:ring-indigo-500">{{ old('notes') }}</textarea>
                    @error('notes')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit -->
                <div>
                    <button type="submit"
                        class="w-full py-3 px-4 rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add Donation
                    </button>
                </div>
            </form>
            <div class="mt-6 text-center">
                <a href="/"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 rounded-md shadow-sm hover:bg-gray-300 transition">
                    <i class="fas fa-home mr-2"></i> Back to Home
                </a>
            </div>
        </div>
    </div>


</body>

</html>
