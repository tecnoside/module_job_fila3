<?php

declare(strict_types=1);

namespace Modules\Job\Actions;

use Exception;
use Spatie\QueueableAction\QueueableAction;

class GetTaskFrequenciesAction
{
    use QueueableAction;

    public function execute(): array
    {
        $res = config('totem.frequencies');
        if (is_array($res)) {
            return $res;
        }

        throw new Exception('[' . __LINE__ . '][' . class_basename($this) . ']');
    }
}
