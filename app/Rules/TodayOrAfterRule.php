<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TodayOrAfterRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!$this->isDateTodayOrAfter($value)){
            $fail('A data deve ser futura.');
        }
    }

    private function isDateTodayOrAfter($date)
    {
        return Carbon::createFromFormat('d/m/Y',$date)->gt(Carbon::today());
    }
}
