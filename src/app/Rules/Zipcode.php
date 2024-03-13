<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Zipcode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // return preg_match('/^\d{3}[-]\d{4}$/', $value);
    }

    public function message()
    {
        return ':attributeの書式に誤りがあります';
    }
}
