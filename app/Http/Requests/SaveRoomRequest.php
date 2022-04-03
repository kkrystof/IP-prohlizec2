<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Validation\Rule;

class SaveRoomRequest extends FormRequest
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
            'name' => 'required',
            'no' => ['sometimes','required', Rule::unique('room', 'no')->ignore((isset($this->room->room_id)? $this->room->room_id : null), 'room_id')],
            'phone' => ['nullable', Rule::unique('room', 'phone')->ignore((isset($this->room->room_id)? $this->room->room_id : null), 'room_id')],
        ];
    }

    public function messages()
    {
        return [
                'required' => 'Pole je povinne!',
                'unique' => 'Jiz existuje, zvolte jinou hodnotu.',
                'unique' => 'Jiz existuje, zvolte jinou hodnotu.',
        ];
    }
}
