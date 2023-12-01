<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\JenisSampah;
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
        $arrayTitle = ['Nama Penjual', 'Jumlah', 'Tanggal Transaksi'];
        $arrayTransaksi = DB::table('transaksi')->limit('5')->get(); // 5 latest transaction
        $jumlahTransaksi = $totalHargaTransaksi = DB::table('data_transaksi')->count();
        $totalHargaTransaksi = DB::table('data_transaksi')->sum('harga');
        $totalSampah = DB::table('transaksi')->sum('jumlah');
        return view('private.dashboard', compact('arrayTitle', 'arrayTransaksi', 'totalHargaTransaksi', 'jumlahTransaksi', 'totalSampah'));
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
