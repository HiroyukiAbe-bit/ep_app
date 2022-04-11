<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class ValidFormRequest extends FormRequest
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
            'first_name' => 'required|max:10',
            'last_name' => 'required|max:10',
            'email' => 'required',
            'line_id' => 'required',
            'partici_number' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => ':attributeは必ず入力してください。',
            'first_name.max' => ':attributeは10文字以内で入力してください。',
            'last_name.required' => ':attributeは必ず入力してください。',
            'last_name.max' => ':attributeは10文字以内で入力してください。',
            'email.required' => ':attributeは必ず入力してください。',
            'line_id.required' => ':attributeはは必ず入力してください。',
            'partici_number.required' => ':attributeは1つ必ず選択してください。',
        ];
    }

    public function attributes()
    {
        return [
            'first_name' => 'FirstName',
            'last_name' => 'LastName',
            'email' => 'E-mail',
            'line_id' => 'LineID',
            'partici_number' => '参加方法',
        ];
    }

    /**
     * [override] バリデーション失敗時ハンドリング
     *
     * @param Validator $validator
     * @throw HttpResponseException
     * FormRequest::failedValidation()
     */
    protected function failedValidation(Validator $validator) {
        $response['status']  = 400;
        $response['statusText'] = 'Failed validation.';
        $response['errors']  = $validator->errors();
        throw new HttpResponseException(
            response()->json( $response, 200 )
        );
    }
}

