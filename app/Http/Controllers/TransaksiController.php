<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Sampah; //panggil model
use App\Models\JenisSampah; //panggil model
use App\Models\MetodePembayaran; //panggil model
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use PDF;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $arrayTransaksi = Transaksi::with('user')->get(); //eloquent
        return view('private.transaksi.index', compact('arrayTransaksi'));
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
        $sampahArray = Sampah::all();
        $transaksi = Transaksi::with('detail_transaksi.sampah')->find($id);
        return view('private.transaksi.detail',compact('transaksi', 'sampahArray'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Transaksi::find($id);
        return view('private.transaksi.form', compact('transaksi'));
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

    public function generatePDF()
    {
        $data = [
            'title' => 'Data Transaksi',
            'date' => date('d-m-Y H:i:s')
        ];
          
        $pdf = PDF::loadView('private.transaksi.tesPDF', $data);
    
        return $pdf->download('data_tespdf_'.date('d-m-Y_H:i:s').'.pdf');
    }

    public function transaksiPDF(){
        $ar_transaksi = transaksi::all();
        $pdf = PDF::loadView('private.transaksi.transaksiPDF', 
                              ['ar_transaksi'=>$ar_transaksi]);
        return $pdf->download('data_transaksi_'.date('d-m-Y_H:i:s').'.pdf');
    }
}
