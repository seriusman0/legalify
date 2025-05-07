<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminUser extends Command
{
    protected $signature = 'create:admin';
    protected $description = 'Create an admin user';

    public function handle()
    {
        $user = User::create([
            'name' => 'Admin User',
            'email' => 'admin@legalify.id',
            'password' => Hash::make('admin123')
        ]);

        $user->assignRole('admin');

        $this->info('Admin user created successfully');
    }
}
