<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::with('services')->orderBy('nama_kategori')->get();
        return view('admin.services.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.services.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:50|unique:service_categories',
            'deskripsi_kategori' => 'nullable|string'
        ]);

        ServiceCategory::create($request->all());

        return redirect()->route('admin.service-categories.index')
            ->with('success', 'Kategori layanan berhasil ditambahkan.');
    }

    public function edit(ServiceCategory $serviceCategory)
    {
        return view('admin.services.categories.edit', compact('serviceCategory'));
    }

    public function update(Request $request, ServiceCategory $serviceCategory)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:50|unique:service_categories,nama_kategori,' . $serviceCategory->id_kategori . ',id_kategori',
            'deskripsi_kategori' => 'nullable|string'
        ]);

        $serviceCategory->update($request->all());

        return redirect()->route('admin.service-categories.index')
            ->with('success', 'Kategori layanan berhasil diperbarui.');
    }

    public function destroy(ServiceCategory $serviceCategory)
    {
        $serviceCategory->delete();

        return redirect()->route('admin.service-categories.index')
            ->with('success', 'Kategori layanan berhasil dihapus.');
    }
}
