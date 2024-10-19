<script src="https://cdn.tailwindcss.com"></script>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="shadow-md rounded-md bg-gray-50 p-8 md:w-1/3 flex flex-col justify-center">
        <div>
            <h2 class="text-gray-800 text-2xl font-bold mb-6 text-center"> Change Your Password</h2>
        </div>
        <div class="flex flex-col">
            <label for="password" class="text-gray-700 font-semibold mb-1">Current Password</label>
            <input type="password" id="password_old" name="password_old" placeholder="Password" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
        </div>

        <div class="flex flex-col">
            <label for="password_new" class="text-gray-700 font-semibold mb-1 mt-2">New Password</label>
            <input type="password" id="password_new" name="password_new" placeholder="New Password" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
        </div>

        <div class="flex flex-col">
            <label for="confirm_new" class="text-gray-700 font-semibold mb-1 mt-2">Confirm New Password</label>
            <input type="password" id="confirm_new" name="confirm_new" placeholder="Confirm New Password" class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-orange-500">
        </div>
    </div>

</body>
