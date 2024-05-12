<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class DiscoverController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('admin.discover.index', compact('cities'));
    }

    public function create()
    {
        return view('admin.discover.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'slang' => 'nullable|string|max:50',
        ]);

        City::create($data);

        return redirect()->route('admin.discover.index')->with('success', 'City created successfully.');
    }

    public function edit(City $city)
    {
        return view('admin.discover.edit', compact('city'));
    }

    public function update(Request $request, City $city)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'slang' => 'nullable|string|max:50',
        ]);

        $city->update($data);

        return redirect()->route('admin.discover.index')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        $city->delete();

        return redirect()->route('admin.discover.index')->with('success', 'City deleted successfully.');
    }
}
