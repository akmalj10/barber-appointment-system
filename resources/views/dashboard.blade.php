<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Barber Shop | Professional Grooming</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
        
        <nav class="p-6 flex justify-between items-center bg-white dark:bg-gray-800 shadow-sm">
            <div class="text-2xl font-bold tracking-wider uppercase">
                Barber<span class="text-indigo-600">Shop</span>
            </div>
            
            <div class="space-x-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold hover:text-indigo-600 transition">Dashboard</a>
                        <a href="{{ route('services.index') }}" class="font-semibold hover:text-indigo-600 transition">Services</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold hover:text-indigo-600 transition">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </nav>

        <header class="relative py-24 px-6 text-center bg-gray-100 dark:bg-gray-800/50">
            <div class="max-w-3xl mx-auto">
                <h1 class="text-5xl font-extrabold mb-6 leading-tight">
                    Premium Grooming for the <span class="text-indigo-600">Modern Gentleman</span>
                </h1>
                <p class="text-lg text-gray-600 dark:text-gray-400 mb-10">
                    Experience the best haircuts, beard trims, and hot towel shaves in town. Book your appointment today and look your absolute best.
                </p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('register') }}" class="px-8 py-3 bg-indigo-600 text-white font-bold rounded-lg shadow-lg hover:bg-indigo-700 transition">Book Now</a>
                    <a href="#services" class="px-8 py-3 bg-white dark:bg-gray-700 text-gray-900 dark:text-white font-bold rounded-lg shadow-md hover:bg-gray-200 dark:hover:bg-gray-600 transition">View Services</a>
                </div>
            </div>
        </header>

        <section id="services" class="py-20 max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Our Popular Services</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 text-center">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.121 14.121L19 19m-7-7l7-7m-7 7l-2.879 2.879M12 12L9.121 9.121m0 5.758L6.243 17.757M12 12l2.879-2.879"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Classic Haircut</h3>
                    <p class="text-gray-500 mb-4">A sharp, tailored cut to suit your style.</p>
                    <span class="text-2xl font-bold text-indigo-600">$25.00</span>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 text-center">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Beard Grooming</h3>
                    <p class="text-gray-500 mb-4">Trimming and shaping for the perfect beard.</p>
                    <span class="text-2xl font-bold text-indigo-600">$15.00</span>
                </div>

                <div class="bg-white dark:bg-gray-800 p-8 rounded-xl shadow-sm border border-gray-100 dark:border-gray-700 text-center">
                    <div class="text-indigo-600 mb-4">
                        <svg class="w-12 h-12 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path></svg>
                    </div>
                    <h3 class="text-xl font-bold mb-2">Luxury Shave</h3>
                    <p class="text-gray-500 mb-4">Traditional hot towel straight-razor shave.</p>
                    <span class="text-2xl font-bold text-indigo-600">$20.00</span>
                </div>
            </div>
        </section>

        <footer class="py-10 border-t border-gray-200 dark:border-gray-800 text-center text-gray-500 text-sm">
            &copy; {{ date('Y') }} Barber Shop Appointment System. All rights reserved.
        </footer>

    </body>
</html>