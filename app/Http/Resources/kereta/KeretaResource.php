<?php

namespace App\Http\Resources\kereta;

use Illuminate\Http\Resources\Json\JsonResource;

class KeretaResource extends JsonResource
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
            'nopol' => $this->nopol,
            'nama' => $this->nama,
            'kelas' => $this->kelas
        ];
    }
}
