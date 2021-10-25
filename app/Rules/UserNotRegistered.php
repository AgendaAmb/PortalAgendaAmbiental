<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UserNotRegistered implements Rule
{
    /**
     * User type
     * 
     * @var string
     */
    private $user_type;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($user_type)
    {
        $this->user_type = $user_type;
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
        return DB::table('users')
            ->where('id', $value)
            ->where('type', $this->user_type)
            ->count() === 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'User not found';
    }
}
