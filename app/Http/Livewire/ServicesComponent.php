<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ServiceCategory;
use App\Models\Service;

class ServicesComponent extends Component
{
    public $selectedCategory = null;
    public $categories = [];
    public $services = [];

    public function mount()
    {
        try {
            $this->categories = ServiceCategory::all();

            if ($this->categories->isNotEmpty()) {
                $this->selectedCategory = $this->categories->first()->id_kategori;
                $this->services = Service::where('id_kategori', $this->selectedCategory)
                    ->where('status', 'aktif')
                    ->get();
            }
        } catch (\Exception $e) {
            \Log::error('Error in ServicesComponent: ' . $e->getMessage());
        }
    }

    public function selectCategory($categoryId)
    {
        try {
            $this->selectedCategory = $categoryId;
            $this->services = Service::where('id_kategori', $categoryId)
                ->where('status', 'aktif')
                ->get();
        } catch (\Exception $e) {
            \Log::error('Error selecting category: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.services-component');
    }
}
