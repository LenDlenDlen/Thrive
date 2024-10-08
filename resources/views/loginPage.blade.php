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
        <div class="bg-gray-200 p-8 flex flex-col items-center justify-center md:w-1/2">
            <div class="bg-orange-400 text-center text-white p-4 rounded-lg mt-4">
                <img src="{{ asset('storage/logoStrive.jpg') }}" alt="Thrive Logo" class="w-48 md:w-64 lg:w-72"> <!-- Larger logo with responsive scaling -->

            </div>
            <h2 class="text-gray-800 text-xl font-semibold mb-2">Help Others <span class="font-bold">Thrive</span> Together!</h2>
        </div>

        <!-- Right Side  -->
        <div class="bg-gray-50 p-8 md:w-1/2 flex flex-col justify-center">
            <h2 class="text-gray-800 text-2xl font-bold mb-6 text-center">Login to Your Thrive Account</h2>

            <form action="#" method="POST" class="space-y-4">
                <div class="flex flex-col">
                    <label for="username" class="text-gray-700 font-semibold mb-1">Username</label>
                    <input type="text" id="username" name="username" placeholder="Username" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>

                <div class="flex flex-col">
                    <label for="password" class="text-gray-700 font-semibold mb-1">Password</label>
                    <input type="password" id="password" name="password" placeholder="Password" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
                </div>
                <!-- Routing disini nanti -->
                <button type="submit" class="w-full bg-orange-400 text-white py-2 rounded-md hover:bg-orange-600 transition duration-300">LOGIN</button>
            </form>

            <p class="text-center text-gray-600 mt-4">
                Don't have an account yet? <a href="#" class="text-orange-500 font-semibold">Register</a>
            </p>
        </div>
    </div>

</body>
</html>
