<?php
/**
 * @see https://github.com/husam-tariq/filament-database-schedule/blob/v2.0.0/src/Console/Commands/PhpUnitTestJobCommand.php
 */

declare(strict_types=1);

namespace Modules\Job\Console\Commands;

use Illuminate\Console\Command;

class PhpUnitTestJobCommand extends Command
{
    /**
     * The name and signature of the console command.
<<<<<<< HEAD
     *
     * @var string
     */
=======
    * @var string
 */
>>>>>>> 21140ac (first)
    protected $signature = 'phpunit:test {argument} {argumentWithDefault=Default value} {optionalArgument?}';

    /**
     * The console command description.
<<<<<<< HEAD
     *
     * @var string
     */
=======
     * @var string
*/
>>>>>>> 21140ac (first)
    protected $description = 'Command for testing the phpunit feature.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
<<<<<<< HEAD
        // $this->info('Argument required: '.$this->argument('argument'));
        // $this->info('Argument with default: '.$this->argument('argumentWithDefault'));

        return 0;
    }
}
=======
        //$this->info('Argument required: '.$this->argument('argument'));
        //$this->info('Argument with default: '.$this->argument('argumentWithDefault'));

        return 0;
    }
}
>>>>>>> 21140ac (first)
