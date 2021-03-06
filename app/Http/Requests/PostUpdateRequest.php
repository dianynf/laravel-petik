<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'image' => 'image|mimes:jpeg,jpg,png|max:2000',
            'title' => 'required|unique:posts,title,'.$this->post->id.',id',
            'category_id' => 'required',
            'content' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'image.image' => 'Pastikan file berupa gambar',
            'image.mimes' => 'Pastikan format gambar .jpeg, .jpg, atau .png',
            'image.max' => 'Ukuran max 2 MB',
            'title.required' => 'Judul harus diisi!',
            'title.unique'  => 'Judul ini sudah ada!',
            'category_id.required'  => 'Kategori harus diisi!',
            'content.required'  => 'Konten harus diisi!',
        ];
    }
}
