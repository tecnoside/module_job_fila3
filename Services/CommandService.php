<?php

declare(strict_types=1);

namespace Modules\Job\Services;

use App\Console\Kernel;
use function Safe\preg_grep;
use Webmozart\Assert\Assert;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

class CommandService
{
    public static function get(): Collection
    {
        $commands = collect(app(Kernel::class)->all())->sortKeys();
        $commandsKeys = $commands->keys()->toArray();
        if(config('job::commands.show_supported_only')){
            Assert::isArray($commands_supported=config('job::commands.supported'));

            foreach ($commands_supported as $supported) {
                $commandsKeys = preg_grep("/^$supported/", $commandsKeys);
            }
        }else{
            Assert::isArray($commands_exlude=config('job::commands.exclude'));
            foreach ($commands_exlude as $exclude) {
                $commandsKeys = preg_grep("/^$exclude/", $commandsKeys, PREG_GREP_INVERT);
            }
        }

        return $commands->only($commandsKeys)
            ->map(function ($command) {
                return [
                    'name' => $command->getName(),
                    'description' => $command->getDescription(),
                    'signature' => $command->getSynopsis(),
                    'full_name' =>$command->getName().' ('.$command->getDescription().")",
                    'arguments' => static::getArguments($command),
                    'options' => static::getOptions($command),
                ];
            });
    }

    /**
     * Undocumented function
     *
     * @param Command $command
     * @return array
     */
    protected static function getArguments($command): array
    {
        $arguments =[];
        foreach ($command->getDefinition()->getArguments() as $argument) {
            $arguments[] = [
                'name' => $argument->getName(),
                'default' => $argument->getDefault(),
                'required' => $argument->isRequired()
            ];
        }

        return $arguments;
    }



    /**
     * Undocumented function
     *
     * @param Command $command
     * @return array
     */
    protected static function getOptions($command): array
    {
        $options = [
            'withValue' => [],
            'withoutValue' => [
              'verbose', 'quiet', 'ansi', 'no-ansi',
            ]
        ];
        foreach ($command->getDefinition()->getOptions() as $option) {
            if ($option->acceptValue()) {
                $options['withValue'][] = (object)[
                    'name' => $option->getName(),
                    'default' => $option->getDefault(),
                    'required' => $option->isValueRequired()
                ];
            } else {
                $options['withoutValue'][] = $option->getName();
            }
        }

        return $options;
    }
}
