<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@legalify.com',
            'password' => Hash::make('password123')
        ]);
        $admin->assignRole('admin');

        // Create editor user
        $editor = User::create([
            'name' => 'Editor User',
            'email' => 'editor@legalify.com',
            'password' => Hash::make('password123')
        ]);
        $editor->assignRole('editor');

        // Create author user
        $author = User::create([
            'name' => 'Author User',
            'email' => 'author@legalify.com',
            'password' => Hash::make('password123')
        ]);
        $author->assignRole('author');
    }
}
