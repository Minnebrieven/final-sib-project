<?php

namespace App\Http\Controllers;

use App\Models\JenisSampah;
use Illuminate\Http\Request;
use Illuminate\View\View; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;

class JenisSampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_jenis_sampah = JenisSampah::all();//eloquent
        return view('private.jenissampah.index', compact('ar_jenis_sampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create():View
    {
        //ambil master data kategori u/ dilooping di select option form
        $ar_jenis_sampah = JenisSampah::all();
        return view('private.jenissampah.form', compact('ar_jenis_sampah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'jenis_sampah' => 'required',
            ],

            [
                'jenis_sampah.required' => 'Nama Wajib Diisi',
            ]
            );
            //lakukan insert data dari request form dgn query builder
        try {
            DB::table('jenis_sampah')->insert([
                'jenis_sampah' => $request->jenis_sampah,
            ]);

            return redirect()->route('jenissampah.index')
                ->with('success', 'Data Berita Baru Berhasil Disimpan');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('jenissampah.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
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
