<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class BlogController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    protected $blogService;

    public function __construct(BlogService $blogService)
    {
        $this->blogService = $blogService;
        $this->middleware('auth')->except(['blog', 'show']);
    }

    public function index()
    {
        $blogs = $this->blogService->getUserBlogs(auth()->id());
        return view('admin.blogs.index', compact('blogs'));
    }

    public function blog()
    {
        $blogs = $this->blogService->getAllBlogs();
        return view('blog', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('blog.show', compact('blog'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(BlogRequest $request)
    {
        try {
            $blog = $this->blogService->createBlog($request);
            
            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog berhasil dibuat.');
        } catch (\Exception $e) {
            \Log::error('Blog creation failed: ' . $e->getMessage());
            
            return back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan saat membuat blog: ' . $e->getMessage()]);
        }
    }

    public function edit(Blog $blog)
    {
        $this->authorize('update', $blog);
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            $this->authorize('update', $blog);
            $this->blogService->updateBlog($blog, $request);
            
            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog berhasil diperbarui.');
        } catch (\Exception $e) {
            \Log::error('Blog update failed: ' . $e->getMessage());
            
            return back()
                ->withInput()
                ->withErrors(['error' => 'Terjadi kesalahan saat memperbarui blog: ' . $e->getMessage()]);
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            $this->authorize('delete', $blog);
            $this->blogService->deleteBlog($blog);
            
            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog berhasil dihapus.');
        } catch (\Exception $e) {
            \Log::error('Blog deletion failed: ' . $e->getMessage());
            
            return back()
                ->withErrors(['error' => 'Terjadi kesalahan saat menghapus blog: ' . $e->getMessage()]);
        }
    }
}
