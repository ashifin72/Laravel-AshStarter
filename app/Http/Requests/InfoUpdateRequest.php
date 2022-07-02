<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoUpdateRequest extends FormRequest
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
            'title_ru' => 'required|min:3|max:50|string',
            'title_uk' => 'required|min:3|max:50|string',
            'img' => 'required|min:3|max:250|string',
            'img_head' => 'nullable|min:3|max:250|string',
            'img_footer' => 'nullable|min:3|string',
            'description_ru' => 'nullable|string|min:8|max:400',
            'description_uk' => 'nullable|string|min:8|max:400',
            'operating_time_ru' => 'required|string|min:8|max:400',
            'operating_time_uk' => 'required|string|min:8|max:400',
            'slogan_ru' => 'nullable|string|min:8|max:400',
            'slogan_uk' => 'nullable|string|min:8|max:400',
            'data_phone1' => 'nullable|string|min:8',
            'data_phone2' => 'nullable|min:8',
            'data_phone3' => 'nullable|min:8',
            'head_code' => 'nullable|min:8',
            'footer_code' => 'nullable|min:8',
            'instagram' => 'nullable|active_url',
            'facebook' => 'nullable|active_url',
            'youtube' => 'nullable|active_url',
            'data_email' => 'nullable|email',
        ];
    }
}
