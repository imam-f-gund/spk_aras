<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = 'periode';

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_periode');
    }
}
