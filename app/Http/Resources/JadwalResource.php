<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class JadwalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'stasiun_asal' => $this->stasiun_asal->nama,
            'stasiun_tujuan' => $this->stasiun_tujuan->nama,
            'kereta' => $this->kereta->nama,
            'tanggal' => $this->tanggal,
            'jam' => $this->jam
        ];
    }
}
