<?php

namespace App\Http\Requests\jadwal;

use Illuminate\Foundation\Http\FormRequest;

class JadwalCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kereta_id' => 'required|integer',
            'stasiun_asal_id' => 'required|integer',
            'stasiun_tujuan_id' => 'required|integer',
            'tanggal' => 'required|date',
            'jam' => 'required|date_format:H:i',
        ];
    }
}
