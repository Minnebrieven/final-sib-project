<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Sampah; //panggil model
use App\Models\JenisSampah; //panggil model
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
        return view('public.transaksi.form', compact('arraySampah', 'arrayJenisSampah'));
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
}
