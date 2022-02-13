<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwals';
    protected $fillable = ['kereta_id', 'stasiun_asal_id', 'stasiun_tujuan_id', 'tanggal', 'jam'];

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'kereta_id');
    }
    public function stasiun_asal()
    {
        return $this->belongsTo(Stasiun::class, 'stasiun_asal_id');
    }

    public function stasiun_tujuan()
    {
        return $this->belongsTo(Stasiun::class, 'stasiun_tujuan_id');
    }
}
