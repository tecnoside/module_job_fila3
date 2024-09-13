<?php

declare(strict_types=1);

namespace Modules\Job\Actions\Command;

use App\Console\Kernel;
use Modules\Job\Datas\CommandData;
use Spatie\LaravelData\DataCollection;
use Spatie\QueueableAction\QueueableAction;
use Webmozart\Assert\Assert;

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
        if ($commandsKeys === null) {
            return CommandData::collection([]);
        }
        Assert::isArray($commandsKeys, '['.__LINE__.']['.class_basename($this).']');

        $commands = $commands
            ->only($commandsKeys)
            ->map(fn ($command): array => [
                'name' => $command->getName(),
                'description' => $command->getDescription(),
                'signature' => $command->getSynopsis(),
                'full_name' => $command->getName().' - '.$command->getDescription(),
                'arguments' => app(GetCommandArgumentsActions::class)->execute($command),
                'options' => app(GetCommandOptionsActions::class)->execute($command),
            ]);

        return CommandData::collection($commands);
    }
}
