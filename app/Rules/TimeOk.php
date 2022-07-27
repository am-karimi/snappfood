<?php

namespace App\Rules;

use App\Models\WorkingHours;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Query\Builder;

class TimeOk implements Rule
{

    public $day;
    public $restautant_id;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($object)
    {
        $this->day = $object->day;
        $this->restautant_id = $object->restaurant;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $search = WorkingHours::where('day', $this->day)
            ->where('restaurant_id', $this->restautant_id)
            ->where(function ( $query) use ($value) {
                $query->where('open_time', '<=', $value)
                    ->orWhere('close_time', '>=', $value);
            })->get();

        $search = count($search);
        return $search > 0 ? false : true;
    }


    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'This Time Is Already Set';
    }
}
