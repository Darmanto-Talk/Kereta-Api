<?php

namespace App\Http\Requests\kereta;

use Illuminate\Foundation\Http\FormRequest;

class KeretaUpdateRequest extends FormRequest
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
            'nopol' => 'required|min:6|max:6|unique:keretas,nopol,' . request('id'),
            'nama' => 'required',
            'kelas' => 'required'
        ];
    }
}
