<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataorder extends Model
{
    use HasFactory;
    protected $table = 'dataorder';
    public $primaryKey = 'NOPO';
    protected $fillable = [
        'Tgl_OBC', 'Material', 'NOPO', 'OBC', 'SERI', 'WARNA', 'RPB', 'HJE', 'BPB', 'KODE_PABRIK', 'JHT', 'QTY_PESAN', 'RENCET', 'Tgl_JTempo', 'Personalisasi', 'Perekat', 'GR', 'No_Pelat', 'type', 'Created_On', 'Sales_Doc', 'Item', 'Material_Description'
    ];
    public $timestamps = false;
}
