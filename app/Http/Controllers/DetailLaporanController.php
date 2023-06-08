<?php

namespace App\Http\Controllers;

use App\Models\detail_laporan;
use Illuminate\Http\Request;

use App\Models\dataorder;
use Illuminate\Support\Carbon;
use App\Models\laporan;

class DetailLaporanController extends Controller
{
    public function show($id)
    {
        $data_p = detail_laporan::where('laporan_id', $id)->where('Personalisasi', 'P')->sum('GR');
        $data_np = detail_laporan::where('laporan_id', $id)->where('Personalisasi', 'NP')->sum('GR');
        $jumlah = detail_laporan::where('laporan_id', $id)->sum('GR');
        if (auth()->user()->role === 'supervisor' || auth()->user()->role === 'admin') {
            return view('isilapSupervisor', [
                "title" => "Detail Laporan",
                "laporan" => laporan::where('id', $id)->firstorfail(),
                "isilaporan" => detail_laporan::where('laporan_id', $id)->get()->sortByDesc('updated_at'),
                "jumlah_p" => $data_p,
                "jumlah_np" => $data_np,
                "jumlah_total" => $jumlah
            ]);
        } else {
            return view('isilaporan', [
                "title" => "Laporan",
                "laporan" => laporan::where('id', $id)->firstorfail(),
                "isilaporan" => detail_laporan::where('laporan_id', $id)->get()->sortByDesc('updated_at'),
                "jumlah_p" => $data_p,
                "jumlah_np" => $data_np,
                "jumlah_total" => $jumlah
            ]);
        }
    }


    public function insert(Request $request)
    {
        $getTableA = dataorder::where('NOPO', $request->scanbar)->get();
        detail_laporan::updateorcreate(
            ['NOPO' => $getTableA->value('NOPO')],
            [
                'laporan_id' => $request->idlaporan,
                'OBC' => $getTableA->value('OBC'),
                'SERI' => $getTableA->value('SERI'),
                'Personalisasi' => $getTableA->value('Personalisasi'),
                'GR' => $getTableA->value('GR'),
                'tanggal_laporan' => Carbon::now()
            ]
        );
        return redirect()->back()->withInput();
    }

    public function update(Request $request, $nopo)
    {
        detail_laporan::where('NOPO', $nopo)->update(['GR' => $request->update]);
        return redirect()->back()->withInput();
    }

    public function delete(Request $request, $nopo)
    {
        detail_laporan::where('NOPO', $nopo)->delete(['NOPO' => $request->delete]);
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
}
