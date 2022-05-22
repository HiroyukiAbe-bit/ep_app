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
            'first_name' => 'required|regex:/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/|max:10',
            'last_name' => 'required|regex:/^[ぁ-んァ-ヶー一-龠a-zA-Z]+$/|max:10',
            'address' => 'required|max:100',
            'tel' => 'required|regex:/^[0-9]{2,4}-[0-9]{2,4}-[0-9]{3,4}$/|max:20',
            'prefecture' => 'required',
            'allergy' => 'nullable',
            'other_allergy' => 'nullable',
            'attendance' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => ':attributeは必ず入力してください。',
            'first_name.regex' => ':attributeは文字で入力してください。',
            'first_name.max' => ':attributeは10文字以内で入力してください。',
            'last_name.regex' => ':attributeは文字で入力してください。',
            'last_name.required' => ':attributeは必ず入力してください。',
            'last_name.max' => ':attributeは10文字以内で入力してください。',
            'address.required' => ':attributeは必ず入力してください。',
            'address.max' => ':attributeは100文字以内で入力してください。',

            'tel.required' => ':attributeは必ず入力してください。',
            'tel.regex' => ':attributeは○○○-□□□-△△△△の形式で入力してください。',
            'tel.max' => ':attributeは20文字以内で入力してください。',
            'prefecture.required' => ':attributeは必ず選択してください。', 
            'attendance.required' => ':attributeは必ず選択してください。'

        ];
    }

    public function attributes()
    {
        return [
            'first_name' => '名前',
            'last_name' => '名字',
            'address' => '住所',
            'tel' => '電話番号',
            'prefecture' => '都道府県',
            'attendance' => 'ご出席・ご欠席'
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

