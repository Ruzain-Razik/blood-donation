<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Donor Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="min-h-screen bg-gray-100 flex items-center justify-center p-4">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-8">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Donor Registration</h2>

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

        <form action="{{ route('donor.register') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            @csrf

            <!-- Full Name -->
            <div>
                <label class="block text-sm font-medium">Full Name *</label>
                <input type="text" name="full_name" value="{{ old('full_name') }}" required
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('full_name')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- NIC -->
            <div>
                <label class="block text-sm font-medium">NIC *</label>
                <input type="text" name="nic" value="{{ old('nic') }}" required
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('nic')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date of Birth -->
            <div>
                <label class="block text-sm font-medium">Date of Birth *</label>
                <input type="date" name="dob" value="{{ old('dob') }}" required
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('dob')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="mail" value="{{ old('mail') }}"
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('mail')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div>
                <label class="block text-sm font-medium">Phone Number *</label>
                <input type="tel" name="phone_number" value="{{ old('phone_number') }}" required
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('phone_number')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Gender -->
            <div>
                <label class="block text-sm font-medium">Gender *</label>
                <select name="gender" required class="w-full border rounded px-3 py-2 text-sm">
                    <option value="">Select</option>
                    <option value="male" {{ old('gender') == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ old('gender') == 'female' ? 'selected' : '' }}>Female</option>
                </select>
                @error('gender')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Blood Type -->
            <div>
                <label class="block text-sm font-medium">Blood Type *</label>
                <select name="blood_type" required class="w-full border rounded px-3 py-2 text-sm">
                    <option value="">Select</option>
                    @foreach (['A+', 'A-', 'B+', 'B-', 'O+', 'O-', 'AB+', 'AB-'] as $type)
                        <option value="{{ $type }}" {{ old('blood_type') == $type ? 'selected' : '' }}>
                            {{ $type }}</option>
                    @endforeach
                </select>
                @error('blood_type')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Weight -->
            <div>
                <label class="block text-sm font-medium">Weight (kg)</label>
                <input type="number" step="0.1" name="weight" value="{{ old('weight') }}"
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('weight')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Address</label>
                <textarea name="address" rows="2" class="w-full border rounded px-3 py-2 text-sm">{{ old('address') }}</textarea>
                @error('address')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Health Status -->
            <div>
                <label class="block text-sm font-medium">Health Status</label>
                <select name="health_status" class="w-full border rounded px-3 py-2 text-sm">
                    <option value="">Select Status</option>
                    <option value="healthy" {{ old('health_status') == 'healthy' ? 'selected' : '' }}>Healthy</option>
                    <option value="under_treatment" {{ old('health_status') == 'under_treatment' ? 'selected' : '' }}>
                        Under Treatment</option>
                    <option value="chronic_condition"
                        {{ old('health_status') == 'chronic_condition' ? 'selected' : '' }}>Chronic Condition</option>
                </select>
                @error('health_status')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Last Donation Date -->
            <div>
                <label class="block text-sm font-medium">Last Donation Date</label>
                <input type="date" name="last_donation_date" value="{{ old('last_donation_date') }}"
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('last_donation_date')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Donation Frequency -->
            <div>
                <label class="block text-sm font-medium">Donation Frequency</label>
                <select name="donation_frequency" class="w-full border rounded px-3 py-2 text-sm">
                    <option value="">Select Frequency</option>
                    <option value="once" {{ old('donation_frequency') == 'once' ? 'selected' : '' }}>Once</option>
                    <option value="every_3_months"
                        {{ old('donation_frequency') == 'every_3_months' ? 'selected' : '' }}>Every 3 months</option>
                    <option value="every_6_months"
                        {{ old('donation_frequency') == 'every_6_months' ? 'selected' : '' }}>Every 6 months</option>
                    <option value="yearly" {{ old('donation_frequency') == 'yearly' ? 'selected' : '' }}>Yearly
                    </option>
                </select>
                @error('donation_frequency')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Emergency Contact -->
            <div>
                <label class="block text-sm font-medium">Emergency Contact</label>
                <input type="text" name="emergency_contact" value="{{ old('emergency_contact') }}"
                    class="w-full border rounded px-3 py-2 text-sm" />
                @error('emergency_contact')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Additional Notes -->
            <div class="md:col-span-2">
                <label class="block text-sm font-medium">Additional Notes</label>
                <textarea name="notes" rows="2" class="w-full border rounded px-3 py-2 text-sm">{{ old('notes') }}</textarea>
                @error('notes')
                    <p class="text-red-600 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="md:col-span-2">
                <button type="submit"
                    class="w-full py-2 px-4 rounded-md bg-indigo-600 hover:bg-indigo-700 text-white font-medium">
                    Register Donor
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
