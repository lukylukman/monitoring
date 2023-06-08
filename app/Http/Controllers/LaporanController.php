<?php

namespace App\Http\Controllers;

use App\Models\detail_laporan;
use App\Models\laporan;
use Illuminate\Http\Request;
use App\Models\user;



class LaporanController extends Controller
{
    public function index()
    {
        $laporan = Laporan::latest();

        if (auth()->user()->role === 'supervisor') {
            if (request()->has('cari')) {
                $laporan->where('id', 'like', '%' . request('cari') . '%');
            } elseif (auth()->user()->role === 'admin' && request()->has('cariin')) {
                $laporan->where('id', 'like', '%' . request('cariin') . '%');
            }
        }

        if (request()->has('search')) {
            $laporan->where('id', 'like', '%' . request('search') . '%');
        }


        if (auth()->user()->role === 'supervisor' || auth()->user()->role === 'admin') {
            return view('lihatLaporan', [
                "title" => "Lihat Laporan",
                "laporans" => $laporan->get()
            ]);
        }

        return view('laporan', [
            "title" => "Laporan",
            "laporans" => $laporan->get()
        ])->withErrors(['Anda tidak memiliki izin untuk mengakses halaman ini']);
    }


    public function drop(Request $request, $id)
    {
        detail_laporan::where('laporan_id', $id)->delete(['laporan_id' => $request->drop]);
        laporan::where('id', $id)->delete(['id' => $request->drop]);
        return redirect()->back()->with('cancel', 'Laporan berhasil dihapus!');
    }

    public function approval($id)
    {
        $getLaporan = laporan::where('id', $id);

        if ($getLaporan->value('approval') == 0) {
            $getLaporan->update(['approval' => 1]);
            return redirect()->back()->with('success', 'Laporan Berhasil Approve');
        } else {
            $getLaporan->update(['approval' => 0]);
            return redirect()->back()->with('cancel', 'Laporan Di Batalkan');
        }
    }


    // public function show($id)
    // {
    //     return view('isilaporan', [
    //         "title" => "Laporan",
    //         "laporan" => laporan::where('id', $id)->firstorfail(),
    //         "isilaporan" => detail_laporan::where('laporan_id', $id)->get()->sortByDesc('updated_at')
    //     ]);
    // }

    // public function insert(Request $request)
    // {
    //     // dd($request->all());
    //     $getTableA = rawdata::where('nopo',$request->scanbar)->get();
    //     detail_laporan::updateorcreate(
    //         ['nopo' => $getTableA->value('nopo')],
    //         [ 
    //             'laporan_id' => $request->idlaporan,
    //             'OBC' => $getTableA->value('OBC'),
    //             'SERI' => $getTableA->value('SERI'),
    //             'Personalisasi' => $getTableA->value('Personalisasi'),
    //             'GR' => $getTableA->value('GR'),
    //             'tanggal_laporan' => Carbon::now()
    //         ]);
    //     return redirect()->back()->withInput();
    // }

    // public function update(Request $request, $nopo ){
    //     // dd($request->all());
    //     detail_laporan::where('nopo', $nopo)->update(['GR' => $request->update]);
    //     return redirect()->back()->withInput();
    // }

    // public function delete(Request $request, $nopo){
    //     // dd($request->all());
    //     detail_laporan::where('nopo', $nopo)->delete(['nopo' => $request->delete]);
    //     return redirect()->back()->withInput();
    // }
}
