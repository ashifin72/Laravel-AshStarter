<?php

  namespace Modules\Shop\Http\Requests;

  use Illuminate\Foundation\Http\FormRequest;

  class CurrencyRequest extends FormRequest
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

      $id = $_POST['id'] ?? 1;
      return [
        'code' => [
          'required',
          'string',
          'max:5',
          \Illuminate\Validation\Rule::unique('currencies')->ignore($id),
        ],
        'title' => 'required|min:3|max:200|string',
        'sort' => 'required|integer',
      ];
    }
  }
