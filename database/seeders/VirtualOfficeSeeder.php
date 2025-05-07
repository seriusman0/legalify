<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class VirtualOfficeSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $blog = [
            'title' => 'Pakai Virtual Office untuk Domisili PT? Cek Dulu Aturan Mainnya!',
            'content' => '
                <p>Zaman sekarang, bisnis makin fleksibel. Banyak pengusaha, terutama startup dan UMK, melirik Virtual Office (VO) sebagai solusi alamat domisili PT. Alasannya jelas: hemat biaya sewa kantor fisik yang mahal, bisa dapat alamat prestisius, dan operasional lebih efisien.</p>
                <h3>Legalitas Virtual Office untuk PT</h3>
                <p>Kabar baiknya, pada umumnya penggunaan Virtual Office untuk alamat PT diperbolehkan secara hukum di Indonesia...</p>
                <h3>TAPI, Ada Syarat dan Ketentuan Berlaku!</h3>
                <ol>
                    <li>Zonasi Lokasi VO: Pastikan gedung tempat VO berada memiliki zonasi yang sesuai untuk kegiatan perkantoran/komersial...</li>
                    <li>Izin Penyedia VO: Pastikan perusahaan penyedia VO yang kamu pilih itu legal...</li>
                </ol>
                <h3>Keuntungan Menggunakan Virtual Office:</h3>
                <ul>
                    <li>Hemat Biaya: Jauh lebih murah dibanding sewa kantor fisik.</li>
                    <li>Alamat Strategis: Bisa dapat alamat kantor di lokasi premium tanpa biaya mahal.</li>
                </ul>
                <h3>Kesimpulan:</h3>
                <p>Menggunakan Virtual Office untuk alamat PT bisa jadi solusi cerdas...</p>
                <p>Butuh bantuan memilih Virtual Office yang tepat atau memastikan legalitasnya untuk PT kamu? Tim Legalify.id siap membantu!</p>
            ',
            'category' => 'Business Law',
            'created_at' => now(),
        ];

        Blog::create([
            'title' => $blog['title'],
            'content' => $blog['content'],
            'slug' => 'virtual-office-untuk-pt',
            'category' => $blog['category'],
            'user_id' => $user->id,
            'created_at' => $blog['created_at'],
        ]);
    }
}