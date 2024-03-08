<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_datetime' => 'required|date|after_or_equal:now',
            'end_datetime' => 'required|date|after_or_equal:start_datetime',
            'type' => 'required',
            'price' => 'required|numeric|min:0',
            'tickets_available' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:png,jpeg,jpg,webp|max:2048',
            'user_id'=>'exists:users,id',
            'category_id'=> 'exists:catagories,id'
        ];
    }
}
