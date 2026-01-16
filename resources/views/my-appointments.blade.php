<x-app-layout>  <!-- Adjust to your layout component name if different (e.g., x-layout) -->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            My Appointments
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-center mb-12">
            <div class="bg-amber-500 px-12 py-4 rounded-xl shadow-md border-2 border-gray-800">
                <h1 class="bg-blue-600 px-4 py-2 rounded-md text-3xl font-extrabold text-amber-500 uppercase tracking-tight">My Appointments</h1>
            </div>
        </div>
        
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @if($bookings->isEmpty())
            <p class="text-center text-gray-500">You have no appointments yet. <a href="{{ route('booking') }}" class="text-indigo-600 hover:underline">Book one now</a>.</p>
        @else
            <div class="overflow-x-auto flex justify-center">
                <table class="min-w-full border border-white rounded-lg shadow-md mx-auto">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Email</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Phone No.</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Service</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Date</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr class="border-t border-white text-center">
                                <td class="px-6 py-4 text-sm text-white">{{ $booking->name }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $booking->email }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $booking->phone }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $booking->service }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $booking->date }}</td>
                                <td class="px-6 py-4 text-sm text-white">{{ $booking->time }}</td>
                                <td class="px-6 py-4 text-sm">
                                    @if(\Carbon\Carbon::parse($booking->date)->isPast())
                                        <span class="px-3 py-1 rounded-full text-white bg-green-600 font-bold">Completed</span>  <!-- Green background, white text, rounded -->
                                    @else
                                        <span class="px-3 py-1 rounded-full text-white bg-red-600 font-bold">Incomplete</span>  <!-- Red background, white text, rounded -->
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    <form action="{{ route('booking.destroy', $booking) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to cancel this appointment?')">Cancel</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
        
        <div class="mt-6 text-center">
            <a href="{{ route('booking') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">Book New Appointment</a>
            <a href="{{ route('dashboard') }}" class="ml-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Back to Dashboard</a>
        </div>
    </div>
</x-app-layout>