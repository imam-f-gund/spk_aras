<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Bobot;
use App\Models\Kriteria;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'admin',
            'username' => 'Admin',
            'email' => 'test@example.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now(),
        ]);

        Kriteria::insert([
            [
                'id' => 1,
                'kode_kriteria' => 'C1',
                'nama_kriteria' => 'Administrasi Pembelajaran',
                'keterangan' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'kode_kriteria' => 'C2',
                'nama_kriteria' => 'Penyusunan RPS',
                'keterangan' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'kode_kriteria' => 'C3',
                'nama_kriteria' => 'Pengembangan Silabus',
                'keterangan' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 4,
                'kode_kriteria' => 'C4',
                'nama_kriteria' => 'Praktik Pembelajaran',
                'keterangan' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 5,
                'kode_kriteria' => 'C5',
                'nama_kriteria' => 'Penilaian',
                'keterangan' => 'Benefit',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Bobot::insert([
            [
                'nilai_roc' => 0.4567,
                'nilai_bobot' => 0.4567,
                'id_kriteria' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nilai_roc' => 0.2567,
                'nilai_bobot' => 0.2567,
                'id_kriteria' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nilai_roc' => 0.1567,
                'nilai_bobot' => 0.1567,
                'id_kriteria' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nilai_roc' => 0.09,
                'nilai_bobot' => 0.09,
                'id_kriteria' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nilai_roc' => 0.04,
                'nilai_bobot' => 0.04,
                'id_kriteria' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        Periode::insert([
            [
                'id' => 1,
                'nama_periode' => '2019',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 2,
                'nama_periode' => '2020',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 3,
                'nama_periode' => '2021',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        $path = 'db/data.sql';
        DB::unprepared(file_get_contents($path));
    }
}
