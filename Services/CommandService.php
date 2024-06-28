<?php

<<<<<<< HEAD
declare(strict_types=1);

namespace Modules\Job\Services;

use App\Console\Kernel;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

use function Safe\preg_grep;

use Webmozart\Assert\Assert;

=======
namespace Modules\Job\Services;

use App\Console\Kernel;
use function Safe\preg_grep;
use Webmozart\Assert\Assert;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;

>>>>>>> 21140ac (first)
class CommandService
{
    public static function get(): Collection
    {
        $commands = collect(app(Kernel::class)->all())->sortKeys();
        $commandsKeys = $commands->keys()->toArray();
<<<<<<< HEAD
        if (config('job::commands.show_supported_only')) {
            Assert::isArray($commands_supported = config('job::commands.supported'));
=======
        if(config('job::commands.show_supported_only')){
            Assert::isArray($commands_supported=config('job::commands.supported'));
>>>>>>> 21140ac (first)

            foreach ($commands_supported as $supported) {
                $commandsKeys = preg_grep("/^$supported/", $commandsKeys);
            }
<<<<<<< HEAD
        } else {
            Assert::isArray($commands_exlude = config('job::commands.exclude'));
=======
        }else{
            Assert::isArray($commands_exlude=config('job::commands.exclude'));
>>>>>>> 21140ac (first)
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
<<<<<<< HEAD
                    'full_name' => $command->getName().' ('.$command->getDescription().')',
=======
                    'full_name' =>$command->getName().' ('.$command->getDescription().")",
>>>>>>> 21140ac (first)
                    'arguments' => static::getArguments($command),
                    'options' => static::getOptions($command),
                ];
            });
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
     * @param Command $command
     */
    protected static function getArguments($command): array
    {
        $arguments = [];
=======
     * Undocumented function
     *
     * @param Command $command
     * @return array
     */
    protected static function getArguments($command): array
    {
        $arguments =[];
>>>>>>> 21140ac (first)
        foreach ($command->getDefinition()->getArguments() as $argument) {
            $arguments[] = [
                'name' => $argument->getName(),
                'default' => $argument->getDefault(),
<<<<<<< HEAD
                'required' => $argument->isRequired(),
=======
                'required' => $argument->isRequired()
>>>>>>> 21140ac (first)
            ];
        }

        return $arguments;
    }

<<<<<<< HEAD
    /**
     * Undocumented function.
     *
     * @param Command $command
=======


    /**
     * Undocumented function
     *
     * @param Command $command
     * @return array
>>>>>>> 21140ac (first)
     */
    protected static function getOptions($command): array
    {
        $options = [
            'withValue' => [],
            'withoutValue' => [
<<<<<<< HEAD
                'verbose', 'quiet', 'ansi', 'no-ansi',
            ],
        ];
        foreach ($command->getDefinition()->getOptions() as $option) {
            if ($option->acceptValue()) {
                $options['withValue'][] = (object) [
                    'name' => $option->getName(),
                    'default' => $option->getDefault(),
                    'required' => $option->isValueRequired(),
=======
              'verbose', 'quiet', 'ansi', 'no-ansi',
            ]
        ];
        foreach ($command->getDefinition()->getOptions() as $option) {
            if ($option->acceptValue()) {
                $options['withValue'][] = (object)[
                    'name' => $option->getName(),
                    'default' => $option->getDefault(),
                    'required' => $option->isValueRequired()
>>>>>>> 21140ac (first)
                ];
            } else {
                $options['withoutValue'][] = $option->getName();
            }
        }

        return $options;
    }
}
