<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Barber Booking System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <style>
            /* Force typed text to be black in all inputs and selects */
            input, select {
                color: black !important;
            }
        </style>
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
                <a href="{{ url('/dashboard') }}" class="text-lg font-medium text-gray-700 hover:text-indigo-600 transition">Appointments</a>
                <a href="{{ route('profile.edit') }}" class="flex items-center space-x-2 group pl-4">
                    <span class="font-bold text-gray-700 group-hover:text-indigo-600 transition">{{ Auth::user()->name }}</span>
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
            @endauth
        </div>
    </nav>

    <main class="py-16 px-6">
        <div class="max-w-7xl mx-auto flex flex-col items-center">
            
            <div class="bg-amber-500 px-12 py-4 rounded-xl shadow-md border-2 border-gray-800 mb-12">
                <h1 class="bg-blue-600 px-4 py-2 rounded-md text-3xl font-extrabold text-black uppercase tracking-tight">Booking Form</h1>
            </div>

            <div class="bg-[#F9E4B7] dark:bg-gray-800 border-2 border-gray-300 dark:border-gray-700 rounded-[40px] p-8 md:p-12 w-full max-w-6xl shadow-xl">
                <form action="#" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-10">
                    @csrf
                    
                    <div class="bg-[#EFFFF0] dark:bg-gray-700 border border-gray-200 rounded-lg p-8 shadow-sm">
                        <h2 style="font-size: 23px;" class="bg-blue-600 px-4 py-2 rounded-md text-2xl w-64 mx-auto font-bold text-center mb-10 uppercase text-gray-800 dark:text-white">Personal Details</h2>
                        <div class="space-y-4"> <div class="py-4"> <label class="block font-bold mb-2">Name:</label>
                                <input type="text" name="name" value="{{ Auth::user()->name }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 py-3 bg-white text-black">
                            </div>
                            <div class="py-4"> 
                                <label class="block font-bold mb-2">Phone No:</label>
                                <input type="text" name="phone" class="w-64 rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 py-3 bg-white text-black">
                            </div>
                            <div class="py-4"> 
                                <label class="block font-bold mb-2">Email:</label>
                                <input type="email" name="email" value="{{ Auth::user()->email }}" class="w-full rounded-xl border-gray-300 shadow-sm focus:ring-indigo-500 py-3 bg-white text-black">
                            </div>
                        </div>
                    </div>

                    <div class="bg-[#EFFFF0] dark:bg-gray-700 border border-gray-200 rounded-lg p-8 shadow-sm flex flex-col">
                        <h2 style="font-size: 23px;" class="bg-blue-600 px-4 py-2 w-64 rounded-md text-2xl font-bold mx-auto text-center mb-10 uppercase text-gray-800 dark:text-white">Booking Details</h2>
                        <div class="space-y-4 flex-grow">
                            <div class="py-4">
                                <p class="font-bold mb-4">Service:</p>
                                <div class="flex flex-wrap gap-6">
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="service" class="w-5 h-5 text-indigo-600"> <span style="margin-left: 8px;">Haircut</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="service" class="w-5 h-5 text-indigo-600"> <span style="margin-left: 8px;">Beard Trim</span>
                                    </label>
                                    <label class="flex items-center space-x-2 cursor-pointer">
                                        <input type="radio" name="service" class="w-5 h-5 text-indigo-600"> <span style="margin-left: 8px;">Hair Wash</span>
                                    </label>
                                </div>
                            </div>
                            <div class="py-4">
                                <label class="block font-bold mb-2">Date:</label>
                                <input type="date" name="date" class="w-full rounded-xl border-2 border-amber-400 py-3 px-4 bg-white text-black">
                            </div>
                            <div class="py-4">
                                <p class="font-bold mb-3">Time:</p>
                                <div class="flex items-center space-x-4">
                                    <select name="hour" class="w-48 text-center text-xl font-bold border-2 border-amber-300 rounded-lg p-2 bg-white text-black">
                                        @for ($i = 1; $i <= 12; $i++)
                                            <option value="{{ sprintf('%02d', $i) }}">{{ sprintf('%02d', $i) }}</option>
                                        @endfor
                                    </select>
                                    <span class="text-2xl font-bold">:</span>
                                    <select name="minute" class="w-48 text-center text-xl font-bold border-2 border-amber-300 rounded-lg p-2 bg-white text-black">
                                        <option value="00">00</option>
                                        <option value="15">15</option>
                                        <option value="30">30</option>
                                        <option value="45">45</option>
                                    </select>
                                    <select name="ampm" class="w-20 text-left text-lg font-bold border-2 border-amber-300 rounded-lg p-2 bg-white text-black">
                                        <option value="AM">AM</option>
                                        <option value="PM">PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-end space-x-4 mt-12">
                            <button type="button" class="bg-red-600 !bg-red-600 text-white px-8 py-3 rounded-full font-bold shadow-md hover:bg-red-700 transition">Cancel</button>
                            <button style="background-color: #5BB450;" type="submit" class="bg-green-600 !bg-green-600 text-white px-8 py-3 rounded-full font-bold shadow-md hover:bg-green-700 transition">Done</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
    </body>
</html>