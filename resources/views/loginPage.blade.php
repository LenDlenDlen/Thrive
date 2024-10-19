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

        <!-- Left Side -->
        <div class="bg-gray-100 p-8 flex flex-col items-center justify-center md:w-1/2">
            <div class="bg-orange-450 text-center text-white p-4 rounded-lg mt-4">
                <img src="{{ asset('storage/strive-logo.png') }}" alt="Thrive Logo" class="w-48 md:w-64 lg:w-72"> <!-- Larger logo with responsive scaling -->
                <h2 class="text-gray-800 text-xl font-semibold mb-2">Help Others <span class="font-bold">Thrive</span> Together!</h2>
            </div>
        </div>

        <!-- Right Side  -->
        <div class="bg-gray-50 p-8 md:w-1/2 flex flex-col justify-center">
            <h2 class="text-gray-800 text-2xl font-bold mb-6 text-center">Login to Your Thrive Account</h2>

            @if(session('success'))
            <div id="success-message" class="flex flex-col bg-green-500 text-white p-4 rounded mb-4 text-center">
                {{ session('success') }}
            </div>
        @endif


            @if ($errors->has('username'))
                    <div class="bg-red-500 text-white p-4 rounded mb-4 text-center">
                        {{ $errors->first('username') }}
                    </div>
            @endif

            @if ($errors->has('password'))
                <div class="bg-red-500 text-white p-4 rounded mb-4 text-center">
                    {{ $errors->first('password') }}
                </div>
            @endif

            <form action={{ route('accountLogin') }} method="POST" class="space-y-4">
                @csrf
                <div class="flex flex-col">
                    <label for="username" class="text-gray-700 font-semibold mb-1">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div class="flex flex-col">
                    <label for="password" class="text-gray-700 font-semibold mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <button type="submit" class="w-full bg-orange-400 text-white py-2 rounded-md hover:bg-orange-600 transition duration-300">LOGIN</button>
            </form>


            <p class="text-center text-gray-600 mt-4">
                Don't have an account yet? <a href={{ route('register') }} class="text-orange-500 font-semibold">Register</a>
            </p>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const successMessage = document.getElementById('success-message');
            if (successMessage) {
                setTimeout(() => {
                    successMessage.style.opacity = '0';
                    successMessage.style.transition = 'opacity 0.35s ease';
                    setTimeout(() => {
                        successMessage.remove();
                    }, 500);
                }, 4000);
            }
        });
    </script>
</body>


</html>
