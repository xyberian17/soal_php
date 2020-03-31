<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class NonAlphaNumeric implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (preg_match('/[@$!%*#?&]/', $value)) {
            return true;
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Must contain nonalphanumeric (symbol) [<strong>@$!%*#?&</strong>]';
    }
}
