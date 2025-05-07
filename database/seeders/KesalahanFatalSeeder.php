<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class KesalahanFatalSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $blog = [
            'title' => 'Awas! 7 Kesalahan Fatal Saat Mendirikan Badan Usaha (dan Cara Menghindarinya)',
            'content' => '
                <p>Memutuskan untuk melegalkan bisnismu dengan mendirikan badan usaha (seperti PT atau CV) adalah langkah besar...</p>
                <h3>Kesalahan Umum</h3>
                <ol>
                    <li>Salah Pilih Bentuk Badan Usaha: Langsung pilih PT padahal bisnis masih skala kecil...</li>
                    <li>Salah Pilih Kode KBLI: Asal pilih kode KBLI atau menyerahkan sepenuhnya ke jasa pendirian...</li>
                </ol>
                <h3>Kesimpulan:</h3>
                <p>Mendirikan badan usaha memang langkah penting, tapi jangan sampai terjebak kesalahan umum yang merugikan...</p>
                <p>Hindari Risiko dan Pastikan Proses Pendirian Badan Usahamu Lancar! Tim ahli hukum di Legalify.id siap mendampingimu!</p>
            ',
            'category' => 'Business Law',
            'created_at' => now(),
        ];

        Blog::create([
            'title' => $blog['title'],
            'content' => $blog['content'],
            'slug' => 'kesalahan-mendirikan-badan-usaha',
            'category' => $blog['category'],
            'user_id' => $user->id,
            'created_at' => $blog['created_at'],
        ]);
    }
}