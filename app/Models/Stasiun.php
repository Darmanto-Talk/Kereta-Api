<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stasiun extends Model
{
    use HasFactory;
    protected $table = 'stasiuns';
    protected $fillable = ['nama'];

    public function jadwal_keberangkatan()
    {
        return $this->belongsTo(Jadwal::class, 'stasiun_asal_id');
    }

    public function jadwal_kedatangan()
    {
        return $this->belongsTo(Jadwal::class, 'stasiun_asal_id');
    }
}
