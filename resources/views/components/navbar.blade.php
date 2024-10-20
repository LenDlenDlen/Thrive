<nav class="bg-orange-600 bg-opacity-85" x-data="{ mobileMenuOpen: false, profileMenuOpen: false }">
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
    <div class="relative flex h-16 items-center justify-between">
      
      <!-- Mobile menu button -->
      <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
        <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="inline-flex items-center justify-center p-2 rounded-md hover:bg-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
          <span class="sr-only">Open main menu</span>
          <!-- Icon when menu is closed -->
          <svg x-bind:class="{ 'hidden': mobileMenuOpen }" class="block h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
          </svg>
          <!-- Icon when menu is open -->
          <svg x-bind:class="{ 'hidden': !mobileMenuOpen }" class="block h-8 w-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Logo -->
      <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
        <div class="flex-shrink-0">
          <img class="h-12 w-auto object-contain" src="{{ asset('assets/images/thrive.png') }}" alt="Your Logo">
        </div>

        <!-- Desktop Menu -->
        <div class="hidden sm:block sm:ml-6">
          <div class="flex space-x-4">
            <a href="{{ route('index') }}" class="px-3 py-4 rounded-md text-sm font-medium hover:bg-white">Home</a>
            <a href="{{ route('startBusiness') }}" class="px-3 py-4 rounded-md text-sm font-medium hover:bg-white">Start Your Business</a>
            <a href="{{ route('fundBusiness') }}" class="px-3 py-4 rounded-md text-sm font-medium hover:bg-white">Fund a Business</a>
            <a href="#" class="px-3 py-4 rounded-md text-sm font-medium hover:bg-white">Your Business</a>
          </div>
        </div>
      </div>

      <!-- Profile menu -->
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
        @if(Auth::check())
        <!-- Logged-in menu -->
        <div class="relative" x-data="{ profileMenuOpen: false }">
          <button @click="profileMenuOpen = !profileMenuOpen" class="flex items-center px-3 py-2 bg-white text-black rounded-md hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">Open user menu</span>
            <span class="text-sm font-medium">Hi, {{ Auth::user()->name }}!</span>
          </button>
        
          <!-- Dropdown -->
          <div x-show="profileMenuOpen" @click.away="profileMenuOpen = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white py-1 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button">
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Sign out</a>
            <form id="logout-form" action="{{ route('accountLogout') }}" method="POST" style="display: none;">@csrf</form>
          </div>
        </div>
        @else
        <!-- Guest menu -->
        <div class="relative" x-data="{ profileMenuOpen: false }">
          <button @click="profileMenuOpen = !profileMenuOpen" class="flex items-center bg-gray-800 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white">
            <span class="sr-only">Open guest menu</span>
            <img class="h-8 w-8 rounded-full bg-white object-contain" src="{{ asset('assets/images/guest-icon.png') }}" alt="Guest Icon">
          </button>

          <!-- Dropdown -->
          <div x-show="profileMenuOpen" @click.away="profileMenuOpen = false" class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white py-1 ring-1 ring-black ring-opacity-5" role="menu" aria-orientation="vertical" aria-labelledby="guest-menu-button">
            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Login</a>
            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Sign up</a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div x-show="mobileMenuOpen" class="sm:hidden">
    <div class="px-2 pt-2 pb-3 space-y-1">
      <a href="{{ route('index') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white">Home</a>
      <a href="{{ route('startBusiness') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white">Start Your Business</a>
      <a href="{{ route('fundBusiness') }}" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white">Fund a Business</a>
      <a href="#" class="block px-3 py-2 rounded-md text-base font-medium hover:bg-white">Your Business</a>
    </div>
  </div>
</nav>