<?php

namespace App\Http\Controllers;

use App\Models\dataorder;
use App\Models\laporan;
use App\Models\detail_laporan;
use App\Models\laporan_;
use Carbon\Carbon;


use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function index()
    {
        return view('monitor')->with([
            'dataOD' => dataorder::paginate(10),
            'totalOrder' => $this->totalOrder(),
            'totalOrderKirim' => $this->totalOrderKirim(),
            'totalKemasHariSebelumnya' => $this->totalKemasHariSebelumnya(),
        ]);
    }

    public function totalOrder()
    {
        $totalOrder = dataorder::whereMonth('Tgl_OBC', 3)
            ->whereYear('Tgl_OBC', today())
            ->get()
            ->unique('OBC')
            ->sum('QTY_PESAN');
        return $totalOrder;
    }

    public function totalOrderKirim()
    {
        $totalOrderKirim = dataorder::whereMonth('Tgl_OBC', 3)
            ->whereYear('Tgl_OBC', today())
            ->get()
            ->unique('OBC')
            ->sum('GR');
        return $totalOrderKirim;
    }

    public function totalKemasHariSebelumnya()
    {
        $lastDate = detail_laporan::orderBy('tanggal_laporan', 'DESC')
            ->value('tanggal_laporan');

        $kemasKemarin = detail_laporan::whereDate('tanggal_laporan', Carbon::parse($lastDate)->format('Y-m-d'))
            ->sum('GR');

        return $kemasKemarin;
    }
}
