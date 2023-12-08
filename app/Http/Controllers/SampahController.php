<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View; //panggil model
use Illuminate\Http\RedirectResponse;

// call Models
use App\Models\Sampah;
use App\Models\JenisSampah;

class SampahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        $arraySampah = Sampah::with('jenis_sampah')->get(); //eloquent
        return view('private.sampah.index', compact('arraySampah'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        $arrayJenisSampah = JenisSampah::all();
        return view('private.sampah.form', compact('arrayJenisSampah'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $validated = $request->validate(
            // column to validate and rules
            [
                'nama' => 'required|string',
                'jenis_sampah_id' => 'required|integer',
                'satuan' => 'required|string',
                'harga' => 'required|between:0,99.99',
            ],

            //column custom errors
            [
                'nama.required' => 'nama sampah wajib diisi',
                'nama.string' => 'nama sampah wajib berupa string/huruf',
                'jenis_sampah_id.required' => 'jenis sampah wajib diisi',
                'jenis_sampah_id.integer' => 'jenis sampah wajib berisi integer/angka',
                'satuan.required' => 'satuan wajib diisi',
                'nama.string' => 'satuan wajib berupa string/huruf',
                'harga.required' => 'harga wajib diisi',
                'harga.regex' => 'harga wajib berpola nominal uang',
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
    public function show(string $id) : View
    {
        $sampah = Sampah::find($id);
        return view('private.sampah.detail', compact('sampah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) : View
    {
        $arrayJenisSampah = JenisSampah::all();
        $dataSampahLama = Sampah::find($id);
        return view('private.sampah.form_edit', compact('arrayJenisSampah', 'dataSampahLama'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) : RedirectResponse
    {
        $validated = $request->validate(
            // column to validate and rules
            [
                'nama' => 'required|string',
                'jenis_sampah_id' => 'required|integer',
                'satuan' => 'required|string',
                'harga' => 'required|between:0,99.99',
            ],

            //column custom errors
            [
                'nama.required' => 'nama sampah wajib diisi',
                'nama.string' => 'nama sampah wajib berupa string/huruf',
                'jenis_sampah_id.required' => 'jenis sampah wajib diisi',
                'jenis_sampah_id.integer' => 'jenis sampah wajib berisi integer/angka',
                'satuan.required' => 'satuan wajib diisi',
                'nama.string' => 'satuan wajib berupa string/huruf',
                'harga.required' => 'harga wajib diisi',
                'harga.regex' => 'harga wajib berpola nominal uang',
            ]);
        
        try {
            DB::table('sampah')->where('id', $id)->update([
                    'nama' => $request->nama,
                    'jenis_sampah_id' => $request->jenis_sampah_id,
                    'satuan' => $request->satuan,
                    'harga' => $request->harga,
                    'updated_at' => DB::raw('CURRENT_TIMESTAMP')
                ]);
            return redirect('/sampah' . '/' . $id)->with('success', 'Data sampah berhasil diubah!');
        } catch (\Exception $e) {
            return redirect()->route('sampah.index')->with('error', 'Terjadi kesalahan saat mengubah data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) : RedirectResponse
    {
        //get post by ID
        $sampah = Sampah::findOrFail($id);

        //delete post
        $sampah->delete();

        //redirect to index
        return redirect()->route('sampah.index')->with(['success' => 'Data berhasil dihapus!']);
    }
}
