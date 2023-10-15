<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ExportController extends Controller
{
    // MORE SIMPLE & EASIER TO REMEMBER
    public function exportExcelRil()
    {
        $filename = "lelangs-data-" . date("Y-m-d") . ".xls";
        $lelangs = Lelang::with('data_barang')->get();
        $excelData = $lelangs->isEmpty() ? "No records found..." : "No.\tNama Barang\tHarga Awal\tHarga Akhir\tPemenang\tPenginput\tTanggal\tStatus\n";
        foreach ($lelangs as $index => $lelang) {
            $excelData .= ($index + 1) . "\t" . $lelang->data_barang->nama_barang . "\t" . $lelang->data_barang->harga_awal . "\t" . $lelang->harga_akhir . "\tblm\tJohn Doe\t" . $lelang->tgl_lelang . "\t" . ($lelang->status == '0' ? 'tunda' : $lelang->status) . "\n";
        }
        return response($excelData, 200)
            ->header('Content-Type', 'application/vnd.ms-excel')
            ->header('Content-Disposition', "attachment; filename=$filename");
    }

    // MORE SIMPLE
    // public function exportExcel()
    // {
    //     $filename = "lelangs-data-" . date("Y-m-d") . ".xls";
    //     $lelangs = Lelang::with('data_barang')->get(); // Replace YourModel with your actual model
    //     $excelData = "No records found...";
    //     if ($lelangs->count() > 0) {
    //         $fields = ["No.", "Nama Barang", "Harga Awal", "Harga Akhir", "Pemenang", "Penginput", "Tanggal", "Status"];
    //         $excelData = implode("\t", $fields) . "\n";
    //         foreach ($lelangs as $index => $lelang) {
    //             $lineData = [
    //                 $index + 1,
    //                 $lelang->data_barang->nama_barang,
    //                 $lelang->data_barang->harga_awal,
    //                 $lelang->harga_akhir,
    //                 "blm", // Replace with your actual data
    //                 "John Doe", // Replace with your actual data
    //                 $lelang->tgl_lelang,
    //                 $lelang->status == '0' ? "tunda" : $lelang->status,
    //             ];
    //             $excelData .= implode("\t", $lineData) . "\n";
    //         }
    //     }
    //     $headers = [
    //         'Content-Type' => 'application/vnd.ms-excel',
    //         'Content-Disposition' => "attachment; filename=$filename",
    //     ];
    //     return Response::make($excelData, 200, $headers);
    // }

    // public function exportExcell()
    // {
    //     $filename = "lelangs-data-" . date("Y-m-d") . ".xls";
    //     $lelangs = Lelang::with('data_barang')->get();
    //     if ($lelangs->isEmpty()) {
    //         return response("No records found...", 200)
    //             ->header('Content-Type', 'text/plain')
    //             ->header('Content-Disposition', "attachment; filename=$filename");
    //     }
    //     $fields = ["No.", "Nama Barang", "Harga Awal", "Harga Akhir", "Pemenang", "Penginput", "Tanggal", "Status"];
    //     $excelData = collect([$fields]);
    //     $lelangs->each(function ($lelang, $index) use (&$excelData) {
    //         $excelData->push([
    //             $index + 1,
    //             $lelang->data_barang->nama_barang,
    //             $lelang->data_barang->harga_awal,
    //             $lelang->harga_akhir,
    //             "blm", // Replace with your actual data
    //             "John Doe", // Replace with your actual data
    //             $lelang->tgl_lelang,
    //             $lelang->status == '0' ? "tunda" : $lelang->status,
    //         ]);
    //     });
    //     $excelData = $excelData->map(function ($row) {
    //         return implode("\t", $row);
    //     })->implode("\n");
    //     return response($excelData, 200)
    //         ->header('Content-Type', 'application/vnd.ms-excel')
    //         ->header('Content-Disposition', "attachment; filename=$filename");
    // }
}
