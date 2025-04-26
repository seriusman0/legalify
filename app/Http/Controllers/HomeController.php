<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $latestBlogs = Blog::latest()
            ->take(3)
            ->get();

        return view('welcome', compact('latestBlogs'));
    }
}
