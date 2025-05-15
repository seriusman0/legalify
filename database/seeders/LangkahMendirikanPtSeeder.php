<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;

class LangkahMendirikanPtSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $blog = [
            'title' => 'Langkah-langkah Mendirikan PT dari Nol',
            'content' => '
                <h2>Panduan lengkap & terbaru 2025 cara mendirikan PT di Indonesia</h2>
                <p>Pahami syarat, proses OSS, dokumen, biaya, dan waktu pendirian PT dari nol. Urus sendiri atau pakai jasa?</p>
                <p>Memilih Perseroan Terbatas (PT) sebagai badan usaha adalah langkah strategis bagi banyak pebisnis di Indonesia. Statusnya sebagai badan hukum memberikan perlindungan aset pribadi dan kredibilitas lebih tinggi. Namun, proses pendiriannya sering dianggap rumit dan memakan waktu, apalagi dengan adanya pembaruan peraturan.</p>
                <p>Jangan khawatir! Artikel ini akan memandu Anda melalui langkah-langkah mendirikan PT dari nol, sesuai dengan prosedur terbaru di tahun 2025, termasuk pemanfaatan sistem Online Single Submission (OSS).</p>

                <h3>Tahap Persiapan: Fondasi Sebelum Memulai</h3>
                <p>Sebelum masuk ke proses formal, pastikan Anda sudah menyiapkan beberapa hal penting ini:</p>
                <ol>
                    <li><strong>Nama PT:</strong> Siapkan minimal 3 pilihan nama PT. Nama harus terdiri dari minimal 3 suku kata Bahasa Indonesia, belum dipakai PT lain, dan tidak bertentangan dengan ketertiban umum/kesusilaan. Ketersediaan nama bisa dicek melalui sistem AHU Online (biasanya dibantu Notaris).</li>
                    <li><strong>Tempat Kedudukan & Alamat Lengkap PT:</strong> Tentukan lokasi kantor PT Anda. Pastikan alamat ini jelas, sesuai dengan zonasi peruntukan (misal, boleh untuk kantor/usaha), dan bukan alamat fiktif. Penggunaan Virtual Office kini dimungkinkan dengan syarat tertentu.</li>
                    <li><strong>Maksud dan Tujuan (Bidang Usaha):</strong> Tentukan jenis kegiatan usaha yang akan dijalankan PT Anda. Pilih Kode Baku Lapangan Usaha Indonesia (KBLI) yang paling sesuai.</li>
                    <li><strong>Struktur Permodalan:</strong>
                        <ul>
                            <li>Modal Dasar: Total nilai saham PT (berdasarkan kesepakatan pendiri sesuai UUCK, kecuali bidang usaha tertentu).</li>
                            <li>Modal Ditempatkan/Disetor: Minimal 25% dari Modal Dasar harus ditempatkan dan disetor penuh saat pendirian. Bukti setor mungkin diperlukan.</li>
                        </ul>
                    </li>
                    <li><strong>Susunan Pemegang Saham & Pengurus:</strong>
                        <ul>
                            <li>Pemegang Saham: Minimal 2 orang atau badan hukum. Siapkan data KTP/Paspor dan NPWP.</li>
                            <li>Pengurus: Minimal 1 orang Direktur dan 1 orang Dewan Komisaris. Siapkan data KTP/Paspor dan NPWP mereka.</li>
                        </ul>
                    </li>
                </ol>

                <h3>Langkah-langkah Formal Mendirikan PT</h3>
                <ol>
                    <li><strong>Pemesanan Nama PT:</strong> Notaris akan membantu melakukan pengecekan dan pemesanan nama PT pilihan Anda melalui sistem Administrasi Hukum Umum (AHU) Online di Kemenkumham.</li>
                    <li><strong>Pembuatan Akta Pendirian PT di Notaris:</strong> Pembuatan dan penandatanganan Akta Pendirian PT. Akta ini memuat semua detail yang sudah Anda siapkan.</li>
                    <li><strong>Pengesahan SK Menteri Hukum dan HAM (SK Kemenkumham):</strong> Notaris akan mengajukan permohonan pengesahan badan hukum PT Anda ke Kemenkumham.</li>
                    <li><strong>Pengurusan NPWP Badan Usaha PT:</strong> Pendaftaran NPWP dilakukan di Kantor Pelayanan Pajak (KPP) Pratama di wilayah alamat PT Anda terdaftar.</li>
                    <li><strong>Pendaftaran NIB via Sistem OSS (Online Single Submission):</strong> Daftarkan PT di sistem OSS (oss.go.id) untuk mendapatkan Nomor Induk Berusaha (NIB).</li>
                    <li><strong>Pengurusan Izin Usaha & Izin Komersial/Operasional (jika diperlukan):</strong> Berdasarkan tingkat risiko dari OSS-RBA.</li>
                </ol>

                <h3>Dokumen Final yang Akan Anda Dapatkan</h3>
                <ul>
                    <li>Salinan Akta Pendirian PT dari Notaris.</li>
                    <li>Surat Keputusan (SK) Pengesahan Badan Hukum dari Kemenkumham.</li>
                    <li>Nomor Pokok Wajib Pajak (NPWP) Badan Usaha PT.</li>
                    <li>Nomor Induk Berusaha (NIB).</li>
                    <li>Sertifikat Standar atau Izin Usaha lainnya yang relevan.</li>
                </ul>

                <h3>Estimasi Waktu dan Biaya Pendirian PT (Update 2025)</h3>
                <p>Proses pendirian PT dari awal hingga NIB terbit biasanya memakan waktu sekitar 2 hingga 4 minggu. Biaya pendirian PT sangat bervariasi, tergantung pada jasa Notaris, besaran modal dasar PT, kompleksitas Akta, dan bidang usaha.</p>

                <h3>Kenapa Sebaiknya Pakai Jasa Profesional?</h3>
                <p>Melihat langkah-langkah di atas, mungkin terasa sedikit melelahkan. Menggunakan jasa profesional seperti Legalify.id punya banyak keuntungan: Hemat Waktu & Tenaga, Hindari Kesalahan, Proses Lebih Cepat, Kepatuhan Terjamin.</p>

                <p>Siap Wujudkan PT Impian Anda di Tahun 2025? Dapatkan penawaran paket pendirian PT terbaik dari kami! Hubungi Kami Sekarang untuk Konsultasi!</p>
            ',
            'category' => 'Business Law',
            'created_at' => '2025-04-22 00:00:00'
        ];

        Blog::create([
            'title' => $blog['title'],
            'content' => $blog['content'],
            'slug' => 'langkah-mendirikan-pt-dari-nol',
            'category' => $blog['category'],
            'user_id' => $user->id,
            'created_at' => $blog['created_at']
        ]);
    }
}