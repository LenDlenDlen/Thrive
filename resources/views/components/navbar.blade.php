<nav class="bg-orange-600" x-data="{ optionsMenuOpen: false, profileMenuOpen: false, mobileMenuOpen: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-20 items-center justify-between">

        <!-- Left Section with Clickable Logo -->
        <div class="flex items-center">
          <a href="{{ route('home') }}"> <!-- Link to home route -->
            <img class="h-16 w-auto mr-6" src="{{ asset('storage/logoStriveNoBG.png') }}" alt="Your Company">
          </a>
        </div>

        <!-- Center Section with Menu Links -->
        <div class="flex-1 flex items-center justify-center">
          <div class="flex space-x-6">
            <a href="{{route('startBusiness')}}" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900">Start Your Business</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900">Fund a Business</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900">Your Business</a>
            <div class="relative">
              <button @click="optionsMenuOpen = !optionsMenuOpen" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900">
                About
                <svg class="inline-block h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                </svg>
              </button>

              <!-- Dropdown Menu -->
              <div x-show="optionsMenuOpen" @click.away="optionsMenuOpen = false" class="absolute mt-2 w-40 bg-white rounded-md shadow-lg">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Account Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700">Support</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Right Section with Profile -->
        <div class="relative">
          <button @click="profileMenuOpen = !profileMenuOpen" class="relative flex items-center focus:outline-none">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile">
          </button>

          <!-- Profile Dropdown Menu -->
          <div
            x-show="profileMenuOpen"
            @click.away="profileMenuOpen = false"
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5"
          >
            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
            <a href="{{ route('accountLogout') }}" class="block px-4 py-2 text-sm text-gray-700">Sign Out</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div x-show="mobileMenuOpen" class="sm:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3">
        <a href="#" class="text-white block px-3 py-2 rounded-md text-base font-medium">Dashboard</a>
        <a href="#" class="text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
      </div>
    </div>
  </nav>
