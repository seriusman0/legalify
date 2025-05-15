<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ServiceCategory;

class ServiceCategorySeeder extends Seeder
{
    public function run()
    {
        function getOrCreateCategory($nama_kategori, $deskripsi_kategori) {
            return ServiceCategory::firstOrCreate(
                ['nama_kategori' => $nama_kategori],
                ['deskripsi_kategori' => $deskripsi_kategori]
            );
        }

        getOrCreateCategory('PT', 'Layanan pendirian Perseroan Terbatas (PT)');
        getOrCreateCategory('CV', 'Layanan pendirian Commanditaire Vennootschap (CV)');
        getOrCreateCategory('PT Perorangan', 'Layanan pendirian PT Perorangan');
        getOrCreateCategory('PT PMA', 'Layanan pendirian Perseroan Terbatas Penanaman Modal Asing (PT PMA)');
        getOrCreateCategory('Badan Lain', 'Layanan pendirian badan usaha lainnya');
        getOrCreateCategory('Izin Usaha dan Sertifikasi', 'Layanan perizinan usaha dan sertifikasi');
        getOrCreateCategory('Merek', 'Layanan pendaftaran dan pengelolaan merek');
        getOrCreateCategory('Perubahan dan Penutupan Badan Usaha', 'Layanan perubahan dan penutupan badan usaha');
        getOrCreateCategory('Legal Drafting', 'Layanan penyusunan dokumen hukum');
        getOrCreateCategory('Virtual Office', 'Layanan kantor virtual');
        getOrCreateCategory('Retainer Legal', 'Layanan retainer untuk jasa hukum');
        getOrCreateCategory('Perpajakan', 'Layanan konsultasi dan pengelolaan perpajakan');
    }
}