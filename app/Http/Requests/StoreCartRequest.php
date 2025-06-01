<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCartRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            //
            'nama_menu_222339' => 'required',
            'username_222339' => 'required',
            'kode_222339' => 'required|exists:carts_222339,kode_222339',
            'status_222339' => 'required',
            'jumlah_222339' => 'required',
            'total_222339' => 'required',
            'tanggal_222339' => 'required',

        ];
    }
}
