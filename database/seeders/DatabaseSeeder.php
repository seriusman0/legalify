<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            RoleAndPermissionsSeeder::class,
            UserSeeder::class,
            PtCvBlogSeeder::class,
            LangkahMendirikanPtSeeder::class,
            VirtualOfficeSeeder::class,
            KesalahanFatalSeeder::class,
            PtPeroranganSeeder::class
        ]);
    }
}
