<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class ExtendedBoolean implements Rule
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
        $acceptable = [true, false, 0, 1, '0', '1', "true", "false"];

        if(gettype($value) == "string") $value = strtolower($value);

        return in_array($value, $acceptable, true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Value must be a boolean';
    }
}
