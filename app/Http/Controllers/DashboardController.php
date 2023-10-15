<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\HistoryLelang;
use App\Models\Lelang;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $jumlah_petugas = User::where('level', 'petugas')->count();
        $jumlah_barang = Barang::get()->count();
        $jumlah_lelang = Lelang::get()->count();
        $jumlah_penawar = User::where('level', 'masyarakat')->count();
        $lelang_dibuka = Lelang::where('status', 'dibuka')->with('data_barang')->get();
        $penawaran = HistoryLelang::with('data_penawar', 'data_barang')->get();

        if ($request->user()->level == 'masyarakat') {
            // return sizeof($lelang_dibuka) == "0";
            return view('dashboard.masyarakat', ['lelang_dibuka' => $lelang_dibuka]);
        }
        if ($request->user()->level == 'petugas' || $request->user()->level == 'admin') {
            return view('dashboard.petugas-admin', [
                'jumlah_petugas' => $jumlah_petugas,
                'jumlah_barang' => $jumlah_barang,
                'jumlah_lelang' => $jumlah_lelang,
                'jumlah_penawar' => $jumlah_penawar,
                'penawaran' => $penawaran,
            ]);
        }
        abort(401);
    }
}
