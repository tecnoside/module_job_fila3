<?php

declare(strict_types=1);

namespace Modules\Job\Services;

use App\Console\Kernel;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

use function Safe\preg_grep;

use Webmozart\Assert\Assert;

class CommandService
{
    public static function get(): Collection
    {
        $commands = collect(app(Kernel::class)->all())->sortKeys();
        $commandsKeys = $commands->keys()->toArray();

        if (config('job::commands.show_supported_only')) {
            Assert::isArray($commandsSupported = config('job::commands.supported'));

            foreach ($commandsSupported as $supported) {
                $commandsKeys = preg_grep("/^$supported/", $commandsKeys);
            }
        } else {
            Assert::isArray($commandsExclude = config('job::commands.exclude'));
            foreach ($commandsExclude as $exclude) {
                $commandsKeys = preg_grep("/^$exclude/", $commandsKeys, PREG_GREP_INVERT);
            }
        }

        return $commands->only($commandsKeys)
            ->map(fn (Command $command): array => [
                'name' => $command->getName(),
                'description' => $command->getDescription(),
                'signature' => $command->getSynopsis(),
                'full_name' => $command->getName().' ('.$command->getDescription().')',
                'arguments' => self::getArguments($command),
                'options' => self::getOptions($command),
            ]);
    }

    /**
     * Get the arguments of a command.
     */
    protected static function getArguments(Command $command): array
    {
        $arguments = [];
        foreach ($command->getDefinition()->getArguments() as $argument) {
            $arguments[] = [
                'name' => $argument->getName(),
                'default' => $argument->getDefault(),
                'required' => $argument->isRequired(),
            ];
        }

        return $arguments;
    }

    /**
     * Get the options of a command.
     */
    protected static function getOptions(Command $command): array
    {
        $options = [
            'withValue' => [],
            'withoutValue' => [
                'verbose', 'quiet', 'ansi', 'no-ansi',
            ],
        ];
        foreach ($command->getDefinition()->getOptions() as $option) {
            if ($option->acceptValue()) {
                $options['withValue'][] = (object) [
                    'name' => $option->getName(),
                    'default' => $option->getDefault(),
                    'required' => $option->isValueRequired(),
                ];
            } else {
                $options['withoutValue'][] = $option->getName();
            }
        }

        return $options;
    }
}
