<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class TicketFormRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:2|max:40',
            'phone' => ['string','min:6', 'max:18', 'regex:/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/'],
            'msg' => 'required|string|min:2|max:1000',
        ];
    }

    public function messages()
    {
        return [
            'name.min' => '2 буквы хотя бы',
            'name.max' => 'не более 40 символов',
            'phone' => 'Введите корректный номер телефона',
            'msg.min' => '2 буквы хотя бы',
            'msg.max' => 'не более 1000 символов',
        ];
    }

    protected function failedValidation(Validator $validator) {
        $response = response()
            ->json([ 'result' => false, 'errors' => $validator->errors()], 422);

        throw (new ValidationException($validator, $response))
            ->errorBag($this->errorBag);
    }

}
