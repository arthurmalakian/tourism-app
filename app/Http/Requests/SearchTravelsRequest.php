<?php

namespace App\Http\Requests;

use App\Rules\AvailableStopsRule;
use App\Rules\TodayOrAfterRule;
use Illuminate\Foundation\Http\FormRequest;

class SearchTravelsRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'from' => ['required', new AvailableStopsRule()],
            'to' => ['required', new AvailableStopsRule()],
            'travelDate' => ['required', new TodayOrAfterRule()],
        ];
    }
}
