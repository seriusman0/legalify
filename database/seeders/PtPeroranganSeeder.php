<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class PtPeroranganSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $blog = [
            'title' => 'Mau Bisnis Legal, Aman, tapi Modal Minim? Kenalan Sama PT Perorangan!',
            'content' => '
                <p>Buat kamu para solopreneur, pemilik Usaha Mikro dan Kecil (UMK), atau freelancer yang menjalankan bisnis sendirian, ada kabar baik...</p>
                <h3>Apa Itu PT Perorangan?</h3>
                <ol>
                    <li>Didirikan oleh 1 Orang: Cukup kamu sendiri sebagai pendiri sekaligus pemilik/direktur...</li>
                    <li>Khusus untuk Skala UMK: Hanya bisa didirikan oleh bisnis yang memenuhi kriteria Usaha Mikro dan Kecil...</li>
                </ol>
                <h3>Keuntungan Memilih PT Perorangan</h3>
                <ul>
                    <li>Perlindungan Aset Pribadi: Tidur lebih nyenyak karena harta pribadimu aman dari risiko bisnis...</li>
                    <li>Pendirian Cepat, Mudah, Murah: Prosesnya online, biayanya sangat terjangkau...</li>
                </ul>
                <h3>Yang Perlu Diingat Juga:</h3>
                <p>Wajib Lapor: Tetap ada kewajiban laporan keuangan (meskipun sederhana) dan laporan pajak tahunan...</p>
                <p>PT Perorangan adalah jawaban bagi kamu, pengusaha UMK dan solopreneur...</p>
            ',
            'category' => 'Business Law',
            'created_at' => now(),
        ];

        Blog::create([
            'title' => $blog['title'],
            'content' => $blog['content'],
            'slug' => 'pt-perorangan-solusi-umk',
            'category' => $blog['category'],
            'user_id' => $user->id,
            'created_at' => $blog['created_at'],
        ]);
    }
}