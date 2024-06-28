<?php
<<<<<<< HEAD

declare(strict_types=1);
=======
>>>>>>> 21140ac (first)
/**
 * @see HusamTariq\FilamentDatabaseSchedule
 */

namespace Modules\Job\Rules;

use Cron\CronExpression;
<<<<<<< HEAD
=======
use Closure;
>>>>>>> 21140ac (first)
use Illuminate\Contracts\Validation\ValidationRule;

class Corn implements ValidationRule
{
    /**
     * Run the validation rule.
     */
<<<<<<< HEAD
    public function validate(string $attribute, mixed $value, \Closure $fail): void
    {
        if (! is_string($value)) {
            $msg = 'value is not a string ['.__LINE__.']['.__FILE__.']';
            $fail($msg);

            return;
        }
        if (! CronExpression::isValidExpression($value)) {
            $msg = trans('job::schedule.validation.cron');
            if (! is_string($msg)) {
                $msg = 'WIP ['.__LINE__.']['.__FILE__.']';
=======
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if(!is_string($value)){
            $msg='value is not a string ['.__LINE__.']['.__FILE__.']';
            $fail($msg);
            return ;
        }
        if (!CronExpression::isValidExpression($value)) {
            $msg=trans('job::schedule.validation.cron');
            if(!is_string($msg)){
                $msg='WIP ['.__LINE__.']['.__FILE__.']';
>>>>>>> 21140ac (first)
            }
            $fail($msg);
        }
    }
}
