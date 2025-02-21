<?php

namespace App\Http\Requests;

use App\Rules\Filter;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdminProductRequest extends FormRequest
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
            "name" => ['required','string','max:255' ,new Filter(['laravel' , 'php']),Rule::unique("products" , "name")] ,
            "description" => "required|string",
            "image" => "image|nullable|mimes:png,jpg,jpeg" ,
            "price" =>"required|numeric",
            "quantity" => "required|integer",
            "category_id" => "required|exists:categories,id"
        ];
    }
    public function messages(){
        return [
            "required" => "The :attribute is required" ,
            "unique" => "The :attribute is already exists",
            "integer" => "The :attribute must be an integer"
        ];
    }
}
