<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\DetailTransaksi;
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
        $arrayTransaksi = Transaksi::with('user')->orderBy('created_at', 'DESC')->get();//eloquent
        return view('private.transaksi.index', compact('arrayTransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $sampahArray = Sampah::all();
        $transaksi = Transaksi::with('detail_transaksi.sampah')->find($id);
        return view('private.transaksi.detail',compact('transaksi','sampahArray'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $arrayMetodePembayaran = MetodePembayaran::all();
        $transaksi = Transaksi::with('metode_pembayaran', 'user')->find($id);
        return view('private.transaksi.form_edit', compact('transaksi', 'arrayMetodePembayaran'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            // column to validate and rules
            [
                'user_id' => 'required|integer',
                'tipe_transaksi' => 'required|string',
                'metode_pembayaran_id' => 'required|integer',
                'status_bayar' => 'required|string',
                'total_harga' => 'required|between:0,99.99',
            ],

            //column custom errors
            [
                'user_id.required' => 'wajib login agar dapat mengakses fitur ini',
                'user_id.integer' => 'wajib login agar dapat mengakses fitur ini',
                'metode_pembayaran_id.required' => 'metode pembayaran wajib diisi',
                'metode_pembayaran_id.integer' => 'satuan wajib berupa id metode pembayaran',
                'status_bayar.required' => 'wajib pilih status_bayar',
                'status_bayar.string' => 'status_bayar harus berupa string/huruf',
                'total_harga.required' => 'total harga wajib diisi',
            ]);
            //lakukan insert data dari request form dgn query builder
        try {
            $now = DB::raw('CURRENT_TIMESTAMP');
            
            DB::table('transaksi')->where('id',$id)->update([
                'user_id' => $request->user_id,
                'tipe_transaksi' => $request->tipe_transaksi,
                'metode_pembayaran_id' => $request->metode_pembayaran_id,
                'status_bayar' => $request->status_bayar,
                'total_harga' => $request->total_harga,
                'updated_at' => $now
            ]);
            return redirect()->route('transaksi.show', $id)
                ->with('success', 'transaksi berhasil diubah ID:'.$id);

            } catch (\Exception $e) {
                //return redirect()->back()
                return redirect()->route('transaksi.index')
                        ->with('error', 'Terjadi kesalahan saat mengubah transaksi!. \n Error : '.$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $transaksi = Transaksi::find($id);
            $transaksi->delete();
            return redirect()->back()
                    ->with('success', 'transaksi berhasil dihapus');

        } catch (\Exception $e) {
            return redirect()->back()
                    ->with('error', 'terjadi error saat hapus transaksi! \nError: '.$e->getMessage());
        }
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