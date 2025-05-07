<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PtCvBlogSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        $blog = [
            'title' => 'PT atau CV? Ini Panduan Memilih Badan Usaha yang Cocok Buat Kamu',
            'content' => '
                <p>Bingung pilih PT atau CV untuk bisnismu? Pahami perbedaan kunci soal modal, tanggung jawab, pajak, & proses pendirian di panduan lengkap ini. Cocok untuk pengusaha Indonesia!</p>
                <h2>Selamat! Kamu sudah selangkah lebih dekat untuk mewujudkan mimpi bisnismu.</h2>
                <p>Tapi tunggu dulu, sebelum melangkah lebih jauh, ada satu keputusan fundamental yang harus diambil: memilih badan usaha yang tepat. Di Indonesia, dua pilihan paling populer untuk memulai adalah <strong>Perseroan Terbatas (PT)</strong> dan <strong>Persekutuan Komanditer (CV)</strong>. Banyak calon pengusaha bingung, "Lebih baik pilih PT atau CV ya?"</p>
                <p>Keduanya punya kelebihan dan kekurangan masing-masing. Memilih yang salah bisa berakibat pada masalah hukum, pajak, hingga tanggung jawab pribadi di kemudian hari. Jangan khawatir! Artikel ini akan membantumu memahami perbedaan utama antara PT dan CV agar kamu bisa membuat keputusan yang paling pas untuk kondisi dan rencana bisnismu.</p>
                <h3>Kenalan Singkat: Apa Itu PT dan CV?</h3>
                <ul>
                    <li><strong>Perseroan Terbatas (PT):</strong> Ini adalah badan hukum. Artinya, PT dianggap sebagai "pribadi" tersendiri yang terpisah dari pemiliknya (pemegang saham). Hartanya terpisah dari harta pribadi pemilik. Tanggung jawab pemilik terbatas hanya sebesar modal saham yang disetorkan. Strukturnya lebih formal dengan adanya Rapat Umum Pemegang Saham (RUPS), Direksi, dan Dewan Komisaris.</li>
                    <li><strong>Persekutuan Komanditer (CV):</strong> Ini adalah badan usaha, tapi bukan badan hukum. CV merupakan persekutuan antara satu atau lebih Sekutu Aktif (Komplementer) yang menjalankan usaha dan bertanggung jawab penuh (sampai harta pribadi), dengan satu atau lebih Sekutu Pasif (Komanditer) yang hanya menyetor modal dan tanggung jawabnya terbatas pada modal tersebut. Strukturnya lebih sederhana dibanding PT.</li>
                </ul>
                <h3>Perbedaan Kunci PT vs CV: Mana yang Lebih Pas?</h3>
                <p>Nah, sekarang bagian pentingnya. Apa saja perbedaan mendasar yang perlu kamu pertimbangkan?</p>
                <ol>
                    <li>
                        <strong>Status Hukum & Tanggung Jawab</strong>
                        <ul>
                            <li><strong>PT:</strong> Badan hukum. Ada pemisahan jelas antara aset perusahaan dan aset pribadi pemilik/pemegang saham. Jika PT rugi atau punya utang, harta pribadimu aman, tanggung jawabmu hanya sebatas modal saham.</li>
                            <li><strong>CV:</strong> Bukan badan hukum. Tidak ada pemisahan tegas antara harta CV dengan harta pribadi Sekutu Aktif. Jika CV punya utang dan aset CV tidak cukup, harta pribadi Sekutu Aktif bisa ikut digunakan untuk melunasi. Sekutu Pasif tanggung jawabnya terbatas modal saja.</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Modal Pendirian</strong>
                        <ul>
                            <li><strong>PT:</strong> Dulu ada aturan modal minimum yang cukup besar. Namun, dengan adanya UU Cipta Kerja (UUCK) dan peraturan turunannya, ketentuan modal dasar PT diserahkan pada kesepakatan pendiri, kecuali untuk bidang usaha tertentu. Modal disetor minimal 25% dari modal dasar.</li>
                            <li><strong>CV:</strong> Tidak ada ketentuan modal minimum dalam Undang-Undang. Lebih fleksibel untuk kamu yang memulai dengan modal terbatas.</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Struktur Kepemilikan & Pengelolaan</strong>
                        <ul>
                            <li><strong>PT:</strong> Minimal didirikan oleh 2 orang atau badan hukum. Pengelolaan lebih terstruktur dengan RUPS sebagai pemegang kekuasaan tertinggi, Direksi yang menjalankan operasional, dan Komisaris yang mengawasi. Cocok untuk kepemilikan yang kompleks atau rencana jangka panjang melibatkan banyak pihak.</li>
                            <li><strong>CV:</strong> Minimal didirikan oleh 2 orang (1 Sekutu Aktif, 1 Sekutu Pasif). Pengelolaan lebih fleksibel dan sederhana, biasanya dipegang penuh oleh Sekutu Aktif.</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Kegiatan Usaha</strong>
                        <ul>
                            <li><strong>PT:</strong> Bisa menjalankan hampir semua jenis kegiatan usaha, termasuk bidang-bidang yang memerlukan izin khusus atau skala besar. Banyak tender pemerintah atau proyek swasta besar mensyaratkan pelaksananya berbentuk PT.</li>
                            <li><strong>CV:</strong> Lingkup usahanya bisa jadi lebih terbatas. Beberapa bidang usaha atau tender besar mungkin tidak bisa diikuti oleh CV.</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Perpajakan</strong>
                        <ul>
                            <li><strong>PT:</strong> Merupakan subjek pajak badan tersendiri. PT membayar PPh Badan atas laba perusahaan. Ketika laba dibagikan ke pemegang saham (dividen), akan dikenakan PPh Dividen lagi.</li>
                            <li><strong>CV:</strong> Umumnya bukan subjek PPh Badan. Penghasilan CV akan dihitung sebagai penghasilan bagi para sekutunya dan dikenakan PPh sesuai tarif pajak pribadi masing-masing sekutu. Namun, aturan pajak bisa kompleks dan berubah. Penting: Aspek pajak ini sebaiknya dikonsultasikan lebih lanjut dengan konsultan pajak atau ahli hukum, karena bisa berpengaruh signifikan pada profitabilitas.</li>
                        </ul>
                    </li>
                    <li>
                        <strong>Proses & Biaya Pendirian</strong>
                        <ul>
                            <li><strong>PT:</strong> Prosesnya cenderung lebih kompleks dan memakan waktu lebih lama (Akta Notaris, pengesahan SK Kemenkumham, pendaftaran NIB di OSS). Biayanya umumnya lebih tinggi dibanding CV.</li>
                            <li><strong>CV:</strong> Prosesnya relatif lebih sederhana dan cepat (Akta Notaris, pendaftaran di Kemenkumham via sistem Notaris, pendaftaran NIB di OSS). Biayanya biasanya lebih rendah.</li>
                        </ul>
                    </li>
                </ol>
                <h3>Jadi, Pilih yang Mana? Ringkasan Cepat</h3>
                <ul>
                    <li><strong>Pilih PT</strong> jika kamu:
                        <ul>
                            <li>Ingin perlindungan aset pribadi (tanggung jawab terbatas)</li>
                            <li>Berencana bisnis skala besar, mencari investor, atau ikut tender/proyek yang syaratnya PT</li>
                            <li>Membutuhkan struktur kepemilikan dan manajemen yang jelas dan formal</li>
                            <li>Bergerak di bidang usaha yang diwajibkan berbentuk PT</li>
                        </ul>
                    </li>
                    <li><strong>Pilih CV</strong> jika kamu:
                        <ul>
                            <li>Modal awal terbatas</li>
                            <li>Menginginkan struktur yang lebih sederhana dan fleksibel</li>
                            <li>Risiko bisnis relatif rendah atau kamu (sebagai Sekutu Aktif) siap dengan tanggung jawab tidak terbatas</li>
                            <li>Bidang usahamu tidak mensyaratkan bentuk PT</li>
                        </ul>
                    </li>
                </ul>
                <h4>Masih Ragu? Jangan Ambil Risiko!</h4>
                <p>Memilih antara PT dan CV adalah keputusan penting dengan implikasi jangka panjang. Informasi di atas adalah panduan umum. Kebutuhan setiap bisnis itu unik, dan peraturan bisa saja diperbarui. Kesalahan memilih badan usaha bisa membuatmu rugi waktu, biaya, bahkan menghadapi masalah hukum di kemudian hari. Jangan biarkan kebingungan menghambat langkah bisnismu. Tim ahli hukum di Legalify.id siap membantu menganalisis kebutuhan spesifikmu dan memberikan rekomendasi badan usaha yang paling tepat. Kami juga siap mendampingi seluruh proses pendiriannya, biar kamu bisa fokus mengembangkan bisnismu. <strong>Konsultasikan Sekarang GRATIS!</strong></p>
            ',
            'category' => 'Business Law',
            'created_at' => '2025-04-22 00:00:00'
        ];

        Blog::create([
            'title' => $blog['title'],
            'content' => $blog['content'],
            'slug' => 'pilih-pt-atau-cv-badan-usaha',
            'category' => $blog['category'],
            'user_id' => $user->id,
            'created_at' => $blog['created_at']
        ]);
    }
}