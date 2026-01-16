<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Barber Booking System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
        
    <nav class="py-4 px-6 flex justify-between items-center bg-[#F2E8CF] shadow-sm border-b border-gray-200">
        <div class="text-2xl font-bold tracking-tighter uppercase">
            <span class="text-gray-900 dark:text-white">Barber</span><span class="text-indigo-600">Booking</span>
        </div>
        
        <div class="flex items-center space-x-8">
            <a href="{{ url('/') }}" class="text-lg font-medium text-gray-700 hover:text-indigo-600 transition">Home</a>

            @auth
                <a href="{{ route('booking') }}" class="text-lg font-medium text-gray-700 hover:text-indigo-600 transition">Booking</a>
                <a href="{{ route('my.appointments') }}" class="text-lg font-medium text-gray-700 hover:text-indigo-600 transition">Appointments</a>
                
                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 group pl-4">
                    <span class="font-bold text-gray-700 group-hover:text-indigo-600 transition">
                        {{ Auth::user()->name }}
                    </span>
                    <div class="p-1 bg-gray-900 rounded-full">
                        <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/>
                        </svg>
                    </div>
                </a>
                
                <form method="POST" action="{{ route('logout') }}" class="inline ml-4">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500 hover:text-red-600 font-medium underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-indigo-600">Log in</a>
                <a href="{{ route('register') }}" class="px-5 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition shadow-md">Register</a>
            @endauth
        </div>
    </nav>

        <header class="py-20 px-6 text-center">
            <h1 class="text-5xl font-extrabold mb-4">Precision & Style</h1>
            <p class="text-xl text-gray-500">The ultimate grooming experience for the modern gentleman</p>
        </header>

        <section id="services" class="pb-24 px-6">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold uppercase tracking-widest">Our Services</h2>
                    <div class="h-1 w-20 bg-indigo-600 mx-auto mt-2"></div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                    
                    <div class="flex flex-col items-center p-6 bg-white dark:bg-gray-800 rounded-3xl shadow-lg transition-transform hover:-translate-y-2">
                        <div class="mb-6 overflow-hidden rounded-2xl border-4 border-gray-100 dark:border-gray-700">
                            <img src="{{ asset('images/Haircut.jpg') }}" alt="Haircut" class="w-64 h-64 object-cover">
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Classic Haircut</h3>
                        <p class="text-gray-500 text-center mb-4">Precision fades and tailored styling</p>
                        <span class="text-2xl font-black text-indigo-600">RM 25.00</span>
                    </div>

                    <div class="flex flex-col items-center p-6 bg-white dark:bg-gray-800 rounded-3xl shadow-lg transition-transform hover:-translate-y-2">
                        <div class="mb-6 overflow-hidden rounded-2xl border-4 border-gray-100 dark:border-gray-700">
                            <img src="{{ asset('images/BeardTrim.jpg') }}" alt="Beard Trim" class="w-64 h-64 object-cover">
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Beard Grooming</h3>
                        <p class="text-gray-500 text-center mb-4">Shaping and trimming for beards</p>
                        <span class="text-2xl font-black text-indigo-600">RM 15.00</span>
                    </div>

                    <div class="flex flex-col items-center p-6 bg-white dark:bg-gray-800 rounded-3xl shadow-lg transition-transform hover:-translate-y-2">
                        <div class="mb-6 overflow-hidden rounded-2xl border-4 border-gray-100 dark:border-gray-700">
                            <img src="{{ asset('images/HairWash.jpg') }}" alt="Hair Wash" class="w-64 h-64 object-cover">
                        </div>
                        <h3 class="text-2xl font-bold mb-2">Luxury Hair Wash</h3>
                        <p class="text-gray-500 text-center mb-4">Refreshing scalp massage and premium care</p>
                        <span class="text-2xl font-black text-indigo-600">RM 10.00</span>
                    </div>

                </div>
            </div>
        </section>

        <footer class="py-10 text-center text-gray-400 border-t border-gray-100 dark:border-gray-800">
            <p>&copy; {{ date('Y') }} Barber Appointment System</p>
        </footer>
    </body>
</html>