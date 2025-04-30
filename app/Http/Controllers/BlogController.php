<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Http\Resources\BlogResource;
use App\Services\BlogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
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
        try {
            $blogs = $this->blogService->getUserBlogs(auth()->id());
            return view('admin.blogs.index', compact('blogs'));
        } catch (\Exception $e) {
            Log::error('Failed to fetch user blogs', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage()
            ]);
            return back()->withErrors(['error' => 'Gagal memuat daftar blog.']);
        }
    }

    public function blog()
    {
        try {
            $blogs = $this->blogService->getAllBlogs();
            return view('blog', compact('blogs'));
        } catch (\Exception $e) {
            Log::error('Failed to fetch all blogs', [
                'error' => $e->getMessage()
            ]);
            return back()->withErrors(['error' => 'Gagal memuat daftar blog.']);
        }
    }

    public function show(Blog $blog)
    {
        try {
            return view('blog.show', compact('blog'));
        } catch (\Exception $e) {
            Log::error('Failed to show blog', [
                'blog_id' => $blog->id,
                'error' => $e->getMessage()
            ]);
            return back()->withErrors(['error' => 'Gagal menampilkan blog.']);
        }
    }

    public function create()
    {
        try {
            Log::info('Attempting to load blog creation form', [
                'user_id' => auth()->id(),
                'user_roles' => auth()->user()->getRoleNames()->toArray()
            ]);

            $view = view('admin.blogs.create');
            
            Log::info('Blog creation form loaded successfully');
            
            return $view;
        } catch (\Exception $e) {
            Log::error('Failed to load blog creation form', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return back()->withErrors(['error' => 'Gagal memuat halaman pembuatan blog.']);
        }
    }

    public function store(BlogRequest $request)
    {
        try {
           
            // Log the incoming request data
            Log::info('Blog creation attempt', [
                'user_id' => auth()->id(),
                'request_data' => $request->except(['_token'])
            ]);
            
            // Get validated data
            $validatedData = $request->validated();

            

            // Check if content is empty after stripping tags
            if (empty(trim(strip_tags($validatedData['content'])))) {
                return back()
                    ->withInput()
                    ->withErrors(['content' => 'Konten blog wajib diisi']);
            }

            $blog = $this->blogService->createBlog($request);
            
            Log::info('Blog created successfully', [
                'blog_id' => $blog->id,
                'user_id' => auth()->id()
            ]);
            
            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog berhasil dibuat.');
                
        } catch (\Exception $e) {
            Log::error('Blog creation failed in controller', [
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit(Blog $blog)
    {
        try {
            $this->authorize('update', $blog);
            return view('admin.blogs.edit', compact('blog'));
        } catch (\Exception $e) {
            Log::error('Failed to load blog edit form', [
                'blog_id' => $blog->id,
                'error' => $e->getMessage()
            ]);
            return back()->withErrors(['error' => 'Gagal memuat halaman edit blog.']);
        }
    }

    public function update(BlogRequest $request, Blog $blog)
    {
        try {
            $this->authorize('update', $blog);
            
            // Get validated data
            $validatedData = $request->validated();

            // Check if content is empty after stripping tags
            if (empty(trim(strip_tags($validatedData['content'])))) {
                return back()
                    ->withInput()
                    ->withErrors(['content' => 'Konten blog wajib diisi']);
            }

            $this->blogService->updateBlog($blog, $request);
            
            Log::info('Blog updated successfully', [
                'blog_id' => $blog->id,
                'user_id' => auth()->id()
            ]);
            
            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog berhasil diperbarui.');
                
        } catch (\Exception $e) {
            Log::error('Blog update failed in controller', [
                'blog_id' => $blog->id,
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()
                ->withInput()
                ->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Blog $blog)
    {
        try {
            $this->authorize('delete', $blog);
            $this->blogService->deleteBlog($blog);
            
            Log::info('Blog deleted successfully', [
                'blog_id' => $blog->id,
                'user_id' => auth()->id()
            ]);
            
            return redirect()
                ->route('admin.blogs.index')
                ->with('success', 'Blog berhasil dihapus.');
                
        } catch (\Exception $e) {
            Log::error('Blog deletion failed in controller', [
                'blog_id' => $blog->id,
                'user_id' => auth()->id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
