<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\Transaksi;
use App\Models\DataTransaksi;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionData['title'] = ['Nama Penjual', 'Jumlah', 'Tanggal Transaksi'];
        $transactionData['data'] = DB::table('transaksi')->limit('5')->get(); // 5 latest transaction
        $reportSummary['jumlahTransaksi'] = DB::table('data_transaksi')->count();
        $reportSummary['totalHargaTransaksi'] = DB::table('data_transaksi')->sum('harga');
        $reportSummary['totalSampah'] = DB::table('transaksi')->sum('jumlah');
        
        $chart = DB::table('transaksi')
        ->join('jenis_sampah', 'jenis_sampah.id', '=', 'transaksi.d_jenis_sampah')
        ->select('jenis_sampah.jenis_sampah', DB::raw('COUNT(transaksi.id) AS jumlah'))
        ->groupBy('jenis_sampah.jenis_sampah')
        ->get();
        $chartTotal = DB::table('transaksi')->count();

        return view('private.dashboard', compact('chart','transactionData', 'reportSummary' , 'chartTotal'));
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
