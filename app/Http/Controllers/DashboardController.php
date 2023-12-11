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
        $transactionData['title'] = ['Tipe Transaksi', 'Penjual/Pembeli', 'Total Harga', 'Status Pembayaran'];
        $transactionData['data'] = Transaksi::with('user')->get(); // 5 latest transaction
        $reportSummary['totalHargaTransaksi'] = DB::table('transaksi')->sum('total_harga');
        $reportSummary['totalSampah'] = DB::table('detail_transaksi')->sum('jumlah');
        $reportSummary['jumlahTransaksi'] = DB::table('transaksi')->count();
        $chart = Transaksi::with('user')->get();
        $chartTotal = DB::table('transaksi')->count();

        $grafik_pie = DB::table('users')
        ->select('role', DB::raw('count(*) as total'))
        ->groupBy('role')
        ->get();

        return view('private.dashboard', compact('chart','transactionData', 'reportSummary' , 'chartTotal','grafik_pie'));
       
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
