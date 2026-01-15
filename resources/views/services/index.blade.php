<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Manage Barber Services') }}
            </h2>
            <a href="{{ route('services.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white transition ease-in-out duration-150">
                + Add New Service
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm" role="alert">
                    <p class="font-bold">Success</p>
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b-2 border-gray-200 dark:border-gray-700">
                                <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-400">Service Name</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-400">Price</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-400">Duration</th>
                                <th class="py-4 px-6 font-bold uppercase text-sm text-gray-600 dark:text-gray-400 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($services as $service)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors border-b border-gray-100 dark:border-gray-700">
                                    <td class="py-4 px-6">{{ $service->name }}</td>
                                    <td class="py-4 px-6 font-medium text-green-600">${{ number_format($service->price, 2) }}</td>
                                    <td class="py-4 px-6 text-gray-500">{{ $service->duration }} mins</td>
                                    <td class="py-4 px-6 flex justify-center space-x-4">
                                        <a href="{{ route('services.edit', $service) }}" class="text-indigo-600 hover:text-indigo-900 font-semibold">Edit</a>
                                        
                                        <form action="{{ route('services.destroy', $service) }}" method="POST" onsubmit="return confirm('Delete this service permanently?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 font-semibold">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="py-12 text-center text-gray-500 italic">
                                        No services found. Click "Add New Service" to get started.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>