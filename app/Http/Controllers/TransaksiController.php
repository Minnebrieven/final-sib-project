<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Penjual; //panggil model
use App\Models\JenisSampah; //panggil model
use App\Models\MetodePembayaran; //panggil model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_transaksi = Transaksi::all(); //eloquent
        return view('private.transaksi.index', compact('ar_transaksi'));
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
                'tipe_transaksi' => 'in:jual,beli',
                'metode_pembayaran' => 'required|integer',
                'sampah_id' => 'required|array',
                'sampah_id.*' => 'required|integer',
                'jumlah' => 'required|array',
                'jumlah.*' => 'required|integer',
            ],

            //column custom errors
            [
                'tipe_transaksi.required' => 'tipe transaksi wajib diisi'
            ]);
            //lakukan insert data dari request form dgn query builder
        try {
            $now = DB::raw('CURRENT_TIMESTAMP');
            $lastInsertedSampahID = DB::table('sampah')->insertGetId([
                'nama' => $request->nama,
                'jenis_sampah_id' => $request->jenis_sampah_id,
                'satuan' => $request->satuan,
                'harga' => $request->harga,
                'created_at' => $now,
                'updated_at' => $now
            ]);

            return redirect()->route('sampah.index')
                ->with('success', 'Sampah baru berhasil ditambahkan ID:'.$lastInsertedSampahID);
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('sampah.index')
                ->with('error', 'Terjadi kesalahan saat input data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Transaksi::find($id);
        return view('private.transaksi.detail', compact('rs'));
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
