<?php

namespace App\Http\Requests\Event;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'event_name' =>'required|string|max:255',
            'event_start_time' =>'required|date|after_or_equal:today',
            'event_link' =>'nullable|url|max:255',
            'event_description' =>'nullable|string|max:2000',
        ];
    }
}
