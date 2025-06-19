<?php

namespace Database\Seeders;

use App\Models\Admin\Kuis as AdminKuis;
// use App\Models\Kuis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class Kuis extends Seeder
{
    public function run(): void
    {
        // Soal untuk level Pemula (5 soal)
        $pemulaQuestions = [
            [
                'level' => 'pemula',
                'pertanyaan' => 'Isyaratkan "Halo". Bentuk tangan mana yang paling tepat?',
                'opsi_a' => 'Tangan terbuka melambai di samping kepala.',
                'opsi_b' => 'Tangan terbuka diletakkan di dahi.',
                'opsi_c' => 'Telapak tangan menyentuh dada lalu bergerak ke depan.',
                'opsi_d' => 'Tangan mengepal ke atas.',
                'jawaban' => 'c',
            ],
            [
                'level' => 'pemula',
                'pertanyaan' => 'Huruf "A" dalam Abjad Manual SIBI diisyaratkan dengan:',
                'opsi_a' => 'Jari telunjuk ke atas, jari lain menggenggam.',
                'opsi_b' => 'Kepalan tangan dengan jempol menempel di samping telunjuk.',
                'opsi_c' => 'Jempol ke atas, jari lain menggenggam.',
                'opsi_d' => 'Telapak tangan terbuka, semua jari lurus.',
                'jawaban' => 'c',
            ],
            [
                'level' => 'pemula',
                'pertanyaan' => 'Isyarat untuk "Terima Kasih" biasanya melibatkan gerakan tangan ke mana?',
                'opsi_a' => 'Menunjuk ke arah orang yang dituju.',
                'opsi_b' => 'Mengusap dagu dua kali.',
                'opsi_c' => 'Tangan terbuka dari dagu ke depan.',
                'opsi_d' => 'Mengangkat kedua tangan di atas kepala.',
                'jawaban' => 'c',
            ],
            [
                'level' => 'pemula',
                'pertanyaan' => 'Isyarat untuk angka "Satu" biasanya menggunakan:',
                'opsi_a' => 'Semua jari terbuka.',
                'opsi_b' => 'Hanya jempol yang terbuka.',
                'opsi_c' => 'Hanya jari telunjuk yang terbuka.',
                'opsi_d' => 'Jari tengah dan telunjuk membentuk "V".',
                'jawaban' => 'c',
            ],
            [
                'level' => 'pemula',
                'pertanyaan' => 'Bagaimana cara mengisyaratkan "Saya" dalam bahasa isyarat SIBI?',
                'opsi_a' => 'Menunjuk ke arah orang lain.',
                'opsi_b' => 'Menunjuk ke dada diri sendiri dengan jari telunjuk.',
                'opsi_c' => 'Menunjuk ke arah samping.',
                'opsi_d' => 'Mengangkat kedua tangan.',
                'jawaban' => 'b',
            ],
        ];

        // Soal untuk level Menengah (5 soal)
        $menengahQuestions = [
            [
                'level' => 'menengah',
                'pertanyaan' => 'Jika Anda ingin mengisyaratkan "Apakah Anda mengerti?", ekspresi wajah yang tepat adalah:',
                'opsi_a' => 'Mengerutkan dahi dan mengangguk.',
                'opsi_b' => 'Mata melebar dan kepala agak maju.',
                'opsi_c' => 'Alis diangkat dan kepala agak maju.',
                'opsi_d' => 'Tersenyum lebar dan mengedipkan mata.',
                'jawaban' => 'c',
            ],
            [
                'level' => 'menengah',
                'pertanyaan' => 'Isyarat untuk "Besok" dalam bahasa isyarat SIBI biasanya bergerak ke arah:',
                'opsi_a' => 'Ke belakang bahu.',
                'opsi_b' => 'Ke depan tubuh.',
                'opsi_c' => 'Ke atas kepala.',
                'opsi_d' => 'Ke bawah.',
                'jawaban' => 'b',
            ],
            [
                'level' => 'menengah',
                'pertanyaan' => 'Bagaimana cara mengisyaratkan "Kemarin" dalam bahasa isyarat SIBI?',
                'opsi_a' => 'Gerakan tangan ke depan bahu.',
                'opsi_b' => 'Gerakan tangan ke belakang bahu.',
                'opsi_c' => 'Gerakan tangan memutar di depan tubuh.',
                'opsi_d' => 'Gerakan tangan ke atas.',
                'jawaban' => 'b',
            ],
            [
                'level' => 'menengah',
                'pertanyaan' => 'Ketika mengisyaratkan kalimat negatif, misalnya "Saya tidak suka.", ekspresi non-manual yang umum digunakan adalah:',
                'opsi_a' => 'Mengangguk dan tersenyum.',
                'opsi_b' => 'Menggelengkan kepala.',
                'opsi_c' => 'Mata melotot.',
                'opsi_d' => 'Mengerutkan bibir.',
                'jawaban' => 'b',
            ],
            [
                'level' => 'menengah',
                'pertanyaan' => 'Isyarat "Makan" dalam SIBI biasanya melibatkan gerakan apa?',
                'opsi_a' => 'Menunjuk ke mulut.',
                'opsi_b' => 'Menggerakkan tangan ke mulut seolah-olah mengambil makanan.',
                'opsi_c' => 'Menggosok perut.',
                'opsi_d' => 'Menjentikkan jari di depan mulut.',
                'jawaban' => 'b',
            ],
        ];

        // Soal untuk level Mahir (5 soal)
        $mahirQuestions = [
            [
                'level' => 'mahir',
                'pertanyaan' => 'Dalam bahasa isyarat, bagaimana Anda membedakan antara pertanyaan "ya/tidak" dan pertanyaan "apa/siapa/kapan" (Wh-questions) secara non-manual?',
                'opsi_a' => 'Pertanyaan "ya/tidak" menggunakan alis diangkat, "Wh-questions" menggunakan alis dikerutkan.',
                'opsi_b' => 'Pertanyaan "ya/tidak" menggunakan alis dikerutkan, "Wh-questions" menggunakan alis diangkat.',
                'opsi_c' => 'Keduanya menggunakan alis diangkat.',
                'opsi_d' => 'Keduanya menggunakan alis dikerutkan.',
                'jawaban' => 'a',
            ],
            [
                'level' => 'mahir',
                'pertanyaan' => 'Apa peran "topic-comment structure" dalam tata bahasa bahasa isyarat?',
                'opsi_a' => 'Menentukan urutan kata yang sama dengan bahasa lisan.',
                'opsi_b' => 'Menempatkan topik pembicaraan di awal kalimat diikuti dengan komentar/informasi tentang topik tersebut.',
                'opsi_c' => 'Selalu menempatkan kata kerja di akhir kalimat.',
                'opsi_d' => 'Memfokuskan pada subjek sebagai hal terpenting.',
                'jawaban' => 'b',
            ],
            [
                'level' => 'mahir',
                'pertanyaan' => 'Bagaimana cara mengisyaratkan nama orang atau tempat yang tidak memiliki isyarat khusus?',
                'opsi_a' => 'Cukup tunjuk ke arah orang/tempat tersebut.',
                'opsi_b' => 'Gunakan abjad manual (fingerspelling).',
                'opsi_c' => 'Buat isyarat baru secara spontan.',
                'opsi_d' => 'Gunakan isyarat terdekat yang memiliki makna serupa.',
                'jawaban' => 'b',
            ],
            [
                'level' => 'mahir',
                'pertanyaan' => 'Ekspresi non-manual seperti gerakan kepala dan posisi tubuh digunakan untuk apa dalam bahasa isyarat?',
                'opsi_a' => 'Hanya untuk menunjukkan emosi.',
                'opsi_b' => 'Sebagai bagian dari tata bahasa dan untuk menyampaikan makna tata bahasa, pertanyaan, atau negasi.',
                'opsi_c' => 'Hanya untuk menarik perhatian lawan bicara.',
                'opsi_d' => 'Tidak memiliki fungsi linguistik.',
                'jawaban' => 'b',
            ],
            [
                'level' => 'mahir',
                'pertanyaan' => 'Mengapa penting untuk memahami budaya Tuli selain hanya belajar isyarat?',
                'opsi_a' => 'Agar bisa berkomunikasi dengan penutur Tuli dari negara lain.',
                'opsi_b' => 'Untuk menghargai tradisi dan norma komunikasi komunitas Tuli, yang dapat memengaruhi cara isyarat digunakan dan diinterpretasikan.',
                'opsi_c' => 'Karena semua orang Tuli memiliki budaya yang sama.',
                'opsi_d' => 'Agar bisa mengajar bahasa isyarat kepada orang lain.',
                'jawaban' => 'b',
            ],
        ];

        // Masukkan data ke database
        foreach ($pemulaQuestions as $question) {
            AdminKuis::create($question);
        }

        foreach ($menengahQuestions as $question) {
            AdminKuis::create($question);
        }

        foreach ($mahirQuestions as $question) {
            AdminKuis::create($question);
        }
    }
}
