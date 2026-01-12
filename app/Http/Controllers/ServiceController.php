<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    // Show all services
    public function index()
    {
        $services = Service::all();
        return view('services.index', compact('services'));
    }

    // Show form to create a service
    public function create()
    {
        return view('services.create');
    }

    // Save new service
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        Service::create($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Service created successfully.');
    }

    // Show form to edit a service
    public function edit(Service $service)
    {
        return view('services.edit', compact('service'));
    }

    // Update service
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'duration' => 'required|integer',
        ]);

        $service->update($request->all());

        return redirect()->route('services.index')
            ->with('success', 'Service updated successfully.');
    }

    // Delete service
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'Service deleted successfully.');
    }
}
