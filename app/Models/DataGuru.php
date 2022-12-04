<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataGuru extends Model
{
    use HasFactory;
    protected $table = 'data_guru';

    protected $fillable = [
        'nama',
        'pns_gtt',
    ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_guru');
    }
}
