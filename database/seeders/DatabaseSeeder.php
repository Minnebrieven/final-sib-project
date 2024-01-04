<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
Use Exception;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        try {
            $userSeeder = DB::table('users')->where('name', 'Test User')->get();
            $userSeederID = $userSeeder[0]->id;
            $adminSeederID = DB::table('users')->where('name', 'administrator')->get();
            $adminSeederID = $adminSeederID[0]->id;
            $managerSeederID = DB::table('users')->where('name', 'administrator')->get();
            $managerSeederID = $managerSeederID[0]->id;
            $staffSeederID = DB::table('users')->where('name', 'staff')->get();
            $staffSeederID = $staffSeederID[0]->id;
        }
        catch(Exception $e) {
            $userSeederID = DB::table('users')->insertGetID(['name' => 'Test User','email' => 'test@example.com', 'password' => Hash::make('testuser123'), 'role' => 'pelanggan']);
            $adminSeederID = DB::table('users')->insertGetID(['name' => 'admin','email' => 'admin@gmail.com', 'password' => Hash::make('admin123'), 'role' => 'admin' ]);
            $managerSeederID = DB::table('users')->insertGetID(['name' => 'manager','email' => 'manager@gmail.com', 'password' => Hash::make('manager123'), 'role' => 'manager']);
            $staffSeederID = DB::table('users')->insertGetID(['name' => 'staff','email' => 'staff@gmail.com', 'password' => Hash::make('staff123'), 'role' => 'staff']);
        }

        // Start of Seeding Master Data
        try {
            $jenisSampahOrganik = DB::table('jenis_sampah')->where('nama', 'Organik')->get();
            $jenisSampahOrganikID = $jenisSampahOrganik[0]->id;
        }
        catch(Exception $e) {
            $jenisSampahOrganikID = DB::table('jenis_sampah')->insertGetID(['nama' => 'Organik',]);
        }

        try {
            $jenisSampahNonOrganik = DB::table('jenis_sampah')->where('nama', 'Non Organik')->get();
            $jenisSampahNonOrganikID = $jenisSampahNonOrganik[0]->id;
        }
        catch(Exception $e) {
            $jenisSampahNonOrganikID = DB::table('jenis_sampah')->insertGetID(['nama' => 'Non Organik',]);
        }
        
        try {
            $metodePembayaranCOD = DB::table('metode_pembayaran')->where('nama', 'Cash On Delivery')->get();
            $$metodePembayaranCODID = $metodePembayaranCOD[0]->id;
        }
        catch(Exception $e) {
            $metodePembayaranCODID = DB::table('metode_pembayaran')->insertGetId(['nama' => 'Cash On Delivery',]);
        }
        
        // End of Seeding Master Data

        // Start of Sampah Seed
        try {
            $botolPlastik = DB::table('sampah')->where('nama', 'Botol Plastik')->get();
            $botolPlastikID = $botolPlastik[0]->id;
        } catch (Exception $e) {
            $botolPlastikID = DB::table('sampah')->insertGetId([
                'nama' => 'Botol Plastik',
                'jenis_sampah_id' => $jenisSampahNonOrganikID,
                'satuan' => 'botol',
                'harga' => 500,
            ]);
        }

        try {
            $kardus = DB::table('sampah')->where('nama', 'Kardus')->get();
            $kardusID = $kardus[0]->id;
        } catch (Exception $e) {
            $kardusID = DB::table('sampah')->insertGetId([
                'nama' => 'Kardus',
                'jenis_sampah_id' => $jenisSampahNonOrganikID,
                'satuan' => 'kardus',
                'harga' => 1000,
            ]);
        }
        // End of Sampah Seed

        // Start of Transaksi Seed
        $transaksiID = DB::table('transaksi')->insertGetId([
            'user_id' => $userSeederID,
            'tipe_transaksi' => 'jual',
            'metode_pembayaran_id' => $metodePembayaranCODID,
            'status_bayar' => 'belum bayar',
            'total_harga' => 5000
        ]);
        // End of Transaksi Seed

        // Start of Detail Transaksi Seed
        DB::table('detail_transaksi')->insert([
            'transaksi_id' => $transaksiID,
            'sampah_id' => $botolPlastikID,
            'jumlah' => 4,
        ]);
        DB::table('detail_transaksi')->insert([
            'transaksi_id' => $transaksiID,
            'sampah_id' => $kardusID,
            'jumlah' => 3,
        ]);
        // End of Detail Transaksi Seed

        // Start of Kategori Berita Seed
        try {
            $kategoriBerita = DB::table('kategori_berita')->where('nama', 'Lingkungan')->get();
            $kategoriBeritaID = $kategoriBerita[0]->id;
        } catch (\Throwable $th) {
            $kategoriBeritaID = DB::table('kategori_berita')->insertGetId([
                'nama' => 'Lingkungan'
            ]);
        }
        // End of Kategori Berita Seed

        // Start of Berita Seed
        DB::table('berita')->insert([
            'kategori_berita_id' => $kategoriBeritaID,
            'user_id' => $userSeederID,
            'judul' => 'Gunung Sampah di Desa ABC',
            'deskripsi' => 'tumpukan sampah yang menggunug di desa ABC menganggu aktifitas sehari-hari warga desa',
        ]);
        // End of Berita Seed
    }
}
