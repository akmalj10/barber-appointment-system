<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>My Appointments Page | Barber Booking System</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased bg-gray-50 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
        
    {{-- Consistent Navigation Bar --}}
    <nav class="py-4 px-6 flex justify-between items-center bg-[#F2E8CF] shadow-sm border-b border-gray-200">
        <div class="text-2xl font-bold tracking-tighter uppercase">
            <span class="text-gray-900 dark:text-white">Barber</span><span class="text-indigo-600">Booking</span>
        </div>
        
        <div class="flex items-center space-x-8">
            <a href="{{ url('/') }}" class="text-lg font-medium text-gray-700 hover:text-indigo-600 transition">Home</a>
            @auth
                <a href="{{ route('booking') }}" class="text-lg font-medium text-gray-700 hover:text-indigo-600 transition">Booking</a>
                <a href="{{ route('appointments.index') }}" class="text-lg font-medium text-gray-700 hover:text-indigo-600 transition">Appointments</a>
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
            
            {{-- Header Title Section --}}
            <div class="bg-amber-500 px-16 py-4 rounded-xl shadow-md border-2 border-gray-800 mb-12">
                <h1 class="bg-blue-600 px-4 py-2 rounded-md text-3xl font-extrabold text-black uppercase tracking-tight">
                    My Appointments
                </h1>
            </div>

                    @if(session('success'))
    <div id="status-alert" class="max-w-6xl mx-auto mb-6 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-md rounded-r-lg flex justify-between items-center">
        <div class="flex items-center">
            <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span class="font-bold">{{ session('success') }}</span>
        </div>
        <button onclick="document.getElementById('status-alert').remove()" class="text-green-900 font-bold">&times;</button>
    </div>
        @endif

            {{-- Table Container Section --}}
            <div class="bg-[#EFFFF0] dark:bg-gray-800 border-2 border-green-200 dark:border-gray-700 rounded-[40px] p-8 md:p-12 w-full max-w-6xl shadow-xl">
                <h2 style="font-size: 23px;" class="bg-blue-600 px-4 py-2 w-64 rounded-md text-2xl font-bold mx-auto text-center mb-10 uppercase text-gray-800 dark:text-white">Appointments</h2>
                
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse bg-blue-50/50 dark:bg-gray-700/50 rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-blue-100 dark:bg-gray-900 border-b-2 border-blue-200 dark:border-gray-600">
                                <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-200">Name</th>
                                <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-200">Email</th>
                                <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-200">Phone No</th>
                                <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-200">Service</th>
                                <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-200">Date</th>
                                <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-200">Time</th>
                                <th class="px-6 py-4 font-bold text-gray-700 dark:text-gray-200">Status</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-blue-100 dark:divide-gray-600">
                            @foreach($appointments as $appointment)
                            <tr class="hover:bg-white/50 dark:hover:bg-gray-600/50 transition">
                                <td class="px-6 py-4">{{ $appointment->name }}</td>
                                <td class="px-6 py-4">{{ $appointment->email }}</td>
                                <td class="px-6 py-4">{{ $appointment->phone }}</td>
                                <td class="px-6 py-4">
                                    <span class="bg-blue-600 text-white px-3 py-1 rounded-md text-sm font-bold uppercase">
                                        {{ $appointment->service }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">{{ $appointment->date }}</td>
                                <td class="px-6 py-4">{{ $appointment->time }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center space-x-2">
                                        <span class="font-bold {{ $appointment->status == 'Canceled' ? 'text-red-600' : 'text-gray-700 dark:text-gray-200' }}">
                                            {{ $appointment->status ?? 'Pending' }}
                                        </span>
                                        @if($appointment->status == 'Pending')
                                            <form action="{{ route('appointments.cancel', $appointment->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="bg-red-600 ml-2 text-white rounded-full w-6 h-6 flex items-center justify-center hover:scale-110 transition">
                                                    &times;
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($appointments->isEmpty())
                    <div class="text-center py-12">
                        <p class="text-xl text-gray-500">You have no appointments scheduled yet.</p>
                        <a href="{{ route('booking') }}" class="mt-4 inline-block bg-green-600 text-white px-8 py-3 rounded-full font-bold shadow-md hover:bg-green-700 transition">
                            Book Now
                        </a>
                    </div>
                @endif
                <div class="mt-6 text-center">

            <a href="{{ route('booking') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Book New Appointment</a>

            <a href="{{ route('dashboard') }}" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back to Dashboard</a>

            </div>
            </div>
        </div>
    </main>
            <footer class="py-10 text-center text-gray-400 border-t border-gray-100 dark:border-gray-800">
                <p>&copy; {{ date('Y') }} Barber Appointment System</p>
            </footer>
    </body>
</html>