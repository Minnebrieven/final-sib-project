<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use App\Models\Sampah; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            // column to validate and rules
            [
                'transaksi_id' => 'required|integer',
                'sampah_id' => 'required|integer',
                'jumlah' => 'required|integer',
            ],

            //column custom errors
            [
                'transaksi_id.required' => 'id transaksi wajib diisi',
                'transaksi_id.integer' => 'id transaksi wajib berupa id dari transaksi',
                'sampah_id.required' => 'id sampah wajib diisi',
                'sampah_id.integer' => 'id sampah wajib berupa id dari sampah',
                'jumlah.required' => 'jumlah wajib diisi',
                'jumlah.integer' => 'jumlah harus berupa integer/angka',
            ]);
            try {
                $now = DB::raw('CURRENT_TIMESTAMP');
                
                $transaksi = Transaksi::find($request->transaksi_id);
                $hargaSampah = DB::table('sampah')->where('id', $request->sampah_id)->value('harga');
                $transaksi->total_harga += $hargaSampah * $request->jumlah;
                $transaksi->save();
                
                $lastInsertedDetailTransaksiID = DB::table('detail_transaksi')->insertGetId([
                    'transaksi_id' => $request->transaksi_id,
                    'sampah_id' => $request->sampah_id,
                    'jumlah' => $request->jumlah,
                    'created_at' => $now,
                    'updated_at' => $now
                ]);

                return redirect()->route('transaksi.show', $request->transaksi_id)
                        ->with('success', 'detail transaksi berhasil ditambah ID:'.$lastInsertedDetailTransaksiID);

            } catch (\Exception $e) {
                return redirect()->route('transaksi.show', $request->transaksi_id)
                        ->with('error', 'Terjadi kesalahan saat menambah detail transaksi!. \n Error : '.$e->getMessage());
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $validated = $request->validate(
            // column to validate and rules
            [
                'transaksi_id' => 'required|integer',
                'sampah_id' => 'required|integer',
                'jumlah' => 'required|integer',
            ],

            //column custom errors
            [
                'transaksi_id.required' => 'id transaksi wajib diisi',
                'transaksi_id.integer' => 'id transaksi wajib berupa id dari transaksi',
                'sampah_id.required' => 'id sampah wajib diisi',
                'sampah_id.integer' => 'id sampah wajib berupa id dari sampah',
                'jumlah.required' => 'jumlah wajib diisi',
                'jumlah.integer' => 'jumlah harus berupa integer/angka',
            ]);
            //lakukan update data dari request form dgn query builder

        try {
            $detailTransaksi = DetailTransaksi::with('sampah')->find($id);
            $transaksi = Transaksi::find($detailTransaksi->transaksi_id);
            $hargaLama = $detailTransaksi->sampah->harga * $detailTransaksi->jumlah;
            $hargaSampah = ($detailTransaksi->sampah_id == $request->sampah_id)? $detailTransaksi->sampah->harga : DB::table('sampah')->where('id', $request->sampah_id)->value('harga');
            $hargaBaru = $hargaSampah * $request->jumlah;

            // ubah total harga transaksi
            $transaksi->total_harga = $transaksi->total_harga - $hargaLama;
            $transaksi->total_harga = $transaksi->total_harga + $hargaBaru;
            $transaksi->save();

            //ubah detail transaksi
            $detailTransaksi->sampah_id = $request->sampah_id;
            $detailTransaksi->jumlah = $request->jumlah;
            $detailTransaksi->save();

            return redirect()->route('transaksi.show', $detailTransaksi->transaksi_id)
                ->with('success', 'detail transaksi berhasil diubah ID:'.$id);

        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('transaksi.show', $detailTransaksi->transaksi_id)
                    ->with('error', 'Terjadi kesalahan saat mengubah detail transaksi!. \n Error : '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $detailTransaksi = DetailTransaksi::with('sampah')->find($id);
        $totalHarga = DB::table('transaksi')->where('id', $detailTransaksi->transaksi_id)->value('total_harga');
        $hargaDikurang = strval($detailTransaksi->sampah->harga * $detailTransaksi->jumlah);
        $totalHargaAkhir = floatval(bcsub($totalHarga, $hargaDikurang));
        try {
            DB::table('transaksi')->where('id', $detailTransaksi->transaksi_id)->update([
                'total_harga' => $totalHargaAkhir,
                'updated_at' => DB::raw('CURRENT_TIMESTAMP')
            ]);
            $detailTransaksi->delete();
            return redirect()->back()
                    ->with('success', 'detail transaksi berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()
                    ->with('error', 'terjadi error saat hapus detail transaksi! \nError: '.$e->getMessage());
        }
    }
}
