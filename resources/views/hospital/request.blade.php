<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Request Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-8">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Blood Request Form</h2>

        <!-- Success Message -->
        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 border border-green-400 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blood-request.store') }}" method="POST" class="grid grid-cols-1 gap-4">
            @csrf

            <!-- Hospital Name -->
            <div>
                <label class="block text-sm font-medium">Select Hospital *</label>
                <select name="hospital_id" required class="w-full border rounded px-3 py-2 text-sm">
                    <option value="">-- Choose Hospital --</option>
                    @foreach ($hospitals as $hospital)
                        <option value="{{ $hospital->id }}" {{ old('hospital_id') == $hospital->id ? 'selected' : '' }}>
                            {{ $hospital->name }}
                        </option>
                    @endforeach
                </select>
                @error('hospital_id')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Blood Type -->
            <div>
                <label class="block text-sm font-medium">Blood Type *</label>
                <select name="blood_type" required class="w-full border rounded px-3 py-2 text-sm">
                    <option value="">Select Blood Type</option>
                    @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $type)
                        <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>
                            {{ $type }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Units Required -->
            <div>
                <label class="block text-sm font-medium">Units Required *</label>
                <input type="number" name="units" min="1" value="{{ old('units') }}" required
                    class="w-full border rounded px-3 py-2 text-sm" />
            </div>

            <!-- Request Date -->
            <div>
                <label class="block text-sm font-medium">Request Date *</label>
                <input type="date" name="request_date" min="{{ now()->format('Y-m-d') }}"
                    value="{{ old('request_date', date('Y-m-d')) }}" required
                    class="w-full border rounded px-3 py-2 text-sm" />
            </div>

            <!-- Notes -->
            <div>
                <label class="block text-sm font-medium">Additional Notes</label>
                <textarea name="notes" rows="3" class="w-full border rounded px-3 py-2 text-sm">{{ old('notes') }}</textarea>
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full py-2 px-4 rounded-md bg-red-600 hover:bg-red-700 text-white font-medium">
                    Submit Blood Request
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

</body>

</html>
