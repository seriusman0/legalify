<?php

namespace App\Services;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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
        $data = $request->validated();
        
        // Generate slug from title
        $data['slug'] = Str::slug($data['title']);
        
        // Set user_id
        $data['user_id'] = auth()->id();
        
        // Handle image upload
        if ($request->hasFile('image')) {
            try {
                $path = $request->file('image')->store('blog-images', 'public');
                if (!$path) {
                    throw new \Exception('Failed to upload image');
                }
                $data['image'] = $path;
            } catch (\Exception $e) {
                \Log::error('Image upload failed: ' . $e->getMessage());
                throw new \Exception('Failed to upload image: ' . $e->getMessage());
            }
        }

        // Create blog post
        try {
            $blog = Blog::create($data);
            if (!$blog) {
                throw new \Exception('Failed to create blog post');
            }
            return $blog;
        } catch (\Exception $e) {
            // If blog creation fails and image was uploaded, delete it
            if (isset($data['image'])) {
                Storage::disk('public')->delete($data['image']);
            }
            \Log::error('Blog creation failed: ' . $e->getMessage());
            throw new \Exception('Failed to create blog post: ' . $e->getMessage());
        }
    }

    public function updateBlog(Blog $blog, BlogRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = Str::slug($data['title']);

        if ($request->hasFile('image')) {
            try {
                // Delete old image if exists
                if ($blog->image) {
                    Storage::disk('public')->delete($blog->image);
                }
                
                // Upload new image
                $path = $request->file('image')->store('blog-images', 'public');
                if (!$path) {
                    throw new \Exception('Failed to upload new image');
                }
                $data['image'] = $path;
            } catch (\Exception $e) {
                \Log::error('Image update failed: ' . $e->getMessage());
                throw new \Exception('Failed to update image: ' . $e->getMessage());
            }
        }

        try {
            $blog->update($data);
            return $blog;
        } catch (\Exception $e) {
            \Log::error('Blog update failed: ' . $e->getMessage());
            throw new \Exception('Failed to update blog post: ' . $e->getMessage());
        }
    }

    public function deleteBlog(Blog $blog)
    {
        try {
            if ($blog->image) {
                Storage::disk('public')->delete($blog->image);
            }
            return $blog->delete();
        } catch (\Exception $e) {
            \Log::error('Blog deletion failed: ' . $e->getMessage());
            throw new \Exception('Failed to delete blog post: ' . $e->getMessage());
        }
    }
}
