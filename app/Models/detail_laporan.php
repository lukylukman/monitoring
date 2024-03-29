<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_laporan extends Model
{
    use HasFactory;

    protected $fillable = ['laporan_id', 'NOPO', 'OBC', 'SERI', 'Personalisasi', 'GR', 'tanggal_laporan'];
    public $primaryKey = 'NOPO';
    public $incrementing = false;

    public function laporan()
    {
        return $this->belongsTo(laporan::class);
    }
}
