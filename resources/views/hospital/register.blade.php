<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Hospital Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>

<body class="min-h-screen bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center p-4">

    <div class="bg-white rounded-xl shadow-lg w-full max-w-2xl p-8">
        <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">Hospital Registration</h2>

        <!-- Global Validation Errors -->
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('hospital.register.store') }}" method="POST" class="space-y-6">
            @csrf

            <!-- Hospital Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Hospital Name *</label>
                <div
                    class="flex items-center border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                    <span class="px-3 text-gray-400"><i class="fas fa-hospital"></i></span>
                    <input type="text" id="name" name="name" required placeholder="Enter hospital name"
                        value="{{ old('name') }}"
                        class="flex-1 py-2 px-2 border-0 focus:outline-none focus:ring-0 text-sm" />
                </div>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Address -->
            <div>
                <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
                <div
                    class="flex items-start border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                    <span class="px-3 pt-2 text-gray-400"><i class="fas fa-map-marker-alt"></i></span>
                    <textarea id="address" name="address" rows="3" placeholder="Enter full address"
                        class="flex-1 py-2 px-2 border-0 focus:outline-none focus:ring-0 text-sm resize-none">{{ old('address') }}</textarea>
                </div>
                @error('address')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Phone Number -->
            <div>
                <label for="phone_number" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <div
                    class="flex items-center border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                    <span class="px-3 text-gray-400"><i class="fas fa-phone"></i></span>
                    <input type="tel" id="phone_number" name="phone_number" maxlength="15"
                        placeholder="+1 (123) 456-7890" value="{{ old('phone_number') }}"
                        class="flex-1 py-2 px-2 border-0 focus:outline-none focus:ring-0 text-sm" />
                </div>
                @error('phone_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email *</label>
                <div
                    class="flex items-center border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                    <span class="px-3 text-gray-400"><i class="fas fa-envelope"></i></span>
                    <input type="email" id="email" name="email" required placeholder="hospital@example.com"
                        value="{{ old('email') }}"
                        class="flex-1 py-2 px-2 border-0 focus:outline-none focus:ring-0 text-sm" />
                </div>
                @error('email')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Contact Person -->
            <div>
                <label for="contact_person" class="block text-sm font-medium text-gray-700 mb-1">Contact Person</label>
                <div
                    class="flex items-center border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                    <span class="px-3 text-gray-400"><i class="fas fa-user"></i></span>
                    <input type="text" id="contact_person" name="contact_person"
                        placeholder="Enter contact person's name" value="{{ old('contact_person') }}"
                        class="flex-1 py-2 px-2 border-0 focus:outline-none focus:ring-0 text-sm" />
                </div>
                @error('contact_person')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- License Number -->
            <div>
                <label for="license_number" class="block text-sm font-medium text-gray-700 mb-1">License Number</label>
                <div
                    class="flex items-center border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                    <span class="px-3 text-gray-400"><i class="fas fa-id-card"></i></span>
                    <input type="text" id="license_number" name="license_number" placeholder="Enter license number"
                        value="{{ old('license_number') }}"
                        class="flex-1 py-2 px-2 border-0 focus:outline-none focus:ring-0 text-sm" />
                </div>
                @error('license_number')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            {{-- <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div
                    class="flex items-center border border-gray-300 rounded-md shadow-sm focus-within:ring-2 focus-within:ring-indigo-500">
                    <span class="px-3 text-gray-400"><i class="fas fa-lock"></i></span>
                    <input type="password" id="password" name="password" placeholder="Enter password"
                        class="flex-1 py-2 px-2 border-0 focus:outline-none focus:ring-0 text-sm" />
                </div>
                @error('password')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- Is Active -->
            <div class="flex items-center">
                <input id="is_active" name="is_active" type="checkbox" {{ old('is_active', true) ? 'checked' : '' }}
                    class="h-4 w-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
            </div>

            <!-- Submit -->
            <div>
                <button type="submit"
                    class="w-full py-3 px-4 rounded-md shadow-sm text-sm font-medium text-white bg-gradient-to-r from-indigo-600 to-indigo-500 hover:from-indigo-700 hover:to-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
                    Register Hospital
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
