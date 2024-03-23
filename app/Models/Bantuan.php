<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bantuan extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function pendudukse()
    {
        return $this->belongsTo(Penduduk::class, 'id_penduduk', 'id');
    }
}
