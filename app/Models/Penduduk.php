<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penduduk extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function bantuanse()
    {
        return $this->hasOne(Bantuan::class, 'id_penduduk', 'id');
    }
}
