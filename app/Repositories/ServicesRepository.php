<?php

namespace App\Repositories;

use App\Models\Services;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesRepository
{
    public function all(Request $request)
    {
        $query = Services::query();

        if ($request->filled('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        return $query->latest()->paginate(10);
    }

    public function store(array $data, Request $request)
    {
        if ($request->hasFile('image')) {
            $data['image'] = $request
                ->file('image')
                ->store('services', 'public');
        }

        return Services::create($data);
    }

    public function update(array $data, Services $service, Request $request)
    {
        if ($request->hasFile('image')) {

            if ($service->image && Storage::disk('public')->exists($service->image)) {
                Storage::disk('public')->delete($service->image);
            }

            $data['image'] = $request
                ->file('image')
                ->store('services', 'public');
        }

        return $service->update($data);
    }

    public function delete(Services $service)
    {
        if ($service->image && Storage::disk('public')->exists($service->image)) {
            Storage::disk('public')->delete($service->image);
        }

        return $service->delete();
    }
}
