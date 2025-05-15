<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->orderBy('nama_service')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::orderBy('nama_kategori')->get();
        return view('admin.services.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_service' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'id_kategori' => 'required|exists:service_categories,id_kategori',
            'harga' => 'required|numeric|min:0',
            'bonus' => 'nullable|string',
            'durasi' => 'nullable|string|max:50',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        Service::create($request->all());

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit(Service $service)
    {
        $categories = ServiceCategory::orderBy('nama_kategori')->get();
        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service)
    {
        $request->validate([
            'nama_service' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'id_kategori' => 'required|exists:service_categories,id_kategori',
            'harga' => 'required|numeric|min:0',
            'bonus' => 'nullable|string',
            'durasi' => 'nullable|string|max:50',
            'status' => 'required|in:aktif,tidak aktif',
        ]);

        $service->update($request->all());

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')
            ->with('success', 'Layanan berhasil dihapus.');
    }
}
