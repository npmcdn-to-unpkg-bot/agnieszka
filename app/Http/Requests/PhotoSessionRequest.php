<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PhotoSessionRequest extends Request
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
            'title' => 'required|min:5',
            'category' => 'required',
            'client' => 'required',
            'date' => 'required|date',
            'photo_download_limit' => 'required|integer',
            'expiry_date' => 'required|date'
        ];
    }
}
