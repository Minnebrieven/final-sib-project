<?php

namespace App\Http\Controllers;

use App\Models\DataTransaksi;
use Illuminate\Http\Request;
use App\Models\JenisSampah; //panggil model
use App\Models\Sampah; //panggil model
use App\Models\MetodePembayaran; //panggil model
use App\Models\Transaksi; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class TransaksiUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksi = Transaksi::with('metode_pembayaran', 'detail_transaksi')->where('user_id', Auth::user()->id)->get();
        return view('public.transaksi.index', compact('transaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $arrayJenisSampah = JenisSampah::all();
        $arraySampah = Sampah::all();
        $arrayMetodePembayaran = MetodePembayaran::all();
        return view('public.transaksi.form', compact('arraySampah', 'arrayJenisSampah', 'arrayMetodePembayaran'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            // column to validate and rules
            [
                'user_id' => 'required|integer',
                'tipe_transaksi' => 'required|string',
                'metode_pembayaran_id' => 'required|integer',
                'sampah' => 'required|array|min:1',
            ],

            //column custom errors
            [
                'user_id.required' => 'wajib login agar dapat mengakses fitur ini',
                'user_id.integer' => 'wajib login agar dapat mengakses fitur ini',
                'jenis_sampah_id.required' => 'tipe transaksi wajib diisi',
                'jenis_sampah_id.string' => 'tipe transaksi wajib berupa string/huruf',
                'metode_pembayaran_id.required' => 'metode pembayaran wajib diisi',
                'metode_pembayaran_id.integer' => 'satuan wajib berupa id metode pembayaran',
                'sampah.required' => 'wajib pilih sampah yang ingin dijual/beli',
                'sampah.*.sampah_id' => 'sampah harus berupa id dari sampah',
                'sampah.*.jumlah' => 'jumlah harus berupa integer/angka',
            ]);
            //lakukan insert data dari request form dgn query builder
        try {
            $now = DB::raw('CURRENT_TIMESTAMP');
            
            $totalHarga = 0;
            foreach ($request->sampah as $smph) {
                $hargaSampah = DB::table('sampah')->where('id', $smph['sampah_id'])->value('harga');
                $totalHarga += floatval(bcmul($hargaSampah, strval($smph['jumlah'])));
            }
            $lastInsertedTransaksiID = DB::table('transaksi')->insertGetId([
                'user_id' => $request->user_id,
                'tipe_transaksi' => $request->tipe_transaksi,
                'metode_pembayaran_id' => $request->metode_pembayaran_id,
                'status_bayar' => 'belum bayar',
                'total_harga' => $totalHarga,
                'created_at' => $now,
                'updated_at' => $now
            ]);

            foreach ($request->sampah as $smph) {
                DB::table('detail_transaksi')->insert([
                    'transaksi_id' => $lastInsertedTransaksiID,
                    'sampah_id' => $smph['sampah_id'],
                    'jumlah' => $smph['jumlah'],
                    'created_at' => $now,
                    'updated_at' => $now
                ]);
            }
            
            return redirect()->route('transaksiku.show', $lastInsertedTransaksiID)
                ->with('success', 'transaksi berhasil dibuat ID:'.$lastInsertedTransaksiID);
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('transaksiku.create')
                ->with('errors', 'Terjadi kesalahan saat transaksi dibuat!. \n Error : '.$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Transaksi::with('detail_transaksi.sampah')->find($id);
        return view('public.transaksi.detail', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
