<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita; //panggil model
use App\Models\KategoriBerita;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View; //panggil model
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model; //jika pakai eloquent
use App\Http\Controllers\redirect;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ar_berita = Berita::all(); //eloquent
        return view('private.berita.index', compact('ar_berita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //ambil master data kategori u/ dilooping di select option form
        $ar_kategoriberita = KategoriBerita::all();
        return view('private.berita.form', compact('ar_kategoriberita'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate(
            [
                'kategori' => 'required|integer',
                'author' => 'required|max:45',
                'judul' => 'required',
                'link' => 'required',
                'deskripsi' => 'required',
                'tanggal' => 'required|between:0,99.99',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000', //KB
            ],

            [
                'kategori.required' => 'Kategori Wajib Diisi',
                'author.required' => 'Nama Wajib Diisi',
                'author.max' => 'Nama Maksimal 45 karakter',
                'link.required' => 'link Wajib Diisi',
                'deskripsi.required' => 'Deskeirpsi Wajib Diisi',
                'tanggal.required' => 'Tanggal Wajib Diisi',
                'tanggal.between' => 'Tanggal Bilangan Pecahan',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 9000 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );

        if (!empty($request->foto)) {
            $fileName = 'berita_' . date("Ymd_h-i-s") . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('private/assets/img'), $fileName);
        } else {
            $fileName = '';
        }

        //lakukan insert data dari request form dgn query builder
        try {
            DB::table('berita')->insert([
                'kategori' => $request->kategori,
                'author' => $request->author,
                'judul' => $request->judul,
                'link' => $request->link,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'foto' => $fileName
            ]);

            return redirect()->route('berita.index')
                ->with('success', 'Data Berita Baru Berhasil Disimpan');
        } catch (\Exception $e) {
            //return redirect()->back()
            return redirect()->route('berita.index')
                ->with('error', 'Terjadi Kesalahan Saat Input Data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $rs = Berita::find($id);
        return view('private.berita.detail', compact('rs'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //ambil master untuk dilooping di select option
        $ar_kategori = KategoriBerita::all();
        //tampilkan data lama di form edit
        $row = Berita::find($id);
        return view('private.berita.form_edit', compact('row', 'ar_kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate(
            [
                'kategori' => 'required|integer',
                'author' => 'required|max:45',
                'judul' => 'required',
                'link' => 'required',
                'deskripsi' => 'required',
                'tanggal' => 'required|between:0,99.99',
                'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif,svg|min:2|max:9000', //KB
            ],

            [
                'kategori.required' => 'Kategori Wajib Diisi',
                'author.required' => 'Nama Wajib Diisi',
                'author.max' => 'Nama Maksimal 45 karakter',
                'link.required' => 'link Wajib Diisi',
                'deskripsi.required' => 'Deskeirpsi Wajib Diisi',
                'tanggal.required' => 'Tanggal Wajib Diisi',
                'tanggal.between' => 'Tanggal Bilangan Pecahan',
                'foto.min' => 'Ukuran file kurang 2 KB',
                'foto.max' => 'Ukuran file melebihi 9000 KB',
                'foto.image' => 'File foto bukan gambar',
                'foto.mimes' => 'Extension file selain jpg,jpeg,png,gif,svg',
            ]
        );

        $foto = DB::table('berita')->select('foto')->where('id', $id)->get();
        foreach ($foto as $f) {
            $namaFileFotoLama = $f->foto;
        }
        //------------apakah user  ingin ubah upload foto baru-----------
        if (!empty($request->foto)) {
            //jika ada foto lama, hapus foto lamanya terlebih dahulu
            if (!empty($namaFileFotoLama)) unlink('private/assets/img/' . $namaFileFotoLama);
            //lalukan proses ubah foto lama menjadi foto baru
            $fileName = 'berita_' . date("Ymd_h-i-s") . '.' . $request->foto->extension();
            //$fileName = $request->foto->getClientOriginalName();
            $request->foto->move(public_path('private/assets/img'), $fileName);
        } else {
            $fileName = $namaFileFotoLama;
        }

        //lakukan insert data dari request form dgn query builder
        DB::table('berita')->where('id', $id)->update(
            [
                'kategori' => $request->kategori,
                'author' => $request->author,
                'judul' => $request->judul,
                'link' => $request->link,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'foto' => $fileName
            ]
        );
        return redirect('/berita' . '/' . $id)
            ->with('success', 'Data Asset Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $berita = Berita::find($id);

        if ($berita) {
            $berita->delete();

            // Additional logic (e.g., deleting associated file)
            if (!empty($berita->foto)) {
                $filePath = 'private/assets/img/' . $berita->foto;
                if (Berita::exists($filePath)) {
                    unlink($filePath);
                }
            }

            return redirect()->route('berita.index')->with('success', 'Data Asset Berhasil Dihapus');
        } else {
            return redirect()->route('berita.index')->with('error', 'Data Asset tidak ditemukan');
        }
    }

    public function delete($id)
    {
        //sebelum hapus data, hapus terlebih dahulu fisik file fotonya jika ada
        $row = Berita::find($id);
        if (!empty($row->foto)) unlink('private/assets/img/' . $row->foto);
        //hapus datanya dari tabel
        Berita::where('id', $id)->delete();
        return redirect()->back();
    }
}
