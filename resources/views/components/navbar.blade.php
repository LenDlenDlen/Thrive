<nav class="bg-orange-600" x-data="{ optionsMenuOpen: false, profileMenuOpen: false, mobileMenuOpen: false }">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" @click="mobileMenuOpen = !mobileMenuOpen" class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg :class="{'hidden': mobileMenuOpen, 'block': !mobileMenuOpen }" class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
            </svg>
            <svg :class="{'block': mobileMenuOpen, 'hidden': !mobileMenuOpen }" class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex flex-shrink-0 items-center">
            <img class="h-8 w-auto" src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
          </div>
          <div class="hidden sm:ml-6 sm:block">
            <div class="flex space-x-4">
              <a href={{ route('home') }} class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900" aria-current="page">Home</a>
              <a href={{ route('startBusiness') }} class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900" aria-current="page">Start Your Business</a>
              <a href={{ route('Fund') }} class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900">Fund a Business</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium hover:bg-white text-gray-900">Your Business</a>
            </div>
          </div>
        </div>

        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <!-- Conditional for Guests or Authenticated Users -->
          @if(Auth::check())
            <!-- Profile dropdown for logged-in users -->
            <div class="relative ml-3">
              <div>
                <button type="button" @click="profileMenuOpen = !profileMenuOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open user menu</span>
                  <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->profile_picture ?? 'default-avatar.jpg' }}" alt="Profile Picture">
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
                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem">Settings</a>
                <form id="logout-form" action={{ route('accountLogout') }} method="POST" style="display: none;">
                  @csrf
                </form>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="menuitem">Sign out</a>
              </div>
            </div>
          @else
            <!-- Guest user view -->
            <div class="relative ml-3">
              <div>
                <button type="button" @click="profileMenuOpen = !profileMenuOpen" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="guest-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="sr-only">Open guest menu</span>
                  <img class="h-8 w-8 rounded-full" src="default-guest-icon.jpg" alt="Guest">
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
    </div>
  </nav>
