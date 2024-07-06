<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "name" => "required|string|min:3|max:50",
            "phone" => "required|numeric|digits_between:10,15",
            "email" => "required|email:filter",
            "subject" => "required|string|min:3|max:50",
            "message" => "required|string|min:3|max:500",
            "g-recaptcha-response" => "",
        ];
    }

    public function attributes()
    {
        return [
            "name" => __("front/contact.txt7"),
            "phone" => __("front/contact.txt8"),
            "email" => __("front/contact.txt9"),
            "subject" => __("front/contact.txt10"),
            "message" => __("front/contact.txt11"),
            "g-recaptcha-response" => __("front/contact.form_recaptcha"),
        ];
    }
}
