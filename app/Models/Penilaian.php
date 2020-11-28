<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian';
    protected $fillable = [
        'id_penilai', 'code',
        'kelebihan', 'catatan_kelebihan',
        'kekurangan', 'catatan_kekurangan',
        'saran', 'harapan', 'tiga_kata',
    ];


    public function liquid()
    {
        return $this->belongsTo(User::class, 'id_target');
    }

    public function relasiNilai()
    {
        return $this->belongsTo(Liquid::class, 'code');
    }
}
