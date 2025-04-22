<?php

namespace App\Http\Controllers;
use App\Models\Blog;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::where('user_id', auth()->id())->latest()->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }
    public function blog()
    {
        return view('blog' );
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)    {        $request->validate([            'title' => 'required',            'content' => 'required',            'image' => 'nullable|image|max:2048'        ]);        $blog = auth()->user()->blogs()->create([            'title' => $request->title,            'content' => $request->content,            'slug' => Str::slug($request->title),            'image' => $request->hasFile('image') ? $request->file('image')->store('blog-images', 'public') : null        ]);        return redirect()->route('admin.blogs.index')->with('success', 'Blog created successfully.');    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'nullable|image|max:2048'
        ]);

        $blog->update([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'image' => $request->hasFile('image') ? $request->file('image')->store('blog-images', 'public') : $blog->image
        ]);

        return redirect()->route('admin.blogs.index')->with('success', 'Blog updated successfully.');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->route('admin.blogs.index')->with('success', 'Blog deleted successfully.');
    }
}
