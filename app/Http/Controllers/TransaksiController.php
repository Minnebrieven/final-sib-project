<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Penjual; //panggil model
use App\Models\JenisSampah; //panggil model
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
        $ar_transaksi = Transaksi::all();//eloquent
        return view('private.transaksi.index', compact('ar_transaksi'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Transaksi::find($id);
        return view('private.transaksi.detail',compact('rs'));
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
