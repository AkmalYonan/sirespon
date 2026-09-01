<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Instansi;
use App\Models\Kategori;
use App\Models\Laporan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Users Default
        $admin = User::firstOrCreate(
            ['email' => 'admin@sirespon.test'],
            [
                'name' => 'Administrator Sirespon',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'email_verified_at' => now(),
            ]
        );

        $staff = User::firstOrCreate(
            ['email' => 'staff@sirespon.test'],
            [
                'name' => 'Staff Pelayanan',
                'password' => Hash::make('password'),
                'role' => 'staff',
                'email_verified_at' => now(),
            ]
        );

        // 2. Instansi Default
        $instansis = [
            [
                'nama' => 'Tata Usaha (TU)',
                'pemimpin' => 'Drs. H. Mulyadi, M.Pd.',
                'kategori' => 'staff',
            ],
            [
                'nama' => 'Bidang Kesiswaan',
                'pemimpin' => 'Bambang Susanto, S.Pd.',
                'kategori' => 'staff',
            ],
            [
                'nama' => 'Sarana dan Prasarana',
                'pemimpin' => 'Ir. Hendra Gunawan',
                'kategori' => 'staff',
            ],
            [
                'nama' => 'Bidang Kurikulum & Akademik',
                'pemimpin' => 'Dr. Sri Wahyuni, M.Si.',
                'kategori' => 'guru',
            ],
            [
                'nama' => 'Bimbingan dan Konseling (BK)',
                'pemimpin' => 'Nurul Hidayati, S.Psi.',
                'kategori' => 'guru',
            ],
            [
                'nama' => 'Unit Keamanan & Ketertiban',
                'pemimpin' => 'Agus Priyanto',
                'kategori' => 'staff',
            ],
        ];

        $createdInstansis = [];
        foreach ($instansis as $item) {
            $createdInstansis[] = Instansi::firstOrCreate(
                ['nama' => $item['nama']],
                $item
            );
        }

        // 3. Kategori Default
        $kategoris = [
            [
                'nama_kategori' => 'Kerusakan Fasilitas & Sarpras',
                'desc' => 'Laporan terkait AC mati, proyektor rusak, meja/kursi patah, dan fasilitas umum lainnya.',
                'level' => 'normal',
            ],
            [
                'nama_kategori' => 'Kebersihan & Sanitasi',
                'desc' => 'Laporan area kotor, toilet tersumbat, atau penumpukan sampah di lingkungan sekolah.',
                'level' => 'ringan',
            ],
            [
                'nama_kategori' => 'Kedisiplinan & Tata Tertib',
                'desc' => 'Pengaduan pelanggaran tata tertib, keterlambatan, atau perundungan.',
                'level' => 'berat',
            ],
            [
                'nama_kategori' => 'Keamanan & Keadaan Darurat',
                'desc' => 'Laporan insiden keamanan genting, kehilangan barang, atau potensi bahaya.',
                'level' => 'gawat',
            ],
            [
                'nama_kategori' => 'Layanan Administrasi & Keuangan',
                'desc' => 'Pengaduan terkait pengurusan surat menyurat, kartu pelajar, atau administrasi.',
                'level' => 'normal',
            ],
        ];

        $createdKategoris = [];
        foreach ($kategoris as $item) {
            $createdKategoris[] = Kategori::firstOrCreate(
                ['nama_kategori' => $item['nama_kategori']],
                $item
            );
        }

        // 4. Sample Laporans
        $sampleLaporans = [
            [
                'id_lacak' => 'RSP-2024-0012',
                'email_pembuat' => 'siswa@sirespon.test',
                'nama_pelapor' => 'Ahmad Rian',
                'klasifikasi' => 'laporan',
                'kategori_id' => $createdKategoris[0]->id,
                'instansi_id' => $createdInstansis[2]->id,
                'judul' => 'AC Ruang Lab Komputer 2 Tidak Dingin',
                'desc' => 'Pendingin ruangan di Lab Komputer 2 mengeluarkan suara berisik dan hembusan udara tidak dingin sehingga kegiatan praktikum kurang nyaman.',
                'date' => now()->subDays(3)->toDateString(),
                'lokasi' => 'Gedung B Lantai 2, Lab Komputer 2',
                'lampiran' => null,
                'status' => 'publik',
                'status_pengirim' => 'publik',
                'status_laporan' => 'proses',
            ],
            [
                'id_lacak' => 'RSP-2024-0015',
                'email_pembuat' => 'pelapor.anonim@mail.com',
                'nama_pelapor' => null,
                'klasifikasi' => 'pengaduan',
                'kategori_id' => $createdKategoris[2]->id,
                'instansi_id' => $createdInstansis[1]->id,
                'judul' => 'Parkir Liar di Gerbang Belakang Mengganggu Akses',
                'desc' => 'Banyak kendaraan roda dua parkir sembarangan di depan pintu gerbang belakang saat jam pulang sekolah sehingga menyebabkan kemacetan.',
                'date' => now()->subDays(1)->toDateString(),
                'lokasi' => 'Pintu Gerbang Belakang',
                'lampiran' => null,
                'status' => 'publik',
                'status_pengirim' => 'anonim',
                'status_laporan' => 'menunggu',
            ],
            [
                'id_lacak' => 'RSP-2024-0008',
                'email_pembuat' => 'budi.santoso@sirespon.test',
                'nama_pelapor' => 'Budi Santoso',
                'klasifikasi' => 'laporan',
                'kategori_id' => $createdKategoris[1]->id,
                'instansi_id' => $createdInstansis[0]->id,
                'judul' => 'Kran Wastafel Toilet Gedung A Bocor',
                'desc' => 'Kran air pada wastafel lantai 1 terus mengalir deras dan tidak bisa ditutup rapat.',
                'date' => now()->subDays(6)->toDateString(),
                'lokasi' => 'Toilet Pria Gedung A Lantai 1',
                'lampiran' => null,
                'status' => 'publik',
                'status_pengirim' => 'publik',
                'status_laporan' => 'selesai',
            ],
        ];

        foreach ($sampleLaporans as $data) {
            $laporan = Laporan::firstOrCreate(
                ['id_lacak' => $data['id_lacak']],
                $data
            );

            // Add sample comment if not exists
            if ($laporan->status_laporan === 'proses') {
                Comment::firstOrCreate(
                    [
                        'laporan_id' => $laporan->id,
                        'desc' => 'Laporan telah diverifikasi oleh tim Sarpras. Teknisi AC dijadwalkan datang besok pagi pukul 09.00 WIB.',
                    ],
                    [
                        'user_id' => $admin->id,
                        'author_name' => $admin->name,
                    ]
                );
            } elseif ($laporan->status_laporan === 'selesai') {
                Comment::firstOrCreate(
                    [
                        'laporan_id' => $laporan->id,
                        'desc' => 'Perbaikan kran wastafel telah selesai dilakukan oleh tim maintenance.',
                    ],
                    [
                        'user_id' => $staff->id,
                        'author_name' => $staff->name,
                    ]
                );
            }
        }
    }
}
