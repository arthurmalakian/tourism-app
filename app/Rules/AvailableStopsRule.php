<?php

namespace App\Rules;

use App\Services\QueroPassagemImpl as QueroPassagemService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class AvailableStopsRule implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!$this->isDistrictAvailable($value)){
            $fail('Serviço indisponível para essa localização.');
        }
    }

    private function isDistrictAvailable($stop_code)
    {
        $AvailableStopDistricts = ['SP','PR'];
        $queroPassagemService = new QueroPassagemService();
        $stop = $queroPassagemService->getStop($stop_code);
        return in_array($stop['state'],$AvailableStopDistricts);
    }
}
