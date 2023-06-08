<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Imports\dataorderIMPRT;
use App\Models\dataorder;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class dataorderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('about')->with([
            'dataOD' => dataorder::paginate(10),
            'totalOrder' => $this->totalOrder(),
            // 'totalOrderKirim' => $this->totalOrderKirim(),
        ]);
    }

    public function totalOrder()
    {
        //total order, sisa order, jumlah kemas kemarin, target kemas selanjutnya
        $totalOrder = dataorder::whereMonth('Tgl_OBC', 2)
            ->get()
            ->unique('NOPO')
            ->sum('QTY_PESAN');


        // dd($totalOrder);
    }

    public function totalOrderKirim()
    {
        $totalOrderKirim = dataorder::whereMonth('Tgl_OBC', 2)
            ->get()
            ->unique('NOPO')
            ->sum('GR');

        // dd($totalOrderKirim);
    }

    public function import(Request $request)
    {
        // dd($request->file('file'));
        Excel::import(new dataorderIMPRT, $request->file('file'));
        return redirect()->back();
        Session::flash('sukses', 'Data Order Berhasil Di Update!');
    }


    // public function import_excel(Request $request)
    // {
    //     // validasi
    //     $this->validate($request, [
    //         'file' => 'required|mimes:csv,xls,xlsx'
    //     ]);

    //     // menangkap file excel
    //     $file = $request->file('file');

    //     // membuat nama file unik
    //     $nama_file = rand() . $file->getClientOriginalName();

    //     // upload ke folder file_siswa di dalam folder public
    //     $file->move('file_order', $nama_file);

    //     // import data
    //     Excel::import(new dataorderIMPRT, public_path('/file_order/' . $nama_file));

    //     // notifikasi dengan session
    //     Session::flash('sukses', 'Data Siswa Berhasil Diimport!');

    //     // alihkan halaman kembali
    //     return redirect('/about');
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
