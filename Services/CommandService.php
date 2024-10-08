<?php

declare(strict_types=1);

namespace Modules\Job\Services;

use App\Console\Kernel;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
<<<<<<< HEAD
use Webmozart\Assert\Assert;

use function Safe\preg_grep;

=======

use function Safe\preg_grep;

use Webmozart\Assert\Assert;

>>>>>>> origin/dev
class CommandService
{
    public static function get(): Collection
    {
        $commands = collect(app(Kernel::class)->all())->sortKeys();
        $commandsKeys = $commands->keys()->toArray();
<<<<<<< HEAD
        if (config('job::commands.show_supported_only')) {
            Assert::isArray($commands_supported = config('job::commands.supported'));

            foreach ($commands_supported as $supported) {
                $commandsKeys = preg_grep("/^$supported/", $commandsKeys);
            }
        } else {
            Assert::isArray($commands_exlude = config('job::commands.exclude'));
            foreach ($commands_exlude as $exclude) {
=======

        if (config('job::commands.show_supported_only')) {
            Assert::isArray($commandsSupported = config('job::commands.supported'));

            foreach ($commandsSupported as $supported) {
                $commandsKeys = preg_grep("/^$supported/", $commandsKeys);
            }
        } else {
            Assert::isArray($commandsExclude = config('job::commands.exclude'));
            foreach ($commandsExclude as $exclude) {
>>>>>>> origin/dev
                $commandsKeys = preg_grep("/^$exclude/", $commandsKeys, PREG_GREP_INVERT);
            }
        }

        return $commands->only($commandsKeys)
<<<<<<< HEAD
            ->map(fn ($command): array => [
=======
            ->map(fn (Command $command): array => [
>>>>>>> origin/dev
                'name' => $command->getName(),
                'description' => $command->getDescription(),
                'signature' => $command->getSynopsis(),
                'full_name' => $command->getName().' ('.$command->getDescription().')',
<<<<<<< HEAD
                'arguments' => static::getArguments($command),
                'options' => static::getOptions($command),
=======
                'arguments' => self::getArguments($command),
                'options' => self::getOptions($command),
>>>>>>> origin/dev
            ]);
    }

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
     * @param  Command  $command
     */
    protected static function getArguments($command): array
=======
     * Get the arguments of a command.
     */
    protected static function getArguments(Command $command): array
>>>>>>> origin/dev
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
<<<<<<< HEAD
     * Undocumented function.
     *
     * @param  Command  $command
     */
    protected static function getOptions($command): array
=======
     * Get the options of a command.
     */
    protected static function getOptions(Command $command): array
>>>>>>> origin/dev
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
