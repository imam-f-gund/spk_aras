<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    use HasFactory;
    protected $table = 'nilai';

    protected $fillable = [
        'id_guru',
        'id_kriteria',
        'id_periode',
        'nilai',
        'normalisasi_kriteria',
        'normalisasi_bobot',
    ];

    public function guru()
    {
        return $this->belongsTo(DataGuru::class, 'id_guru');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
