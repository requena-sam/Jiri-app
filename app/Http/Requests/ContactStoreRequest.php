<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;


class ContactStoreRequest extends FormRequest
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
            "first_name" => "required|between:3,255",
            "last_name" => "required|between:3,255",
            "email" => "required|email",
            "image" => ["required", File::image()
                ->min('1kb')
                ->max('2mb')
                ->dimensions(Rule::dimensions()->maxWidth(1000)->maxHeight(1000))],
        ];
    }
}
