<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Faq;

class HomeController extends Controller
{
    public function index()
    {
        $features = [
            ['title' => 'Fitur 1', 'description' => 'Deskripsi fitur 1'],
            ['title' => 'Fitur 2', 'description' => 'Deskripsi fitur 2'],
            ['title' => 'Fitur 3', 'description' => 'Deskripsi fitur 3'],
        ];
    
        $services = [
            ['title' => 'Layanan 1', 'description' => 'Deskripsi layanan 1'],
            ['title' => 'Layanan 2', 'description' => 'Deskripsi layanan 2'],
            ['title' => 'Layanan 3', 'description' => 'Deskripsi layanan 3'],
        ];
    
        return view('home', compact('features', 'services'));
    }
}