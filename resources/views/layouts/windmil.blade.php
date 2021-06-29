<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title')</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="{{asset('css/tailwind.output.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
    <script
      src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"
      defer
    ></script>
    <script src="{{asset('js/init-alpine.js')}}"></script>
  </head>
  <body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen}">
      <!-- Desktop sidebar -->
      @include('layouts.desktop-sidebar')
      
      <!-- Mobile sidebar -->
      @include('layouts.mobile-sidebar')

      <div class="flex flex-col flex-1">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300">
            
            <!-- Mobile hamburger -->
            @include('layouts.mobile-hamburger')
            <!-- Search input -->
            @include('layouts.search-input')

            <ul class="flex items-center flex-shrink-0 space-x-6">
                <!-- Theme toggler -->
                @include('layouts.theme-toggler')
                <!-- Notifications menu -->
                {{--@include('layouts.notifications-menu')--}}
                <!-- Profile menu -->
                @include('layouts.profile-menu')
            </ul>

          </div>
        </header>
        <main class="h-full pb-16 overflow-y-auto">
          <!-- Remove everything INSIDE this div to a really blank page -->
          <div class="container px-6 mx-auto grid">
            <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
              @yield('content')
            </h2>
          </div>
        </main>
      </div>
    </div>
  </body>
</html>
