<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin\Materi_admin;

class Materi extends Seeder
{
    public function run(): void
    {
        $materiData = [
            [
                'judul' => 'Pengenalan Bahasa Isyarat',
                'isi' => "Bahasa isyarat adalah bahasa visual-manual yang digunakan oleh komunitas Tuli sebagai cara utama komunikasi. Berbeda dengan bahasa lisan yang mengandalkan suara, bahasa isyarat menggunakan gerakan tangan, ekspresi wajah, dan posisi tubuh untuk menyampaikan makna.\n\nSejarah bahasa isyarat sangat kaya dan bervariasi di seluruh dunia. Setiap negara atau wilayah seringkali memiliki bahasa isyaratnya sendiri, seperti American Sign Language (ASL), British Sign Language (BSL), dan Bahasa Isyarat Indonesia (BISINDO) atau Sistem Isyarat Bahasa Indonesia (SIBI). Perkembangan bahasa isyarat seringkali dimulai di sekolah-sekolah untuk anak Tuli atau melalui komunitas Tuli itu sendiri.\n\nPentingnya mempelajari bahasa isyarat tidak hanya terbatas pada komunikasi dengan individu Tuli, tetapi juga untuk mempromosikan inklusi dan kesadaran akan budaya Tuli. Dengan menguasai bahasa isyarat, kita dapat menjembatani kesenjangan komunikasi dan membangun masyarakat yang lebih ramah bagi semua.\n\nBahasa isyarat bukan sekadar kumpulan gerakan acak; ia memiliki tata bahasa, sintaksis, dan kosa kata yang kompleks, sama seperti bahasa lisan. Memahami struktur ini adalah kunci untuk menguasai bahasa isyarat dengan benar.\n\nMateri ini akan menjadi fondasi awal Anda dalam memahami dunia bahasa isyarat. Kami akan membahas konsep-konsep dasar yang esensial sebelum Anda mendalami lebih jauh ke dalam isyarat-isyarat spesifik.",
                'gambar' => 'materials/1.jpg',
            ],
            [
                'judul' => 'Abjad Manual Bahasa Isyarat (ASL/SIBI)',
                'isi' => "Abjad manual atau fingerepelling adalah sistem di mana setiap huruf dari alfabet lisan direpresentasikan oleh bentuk tangan tertentu. Ini adalah salah satu keterampilan dasar pertama yang dipelajari dalam bahasa isyarat dan sangat penting untuk mengeja nama, tempat, atau kata-kata yang tidak memiliki isyarat khusus.\n\nDalam Bahasa Isyarat Indonesia, ada dua sistem abjad manual yang umum digunakan: SIBI (Sistem Isyarat Bahasa Indonesia) dan BISINDO (Bahasa Isyarat Indonesia). SIBI lebih dekat dengan ASL dan sering diajarkan di sekolah formal, sementara BISINDO berkembang secara alami di komunitas Tuli dan memiliki perbedaan signifikan.\n\nMempelajari abjad manual memerlukan latihan konsisten untuk mencapai kecepatan dan kejelasan. Penting untuk memastikan gerakan tangan Anda jelas dan tidak terburu-buru agar mudah dipahami oleh lawan bicara.\n\nSelain bentuk tangan, ekspresi wajah dan posisi tubuh juga dapat memengaruhi makna saat mengeja. Misalnya, jika Anda mengeja nama sambil mengerutkan kening, itu bisa memberi kesan bahwa Anda sedang bingung atau mencari kata yang tepat.\n\nPraktikkan abjad manual setiap hari, mulailah dengan mengeja nama Anda sendiri, nama teman, atau objek di sekitar Anda. Konsistensi adalah kunci untuk menguasai keterampilan fundamental ini.",
                'gambar' => '2.jpg',
            ],
            [
                'judul' => 'Angka dalam Bahasa Isyarat',
                'isi' => "Sama seperti abjad, angka juga memiliki isyarat khusus dalam bahasa isyarat. Isyarat angka adalah salah satu elemen fundamental yang memungkinkan komunikasi tentang kuantitas, waktu, dan informasi numerik lainnya.\n\nSetiap angka dari 0 hingga 10 memiliki isyarat yang unik dan merupakan dasar untuk membentuk angka-angka yang lebih besar. Beberapa bahasa isyarat mungkin memiliki sedikit variasi dalam cara menampilkan angka, jadi penting untuk fokus pada sistem yang Anda pelajari (misalnya SIBI atau BISINDO).\n\nUntuk angka yang lebih besar dari 10, biasanya isyarat dibentuk dengan kombinasi dari isyarat angka dasar. Misalnya, untuk angka 12, Anda mungkin akan membuat isyarat untuk '1' diikuti dengan isyarat untuk '2', tergantung pada aturan tata bahasa isyarat yang berlaku.\n\nPraktikkan isyarat angka dalam berbagai konteks, seperti menyebutkan usia, jumlah benda, atau waktu. Ini akan membantu Anda menginternalisasi gerakan dan membuatnya terasa lebih alami.\n\nKejelasan dalam membentuk isyarat angka sangat penting untuk menghindari kesalahpahaman. Pastikan tangan Anda berada dalam posisi yang tepat dan gerakan dilakukan dengan presisi.",
                'gambar' => '3.jpg',
            ],
            [
                'judul' => 'Kata Sapaan dan Salam',
                'isi' => "Memulai percakapan dengan sapaan yang tepat adalah kunci dalam setiap bahasa, termasuk bahasa isyarat. Kata sapaan dan salam adalah pintu gerbang untuk membangun koneksi dan menunjukkan rasa hormat.\n\nIsyarat dasar seperti 'Halo', 'Selamat Pagi', 'Terima Kasih', dan 'Maaf' adalah bagian penting dari etika komunikasi. Menguasai isyarat-isyarat ini akan membantu Anda berinteraksi dengan komunitas Tuli secara lebih percaya diri.\n\nEkspresi wajah memainkan peran yang sangat signifikan dalam menyampaikan nuansa dan emosi dari sapaan. Misalnya, senyuman saat mengucapkan 'Halo' akan memberikan kesan ramah dan hangat.\n\nPenting juga untuk memahami perbedaan budaya dalam sapaan. Meskipun isyaratnya sama, cara dan konteks penggunaannya bisa bervariasi antara satu komunitas Tuli dengan yang lain.\n\nLatihlah sapaan ini dalam skenario sehari-hari. Bayangkan Anda bertemu seseorang dan bagaimana Anda akan menyapa mereka menggunakan bahasa isyarat. Semakin sering berlatih, semakin fasih Anda akan menjadi.",
                'gambar' => '4.jpg',
            ],
            [
                'judul' => 'Isyarat Keluarga',
                'isi' => "Materi ini akan membahas isyarat-isyarat yang berhubungan dengan anggota keluarga. Memahami isyarat ini sangat berguna untuk memperkenalkan diri dan berbicara tentang hubungan personal.\n\nIsyarat untuk 'Ayah', 'Ibu', 'Saudara laki-laki', 'Saudara perempuan', 'Anak', dan 'Nenek/Kakek' seringkali memiliki karakteristik yang menggambarkan peran atau usia. Misalnya, isyarat untuk 'Ayah' mungkin melibatkan sentuhan di dagu, yang secara historis dikaitkan dengan janggut.\n\nPenting untuk memahami bahwa beberapa isyarat keluarga mungkin memiliki variasi regional atau budaya. Selalu perhatikan dialek isyarat yang umum di komunitas tempat Anda belajar.\n\nSaat memperkenalkan anggota keluarga, Anda dapat menggabungkan isyarat keluarga dengan abjad manual untuk mengeja nama mereka. Ini membantu dalam memberikan informasi yang lengkap dan spesifik.\n\nPraktekkan dengan memperkenalkan keluarga Anda dalam bahasa isyarat, bahkan jika hanya kepada diri sendiri di depan cermin. Ini akan memperkuat ingatan otot dan pemahaman Anda tentang isyarat-isyarat ini.",
                'gambar' => '5.jpg',
            ],
            [
                'judul' => 'Makanan dan Minuman',
                'isi' => "Topik makanan dan minuman adalah bagian integral dari percakapan sehari-hari. Materi ini akan mengajarkan isyarat untuk berbagai jenis makanan dan minuman yang sering kita konsumsi.\n\nIsyarat untuk 'Makan', 'Minum', 'Air', 'Roti', 'Nasi', dan 'Kopi' seringkali bersifat deskriptif atau menggambarkan tindakan memakan/meminumnya. Misalnya, isyarat 'minum' mungkin menyerupai gerakan memegang gelas ke mulut.\n\nMempelajari isyarat makanan dan minuman akan sangat membantu saat Anda berada di situasi sosial, seperti memesan makanan di restoran atau bertanya tentang preferensi seseorang.\n\nBeberapa isyarat makanan mungkin bervariasi berdasarkan kebiasaan makan lokal. Jika Anda berada di daerah tertentu, ada baiknya untuk mengamati isyarat yang digunakan secara umum di sana.\n\nCoba latih isyarat ini saat Anda sedang makan atau minum, atau saat berbelanja bahan makanan. Dengan mengaitkan isyarat dengan objek nyata, Anda akan lebih mudah mengingatnya.",
                'gambar' => '6.jpg',
            ],
            [
                'judul' => 'Profesi dan Pekerjaan',
                'isi' => "Materi ini berfokus pada isyarat yang berkaitan dengan berbagai jenis profesi dan pekerjaan. Ini adalah topik yang relevan untuk memperkenalkan diri, bertanya tentang pekerjaan orang lain, atau berdiskusi tentang karier.\n\nIsyarat untuk 'Dokter', 'Guru', 'Polisi', 'Pelajar', atau 'Koki' seringkali menggambarkan alat, seragam, atau tindakan khas yang dilakukan dalam pekerjaan tersebut. Misalnya, isyarat 'dokter' mungkin melibatkan gerakan seperti memeriksa denyut nadi.\n\nMemahami isyarat profesi juga penting untuk berkomunikasi dalam lingkungan kerja atau saat berpartisipasi dalam diskusi tentang kehidupan profesional.\n\nSama seperti kategori isyarat lainnya, variasi regional mungkin ada. Penting untuk selalu mengamati dan bertanya kepada penutur asli bahasa isyarat jika ada keraguan tentang isyarat tertentu.\n\nLatih isyarat ini dengan membayangkan berbagai situasi di mana Anda akan menggunakan isyarat profesi, seperti saat wawancara atau saat bertanya tentang pekerjaan teman Anda.",
                'gambar' => '7.jpg',
            ],
            [
                'judul' => 'Transportasi',
                'isi' => "Materi tentang transportasi akan mengajarkan Anda isyarat-isyarat untuk berbagai moda transportasi yang kita gunakan sehari-hari. Ini sangat berguna untuk membicarakan perjalanan, arah, atau rencana.\n\nIsyarat untuk 'Mobil', 'Sepeda', 'Kereta Api', 'Pesawat', atau 'Perahu' seringkali meniru gerakan atau karakteristik unik dari kendaraan tersebut. Misalnya, isyarat 'mobil' mungkin meniru gerakan memegang setir.\n\nDengan menguasai isyarat transportasi, Anda dapat berkomunikasi tentang bagaimana Anda pergi ke suatu tempat, atau memberikan petunjuk arah kepada orang lain.\n\nPerhatikan konteks saat menggunakan isyarat transportasi. Apakah Anda berbicara tentang kendaraan itu sendiri, atau tindakan bepergian dengan kendaraan tersebut? Konteks bisa mempengaruhi pilihan isyarat.\n\nPraktikkan isyarat ini saat Anda sedang bepergian atau melihat berbagai jenis transportasi di sekitar Anda. Visualisasikan gerakan dan kaitkan dengan objek nyata untuk memudahkan mengingat.",
                'gambar' => '8.jpg',
            ],
            [
                'judul' => 'Hewan',
                'isi' => "Materi ini akan membahas isyarat untuk berbagai jenis hewan, baik hewan peliharaan maupun hewan liar. Topik hewan seringkali muncul dalam percakapan santai atau saat bercerita.\n\nIsyarat untuk 'Kucing', 'Anjing', 'Burung', 'Ikan', atau 'Ular' seringkali meniru karakteristik fisik atau gerakan khas dari hewan tersebut. Misalnya, isyarat 'kucing' mungkin meniru kumisnya.\n\nMempelajari isyarat hewan sangat menyenangkan dan dapat membantu memperkaya kosa kata Anda dalam bahasa isyarat.\n\nBeberapa isyarat hewan mungkin bersifat universal, sementara yang lain bisa memiliki variasi regional. Jika Anda tertarik pada isyarat hewan yang kurang umum, sebaiknya cari referensi dari komunitas Tuli setempat.\n\nLatih isyarat ini dengan mengamati hewan di sekitar Anda, atau dengan melihat gambar hewan dan mencoba mengisyaratkannya. Anda juga bisa mencoba membuat cerita sederhana tentang hewan menggunakan isyarat yang telah dipelajari.",
                'gambar' => '9.jpg',
            ],
            [
                'judul' => 'Warna',
                'isi' => "Materi ini akan memperkenalkan isyarat untuk berbagai warna dasar. Kemampuan untuk mengisyaratkan warna sangat penting untuk mendeskripsikan objek, pakaian, atau lingkungan sekitar.\n\nIsyarat untuk 'Merah', 'Biru', 'Hijau', 'Kuning', dan 'Hitam' biasanya memiliki gerakan tangan yang spesifik dan seringkali dikaitkan dengan lokasi tertentu pada wajah atau tubuh. Misalnya, isyarat 'merah' mungkin menyentuh bibir.\n\nMenguasai isyarat warna memungkinkan Anda memberikan deskripsi yang lebih detail dan akurat dalam percakapan Anda. Ini sangat berguna saat berbicara tentang penampilan atau pilihan.\n\nPastikan untuk mempraktikkan isyarat warna dengan objek nyata. Tunjuk objek berwarna merah dan isyaratkan 'merah', dan seterusnya. Ini membantu memperkuat koneksi antara isyarat dan konsepnya.\n\nPerhatikan juga ekspresi wajah yang mungkin menyertai isyarat warna, terutama jika Anda ingin menekankan atau membedakan nuansa warna tertentu.",
                'gambar' => '10.jpg',
            ],
            [
                'judul' => 'Kata Kerja Dasar',
                'isi' => "Kata kerja adalah inti dari setiap kalimat, menggambarkan tindakan atau keadaan. Materi ini akan fokus pada isyarat untuk kata kerja dasar yang sering digunakan dalam komunikasi sehari-hari.\n\nIsyarat untuk 'Makan', 'Minum', 'Tidur', 'Pergi', 'Datang', dan 'Lihat' seringkali bersifat ikonik, yaitu meniru tindakan yang mereka representasikan. Ini membuat isyarat kata kerja relatif mudah dipelajari.\n\nMenguasai kata kerja dasar adalah langkah penting untuk mulai membentuk kalimat-kalimat yang lebih kompleks dan menyampaikan ide-ide yang lebih lengkap.\n\nDalam bahasa isyarat, orientasi tangan, lokasi isyarat, dan gerakan adalah komponen penting dari setiap kata kerja. Perubahan kecil dalam salah satu komponen ini dapat mengubah makna isyarat secara signifikan.\n\nLatih kata kerja ini dengan mengaitkannya pada tindakan yang Anda lakukan. Misalnya, saat Anda benar-benar makan, ucapkan dan isyaratkan 'Makan'. Ini akan membantu dalam internalisasi isyarat.",
                'gambar' => '11.jpg',
            ],
            [
                'judul' => 'Kalimat Sederhana',
                'isi' => "Setelah menguasai kosa kata dasar, langkah selanjutnya adalah merangkai kata-kata menjadi kalimat sederhana. Materi ini akan memperkenalkan struktur kalimat dasar dalam bahasa isyarat.\n\nStruktur kalimat dalam bahasa isyarat bisa berbeda dari bahasa lisan. Misalnya, dalam ASL, struktur subjek-objek-predikat (SOP) sering digunakan daripada subjek-predikat-objek (SPO) seperti dalam bahasa Inggris. Penting untuk memahami aturan sintaksis yang berlaku.\n\nMembentuk kalimat sederhana memungkinkan Anda untuk mengungkapkan pikiran dan kebutuhan dasar, seperti 'Saya lapar', 'Kamu di mana?', atau 'Apa kabar?'.\n\nEkspresi non-manual, seperti ekspresi wajah dan gerakan kepala, sangat penting dalam kalimat bahasa isyarat karena dapat menyampaikan pertanyaan, negasi, atau penekanan tanpa perlu isyarat tambahan.\n\nPraktikkan dengan membuat kalimat-kalimat tentang diri Anda, lingkungan sekitar, atau aktivitas sehari-hari. Mulailah dengan kalimat pendek dan bertahap tingkatkan kompleksitasnya.",
                'gambar' => '12.jpg',
            ],
            [
                'judul' => 'Emosi dan Perasaan',
                'isi' => "Materi ini akan mengajarkan isyarat untuk berbagai emosi dan perasaan. Mengungkapkan emosi adalah bagian krusial dari komunikasi yang efektif dan empati.\n\nIsyarat untuk 'Senang', 'Sedih', 'Marah', 'Takut', atau 'Cinta' seringkali melibatkan ekspresi wajah yang kuat dan gerakan tangan yang menggambarkan intensitas perasaan tersebut.\n\nEkspresi wajah adalah komponen non-manual yang paling penting saat mengkomunikasikan emosi. Bahkan jika gerakan tangan Anda sempurna, tanpa ekspresi wajah yang sesuai, makna bisa salah dipahami.\n\nMempelajari isyarat emosi membantu Anda tidak hanya mengungkapkan perasaan Anda sendiri tetapi juga memahami perasaan orang lain, yang sangat penting dalam membangun hubungan.\n\nLatih isyarat ini dengan membayangkan skenario emosional dan bagaimana Anda akan mengungkapkan perasaan tersebut. Praktikkan di depan cermin untuk melihat apakah ekspresi wajah Anda sesuai dengan isyarat tangan.",
                'gambar' => '13.jpg',
            ],
            [
                'judul' => 'Hari dan Waktu',
                'isi' => "Materi ini akan membahas isyarat yang berkaitan dengan hari-hari dalam seminggu, bulan, dan konsep waktu secara umum. Ini sangat penting untuk membuat janji, merencanakan acara, atau berbicara tentang jadwal.\n\nIsyarat untuk 'Hari Senin', 'Hari Selasa', 'Besok', 'Kemarin', 'Pagi', 'Malam', atau 'Jam' seringkali melibatkan gerakan yang menunjukkan perputaran waktu atau posisi matahari.\n\nMenguasai isyarat waktu memungkinkan Anda untuk berinteraksi dengan lebih lancar dalam percakapan yang melibatkan informasi temporal.\n\nPerhatikan bahwa beberapa isyarat waktu bisa jadi memiliki arah yang spesifik (misalnya, gerakan ke belakang untuk masa lalu, ke depan untuk masa depan). Memahami arah ini penting untuk kejelasan.\n\nPraktikkan isyarat ini dengan membahas jadwal harian atau mingguan Anda, atau dengan membicarakan acara-acara yang telah terjadi atau akan datang. Semakin Anda menggunakannya, semakin alami rasanya.",
                'gambar' => '14.jpg',
            ],
            [
                'judul' => 'Frasa Umum Sehari-hari',
                'isi' => "Materi terakhir ini akan merangkum dan memperluas isyarat yang telah Anda pelajari dengan mengajarkan frasa-frasa umum yang sering digunakan dalam percakapan sehari-hari. Ini adalah langkah menuju kefasihan.\n\nFrasa seperti 'Bagaimana Kabarmu?', 'Saya tidak mengerti', 'Bisakah Anda mengulangi?', atau 'Senang bertemu dengan Anda' adalah kunci untuk interaksi yang lebih kompleks.\n\nMempelajari frasa-frasa ini secara keseluruhan, bukan hanya kata per kata, akan membantu Anda memahami aliran alami bahasa isyarat dan bagaimana kata-kata terhubung dalam kalimat.\n\nPenting untuk juga memperhatikan nuansa komunikasi non-verbal seperti kecepatan isyarat dan jeda, yang dapat memengaruhi makna frasa secara keseluruhan.\n\nTeruslah berlatih frasa-frasa ini dalam konteks nyata. Coba ajak teman atau anggota keluarga yang juga belajar bahasa isyarat untuk berlatih bersama, atau tonton video penutur asli untuk meniru cara mereka menggunakan frasa ini.",
                'gambar' => '15.jpg',
            ],
        ];

        foreach ($materiData as $materi) {
            Materi_admin::create($materi);
        }
    }
}
