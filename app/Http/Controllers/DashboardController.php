<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisSampah;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB; // jika pakai query builder
use Illuminate\Database\Eloquent\Model;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactionData['title'] = ['Tipe Transaksi', 'Penjual/Pembeli', 'Total Harga', 'Status Pembayaran', 'Tanggal Transaksi'];
        $transactionData['data'] = Transaksi::with('user')->take(5)->orderBy('created_at', 'DESC')->get(); // 5 latest transaction
        $reportSummary['totalHargaTransaksiJual'] = DB::table('transaksi')->where('tipe_transaksi', 'jual')->sum('total_harga');
        $reportSummary['totalHargaTransaksiBeli'] = DB::table('transaksi')->where('tipe_transaksi', 'beli')->sum('total_harga');
        $reportSummary['totalSampah'] = DB::table('detail_transaksi')->sum('jumlah');
        $reportSummary['jumlahTransaksi'] = DB::table('transaksi')->count();
        
        // sampah terkumpul berdasarkan jenis
        $chart['total'] = DB::table('detail_transaksi')->sum('jumlah');
        $chart['non organik'] = 0;
        $chart['organik'] = 0;
        $detailTransaksi = DetailTransaksi::with('sampah.jenis_sampah')->get();
        foreach ($detailTransaksi as $detail) {
            $chart[strtolower($detail->sampah->jenis_sampah->nama)] += $detail->jumlah;
        }
        

        
        $grafik_pie = DB::table('users')
                        ->select('role', DB::raw('count(*) as total'))
                        ->groupBy('role')
                        ->get();

        return view('private.dashboard', compact('chart','transactionData', 'reportSummary', 'grafik_pie'));
       
    }
}
