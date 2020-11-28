<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Liquid extends Model
{
    use HasFactory;

    protected $table = 'liquid';
    protected $fillable = [
        'code', 'id_target', 'tanggal', 'isOpen'
    ];


    public function relasiNilai()
    {
        return $this->hasMany(Penilaian::class, 'code');
    }
}
