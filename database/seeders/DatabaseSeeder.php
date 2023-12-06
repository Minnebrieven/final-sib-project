<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        }
        catch(Exception $e) {
            $userSeederID = DB::table('users')->insertGetID(['name' => 'Test User','email' => 'test@example.com', 'password' => 'asassaas']);
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

        try {
            $botolPlastik = DB::table('sampah')->where('nama', 'Botol Plastik')->get();
            $botolPlastikID = $botolPlastik[0]->id;
        } catch (Exception $e) {
            $botolPlastikID = DB::table('sampah')->insertGetId([
                'nama' => 'Botol Plastik',
                'jenis_sampah_id' => $jenisSampahNonOrganikID,
                'satuan' => 'perbotol',
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
                'satuan' => 'perkardus',
                'harga' => 1000,
            ]);
        }

        $transaksiID = DB::table('transaksi')->insertGetId([
            'user_id' => $userSeederID,
            'tipe_transaksi' => 'jual',
            'metode_pembayaran_id' => $metodePembayaranCODID,
            'status_bayar' => 'belum',
            'total_harga' => 5000
        ]);

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
    }
}
