<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlaceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'alamat' => 'required',
            'gmaps_link' => 'required|url:https',
            'deskripsi' => 'required',
            'image' => 'required|image|file|max:2048',
            'harga_tiket' => 'required|numeric|integer',
            'jam_buka' => 'required|date_format:H:i',
            'jam_tutup' => 'required|date_format:H:i|after:jam_buka',
            'jumlah_tiket_weekday' => 'required|numeric|integer',
            'jumlah_tiket_weekend' => 'required|numeric|integer'
        ];
    }
}
