<nav class="bg-orange-600" x-data="{ optionsMenuOpen: false, profileMenuOpen: false, mobileMenuOpen: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-20 items-center justify-between">

        <!-- Left Section with Clickable Logo -->
        <div class="flex items-center">
          <a href="{{ route('home') }}"> <!-- Link to home route -->
            <img class="h-16 w-auto mr-6" src="{{ asset('storage/logoStriveNoBG.png') }}" alt="Your Company">
          </a>
        </div>
        <div class="hidden sm:ml-6 sm:block">
          <div class="flex space-x-4">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            <a href={{ route('home') }} class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900" aria-current="page">Home</a>
            <a href="#" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900" aria-current="page">Start Your Business</a>
            <a href={{ route('Fund') }} class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900">Fund a Business</a>

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
      </div>
      {{-- profile top right corner --}}
      <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

        {{-- if user is logged-in --}}
        @if(Auth::check())
        <!-- Profile dropdown -->
        <div class="relative ml-3">
          <div>
            <button type="button" @click="profileMenuOpen = !profileMenuOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
              <span class="absolute -inset-1.5"></span>
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </button>
          </div>

        <!-- Right Section with Profile -->
        <div class="relative">
          <button @click="profileMenuOpen = !profileMenuOpen" class="relative flex items-center focus:outline-none">
            <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="Profile">
          </button>

          <!-- Profile Dropdown Menu -->
          <div
          x-show="profileMenuOpen"
          x-transition:enter="transition ease-out duration-100 transform"
          x-transition:enter-start="opacity-0 scale-95"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-75 transform"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-95"
          class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <!-- Active: "bg-gray-100", Not Active: "" -->
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <form id="logout-form" action={{ route('accountLogout') }} method="POST" style="display: none;">
                @csrf
            </form>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
            x-show="profileMenuOpen"
            @click.away="profileMenuOpen = false"
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 ring-1 ring-black ring-opacity-5"
          >
            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700">Settings</a>
            <a href="{{ route('accountLogout') }}" class="block px-4 py-2 text-sm text-gray-700">Sign Out</a>
          </div>
        </div>
        {{-- if user accessing is a guest --}}
        @else
        <div class="relative ml-3">

            {{-- dropdown --}}
            <div>
              <button type="button" @click="profileMenuOpen = !profileMenuOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="guest-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">Open guest menu</span>
                <img class="h-8 w-8 rounded-full" src="" alt="Guest">
              </button>
            </div>

            <div
              x-show="profileMenuOpen"
              x-transition:enter="transition ease-out duration-100 transform"
              x-transition:enter-start="opacity-0 scale-95"
              x-transition:enter-end="opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75 transform"
              x-transition:leave-start="opacity-100 scale-100"
              x-transition:leave-end="opacity-0 scale-95"
              class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="guest-menu-button" tabindex="-1">
              <a href={{ route('login') }} class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Login</a>
              <a href={{ route('register') }} class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Sign up</a>
            </div>
          </div>
        @endif
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
