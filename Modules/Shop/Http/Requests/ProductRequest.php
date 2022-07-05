<?php

namespace Modules\Shop\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        $id = $_POST['id'];
        return [
            'title_ru' => 'required|string|min:3|max:200',
            'description_ru' => 'nullable|string|min:3|max:300',
            'content_ru' => 'nullable|string|min:3|max:5000',
            'title_uk' => 'required|string|min:3|max:200',
            'description_uk' => 'nullable|string|min:3|max:300',
            'content_uk' => 'nullable|string|min:3|max:5000',
            'slug' => [
                'max:200',
                Rule::unique('products')->ignore($id),
            ],
            'img' => 'nullable|string|min:3|max:200',
            'sort' => 'required|integer',
            'category_id' => 'required|integer',
            'price' => 'required|integer',
            'time_site' => 'nullable|integer',
            'url_site' => 'nullable|string',
            'cms_site' => 'nullable|string',
            'type_site' => 'nullable|string',
        ];
    }
}
