<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        
        $categories = ['Legal News', 'Business Law', 'Intellectual Property', 'Corporate Law'];
        
        $blogs = [
            [
                'title' => 'Understanding Business Registration in Indonesia',
                'content' => 'A comprehensive guide to registering your business in Indonesia, including requirements, procedures, and important considerations.',
                'category' => 'Business Law'
            ],
            [
                'title' => 'Protecting Your Intellectual Property Rights',
                'content' => 'Learn about the various ways to protect your intellectual property in Indonesia, from trademarks to patents.',
                'category' => 'Intellectual Property'
            ],
            [
                'title' => 'Corporate Compliance Updates 2025',
                'content' => 'Stay updated with the latest corporate compliance requirements and regulations in Indonesia.',
                'category' => 'Corporate Law'
            ],
            [
                'title' => 'New Legal Framework for Startups',
                'content' => 'Recent changes in Indonesian law affecting startup companies and what it means for entrepreneurs.',
                'category' => 'Legal News'
            ]
        ];

        foreach ($blogs as $blog) {
            Blog::create([
                'title' => $blog['title'],
                'content' => $blog['content'],
                'slug' => Str::slug($blog['title']),
                'category' => $blog['category'],
                'user_id' => $user->id
            ]);
        }
    }
}
