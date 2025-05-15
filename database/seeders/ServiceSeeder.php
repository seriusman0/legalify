<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\ServiceCategory;

class ServiceSeeder extends Seeder
{
    public function run()
    {

        $ptCategory = ServiceCategory::where('nama_kategori', 'PT')->first();
        $cvCategory = ServiceCategory::where('nama_kategori', 'CV')->first();
        $ptPeroranganCategory = ServiceCategory::where('nama_kategori', 'PT Perorangan')->first();
        $ptPmaCategory = ServiceCategory::where('nama_kategori', 'PT PMA')->first();
        $legalDraftingCategory = ServiceCategory::where('nama_kategori', 'Legal Drafting')->first();
        $virtualOfficeCategory = ServiceCategory::where('nama_kategori', 'Virtual Office')->first();
        $perpajakanCategory = ServiceCategory::where('nama_kategori', 'Perpajakan')->first();

        Service::create([
            'nama_service' => 'Paket Pendirian PT Standard',
            'deskripsi' => 'Cek Nama, Pemesanan Nama, Akta Notaris, SK Kemenkumham, NPWP, NIB',
            'id_kategori' => $ptCategory->id_kategori,
            'harga' => 4500000,
            'bonus' => 'Logo, Template Kop Surat + Stempel',
            'durasi' => '14 hari kerja',
            'status' => 'aktif',
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now()
        ]);

        Service::create([
            'nama_service' => 'Paket Pendirian CV Basic',
            'deskripsi' => 'Cek Nama, Pemesanan Nama, Akta Notaris, SK Kemenkumham, NPWP, NIB',
            'id_kategori' => $cvCategory->id_kategori,
            'harga' => 4500000,
            'bonus' => 'Template Kop Surat + Stempel',
            'durasi' => '10 hari kerja',
            'status' => 'aktif',
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now()
        ]);

        Service::create([
            'nama_service' => 'Paket Pendirian PT Perorangan',
            'deskripsi' => 'Surat Pernyataan, SK Kemenkumham, NPWP, NIB',
            'id_kategori' => $ptPeroranganCategory->id_kategori,
            'harga' => 1500000,
            'bonus' => 'Logo, Template Kop Surat + Stempel',
            'durasi' => '7 hari kerja',
            'status' => 'aktif',
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now()
        ]);

        Service::create([
            'nama_service' => 'Paket Pendirian PT PMA Standard',
            'deskripsi' => 'Cek Nama, Pemesanan Nama, Akta Notaris, SK Kemenkumham, NPWP, NIB',
            'id_kategori' => $ptPmaCategory->id_kategori,
            'harga' => 8000000,
            'bonus' => 'Logo, Template Kop Surat + Stempel',
            'durasi' => '21 hari kerja',
            'status' => 'aktif',
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now()
        ]);

        Service::create([
            'nama_service' => 'Perjanjian Kerja (PKWT/PKWTT)',
            'deskripsi' => 'Dokumen perjanjian kerja untuk karyawan tetap atau kontrak sesuai UU Ketenagakerjaan',
            'id_kategori' => $legalDraftingCategory->id_kategori,
            'harga' => 300000,
            'bonus' => 'Termasuk 1 kali revisi dokumen',
            'durasi' => '3 hari kerja',
            'status' => 'aktif',
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now()
        ]);

        Service::create([
            'nama_service' => 'Paket Small Virtual Office',
            'deskripsi' => 'Meeting room 60 jam/tahun, Podcast & Live Streaming',
            'id_kategori' => $virtualOfficeCategory->id_kategori,
            'harga' => 2300000,
            'bonus' => null,
            'durasi' => '1 tahun',
            'status' => 'aktif',
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now()
        ]);

        Service::create([
            'nama_service' => 'Pengajuan NPWP',
            'deskripsi' => 'Pengajuan NPWP ke kantor pajak dan aktivasi setelah pengajuan',
            'id_kategori' => $perpajakanCategory->id_kategori,
            'harga' => 500000,
            'bonus' => null,
            'durasi' => '5 hari kerja',
            'status' => 'aktif',
            'tanggal_dibuat' => now(),
            'tanggal_diperbarui' => now()
        ]);
    }
}