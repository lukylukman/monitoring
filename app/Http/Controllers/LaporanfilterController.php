<?php

namespace App\Http\Controllers;

use App\Models\detail_laporan;
use App\Models\laporan;
use Illuminate\Http\Request;

class LaporanfilterController extends Controller
{
    //
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

        $laporanWeekly = $laporan->get()->groupBy(function ($laporan) {
            return $laporan->created_at->startOfWeek()->format('Y-m-d');
        });

        $laporanMonthly = $laporan->get()->groupBy(function ($laporan) {
            return $laporan->created_at->startOfMonth()->format('Y-m');
        });

        if (auth()->user()->role === 'supervisor' || auth()->user()->role === 'admin') {
            return view('laporan_w&m', [
                "title" => "Lihat Laporan",
                "laporanWeekly" => $laporanWeekly,
                "laporanMonthly" => $laporanMonthly
            ]);
        }

        return view('laporan_w&m', [
            "title" => "Laporan",
            "laporanWeekly" => $laporanWeekly,
            "laporanMonthly" => $laporanMonthly
        ])->withErrors(['Anda tidak memiliki izin untuk mengakses halaman ini']);
    }
    public function laporanMinggu($tanggal)
    {
        $startDate = \Carbon\Carbon::parse($tanggal)->startOfWeek();
        $endDate = \Carbon\Carbon::parse($tanggal)->endOfWeek();

        $laporan = Laporan::whereBetween('created_at', [$startDate, $endDate])->get();

        return view('laporanMinggu', [
            'tanggal' => $tanggal,
            'laporans' => $laporan
        ]);
    }

    public function laporanBulan($bulan)
    {
        $laporan = Laporan::whereMonth('created_at', '=', substr($bulan, 5, 2))
            ->whereYear('created_at', '=', substr($bulan, 0, 4))
            ->get();

        return view('laporanBulan', [
            'bulan' => $bulan,
            'laporans' => $laporan
        ]);
    }
}
