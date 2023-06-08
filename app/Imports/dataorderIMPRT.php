<?php

namespace App\Imports;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;

use \PhpOffice\PhpSpreadsheet\Shared\Date;
use App\Models\dataorder;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class dataorderIMPRT implements ToCollection, WithHeadingRow
{
    public function headingRow(): int
    {
        return 1;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function collection(Collection $rows)
    {

        foreach ($rows as $row) {
            dataorder::updateOrCreate(
                ['NOPO' => $row['order'] == null ? 0 : $row['order']],
                [
                    //
                    'Tgl_OBC'    => Date::excelToDatetimeObject($row['tgl_obc'])->format('Y-m-d'),
                    'Material'   => $row['material'] == null ? 0 : $row['material'],
                    'OBC'        => $row['no_obc']  == null ? 0 : $row['no_obc'],
                    'SERI'       => $row['seri']    == null ? 0 : $row['seri'],
                    'WARNA'      => $row['warna']   == null ? 0 : $row['warna'],
                    'RPB'        => $row['rpb']     == null ? 0 : $row['rpb'],
                    'HJE'        => $row['hje']     == null ? 0 : $row['hje'],
                    'BPB'        => $row['bpb']     == null ? 0 : $row['bpb'],
                    'KODE_PABRIK' => $row['kode_pabrik'] == null ? 0 : $row['kode_pabrik'],
                    'JHT'        => $row['jht']         == null ? 0 : $row['jht'],
                    'QTY_PESAN'  => $row['qty_pesan']   == null ? 0 : $row['qty_pesan'],
                    'RENCET'     => $row['rencet']      == null ? 0 : $row['rencet'],
                    'Tgl_JTempo' => Date::excelToDatetimeObject($row['tgl_jtempo'])->format('Y-m-d'),
                    'Personalisasi' => $row['perso_non_perso'] == null ? 0 : $row['perso_non_perso'],
                    'Perekat'    => $row['perekat']     == null ? 0 : $row['perekat'],
                    'GR'         => $row['gr']          == null ? 0 : $row['gr'],
                    'No_Pelat'   => $row['no_pelat']    == null ? 0 : $row['no_pelat'],
                    'type'       => $row['type']        == null ? 0 : $row['type'],
                    'Created_On' => Date::excelToDatetimeObject($row['created_on'])->format('Y-m-d'),
                    'Sales_Doc'  => $row['sales_doc']   == null ? 0 : $row['sales_doc'],
                    'Item'       => $row['item']        == null ? 0 : $row['item'],
                    'Material_Description' => $row['material_description'] == null ? 0 : $row['material_description'],
                ]
            );
        }
    }
}
// Tgl OBC	Material	Order	No OBC	SERI	WARNA	RPB	HJE	BPB	KODE_PABRIK	JHT	QTY PESAN	RENCET	Tgl JTempo	Perso  non Perso	Perekat	GR	No Pelat	Type	Created On	Sales Doc.	Item	Material description