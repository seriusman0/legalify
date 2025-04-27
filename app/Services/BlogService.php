<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\BlogRequest;

class BlogService
{
    public function getAllBlogs(int $perPage = 10)
    {
        return Blog::with('user')->latest()->paginate($perPage);
    }

    public function getUserBlogs(int $userId, int $perPage = 10)
    {
        return Blog::where('user_id', $userId)->with('user')->latest()->paginate($perPage);
    }

    public function createBlog(BlogRequest $request)
    {
        try {
            // Start transaction
            \DB::beginTransaction();
            
            // Get validated data
            $data = $request->validated();
            
            Log::info('Starting blog creation process', [
                'user_id' => auth()->id(),
                'title' => $data['title']
            ]);
            
            // Generate slug from title
            $data['slug'] = $this->generateUniqueSlug($data['title']);
            
            // Set user_id
            $data['user_id'] = auth()->id();
            
            // Handle image upload if present
            if ($request->hasFile('image')) {
                Log::info('Processing blog image upload');
                try {
                    $path = $request->file('image')->store('blog-images', 'public');
                    if (!$path) {
                        throw new \Exception('Gagal mengunggah gambar');
                    }
                    $data['image'] = $path;
                    Log::info('Image uploaded successfully', ['path' => $path]);
                } catch (\Exception $e) {
                    Log::error('Image upload failed', [
                        'error' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine()
                    ]);
                    throw new \Exception('Gagal mengunggah gambar: ' . $e->getMessage());
                }
            }

            // Create blog post
            $blog = Blog::create($data);
            if (!$blog) {
                throw new \Exception('Gagal menyimpan blog ke database');
            }

            // Commit transaction
            \DB::commit();
            Log::info('Blog created successfully', ['blog_id' => $blog->id]);
            
            return $blog;
            
        } catch (\Exception $e) {
            // Rollback transaction
            \DB::rollBack();
            
            // Delete uploaded image if exists
            if (isset($data['image'])) {
                Storage::disk('public')->delete($data['image']);
                Log::info('Uploaded image deleted after failed blog creation', ['path' => $data['image']]);
            }
            
            Log::error('Blog creation failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            throw new \Exception('Gagal membuat blog: ' . $e->getMessage());
        }
    }

    public function updateBlog(Blog $blog, BlogRequest $request)
    {
        try {
            \DB::beginTransaction();
            
            $data = $request->validated();
            Log::info('Blog update started', ['blog_id' => $blog->id]);
            
            $data['slug'] = $this->generateUniqueSlug($data['title'], $blog->id);

            if ($request->hasFile('image')) {
                Log::info('Processing blog image update');
                try {
                    // Delete old image if exists
                    if ($blog->image) {
                        Storage::disk('public')->delete($blog->image);
                        Log::info('Old image deleted', ['path' => $blog->image]);
                    }
                    
                    // Upload new image
                    $path = $request->file('image')->store('blog-images', 'public');
                    if (!$path) {
                        throw new \Exception('Gagal mengunggah gambar baru');
                    }
                    $data['image'] = $path;
                    Log::info('New image uploaded successfully', ['path' => $path]);
                } catch (\Exception $e) {
                    Log::error('Image update failed', [
                        'error' => $e->getMessage(),
                        'file' => $e->getFile(),
                        'line' => $e->getLine()
                    ]);
                    throw new \Exception('Gagal memperbarui gambar: ' . $e->getMessage());
                }
            }

            $blog->update($data);
            
            \DB::commit();
            Log::info('Blog updated successfully', ['blog_id' => $blog->id]);
            
            return $blog;
            
        } catch (\Exception $e) {
            \DB::rollBack();
            
            Log::error('Blog update failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            throw new \Exception('Gagal memperbarui blog: ' . $e->getMessage());
        }
    }

    public function deleteBlog(Blog $blog)
    {
        try {
            \DB::beginTransaction();
            
            Log::info('Blog deletion started', ['blog_id' => $blog->id]);
            
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
                Log::info('Blog image deleted', ['path' => $blog->image]);
            }
            
            $blog->delete();
            
            \DB::commit();
            Log::info('Blog deleted successfully', ['blog_id' => $blog->id]);
            
            return true;
            
        } catch (\Exception $e) {
            \DB::rollBack();
            
            Log::error('Blog deletion failed', [
                'error' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);
            
            throw new \Exception('Gagal menghapus blog: ' . $e->getMessage());
        }
    }

    protected function generateUniqueSlug($title, $ignoreId = null)
    {
        $slug = Str::slug($title);
        $count = 1;

        while (true) {
            $query = Blog::where('slug', $slug);
            if ($ignoreId) {
                $query->where('id', '!=', $ignoreId);
            }
            
            if (!$query->exists()) {
                break;
            }

            $slug = Str::slug($title) . '-' . $count++;
        }

        return $slug;
    }
}
