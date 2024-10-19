<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thrive - Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>



<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-lg shadow-md flex flex-col md:flex-row w-full max-w-4xl">

        <!-- Left -->
        <div class="bg-gray-200 p-8 flex flex-col items-center justify-center md:w-1/2">
            <div class="bg-orange-400 text-center text-white p-4 rounded-lg mt-4">
                <img src="{{ asset('storage/strive-logo.png') }}" alt="Thrive Logo" class="w-48 md:w-64 lg:w-72"> <!-- Larger logo with responsive scaling -->

            </div>
            <h2 class="text-gray-800 text-xl font-semibold mb-2">Help Others <span class="font-bold">Thrive</span> Together!</h2>
        </div>

        <!-- Right -->
        <div class="bg-gray-50 p-8 md:w-1/2 flex flex-col justify-center">
            <h2 class="text-gray-800 text-2xl font-bold mb-6 text-center">Create Your Thrive Account</h2>

            <form action={{ route('accountRegister') }} method="POST" class="space-y-4">
                @csrf
                <div class="flex flex-col">
                    <label for="Email" class="text-gray-700 font-semibold mb-1">Email</label>
                    <input type="email" id="email" name="email" placeholder="example.email@gmail.com" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value ="{{$errors->has('email') ? '' : old('email') }}">
                    @error('email')
                        <span class="text-red-500 text-sm mt-1 error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="name" class="text-gray-700 font-semibold mb-1">Account Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Account Name" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{$errors->has('name') ? '' : old('name') }}">
                    @error('name')
                        <span class="text-red-500 text-sm mt-1 error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="username" class="text-gray-700 font-semibold mb-1">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" value="{{$errors->has('username') ? '' : old('username') }}">
                    @error('username')
                        <span class="text-red-500 text-sm mt-1 error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="password" class="text-gray-700 font-semibold mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                    @error('password')
                        <span class="text-red-500 text-sm mt-1 error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label for="password_confirmation" class="text-gray-700 font-semibold mb-1">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500" required>

                    @error('password')
                        <span class="text-red-500 text-sm mt-1 error-message">{{ $message }}</span>
                    @enderror
                </div>

                <button type="submit" class="w-full bg-orange-400 text-white py-2 rounded-md hover:bg-orange-600 transition duration-300">REGISTER</button>
            </form>

            <p class="text-center text-gray-600 mt-4">
                Already have an account? <a href={{ route('login') }} class="text-orange-500 font-semibold">login</a>
            </p>
        </div>
    </div>
</body>
</html>
