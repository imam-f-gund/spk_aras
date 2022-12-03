<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';

    protected $fillable = [
        'si',
        'ki',
        'rank',
        'id_guru',
        'id_periode',
    ];

    public function guru()
    {
        return $this->belongsTo(DataGuru::class, 'id_guru');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
