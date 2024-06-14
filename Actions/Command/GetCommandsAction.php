<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Command;

use App\Console\Kernel;
use Modules\Job\Datas\CommandData;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;

class GetCommandsAction
{
    use QueueableAction;

    /**
     * @return DataCollection<CommandData>
     */
    public function execute(): DataCollection
    {
        $commands = collect(app(Kernel::class)->all())->sortKeys();
        $commandsKeys = $commands->keys()->toArray();
        // foreach (config('filament-database-schedule.commands.exclude') as $exclude) {
        //    $commandsKeys = preg_grep("/^$exclude/", $commandsKeys, PREG_GREP_INVERT);
        // }
        if (null == $commandsKeys) {
            return CommandData::collection([]);
        }

        $commands = $commands
            ->only($commandsKeys)
            ->map(function ($command) {
                return [
                    'name' => $command->getName(),
                    'description' => $command->getDescription(),
                    'signature' => $command->getSynopsis(),
                    'full_name' => $command->getName().' - '.$command->getDescription(),
                    'arguments' => app(GetCommandArgumentsActions::class)->execute($command),
                    'options' => app(GetCommandOptionsActions::class)->execute($command),
                ];
            });

        return CommandData::collection($commands);
    }
}
