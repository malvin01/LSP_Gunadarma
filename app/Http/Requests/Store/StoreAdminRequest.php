<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreAdminRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:8'],
            'nama' => ['required', 'string', 'max:32'],
            'nomor_telepon' => ['required', 'string', 'max:15'],
            'nik' => ['required', 'string', 'max:16'],
            'alamat' => ['required', 'string', 'max:64'],
            'jenis_kelamin' => ['required', 'in:0,1'],
            'password' => ['required', 'string', 'confirmed', Password::min(8)
                ->mixedCase()
                ->letters()
                ->numbers()
                ->symbols()
                ->uncompromised(),
            ],
        ];
    }
}
