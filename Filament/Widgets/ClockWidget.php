<?php
/**
 * @see https://www.freshleafmedia.co.uk/blog/streaming-laravel-command-output-to-the-browser
 */

declare(strict_types=1);

namespace Modules\Job\Filament\Widgets;

use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Process;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\StreamOutput;

class ClockWidget extends Widget
{
    protected static string $view = 'job::filament.widgets.clock-widget';
    public $time = '---';

    public bool $run = false;

    public function begin()
    {
        $this->beginProcess();
    }

    public function beginProcess()
    {
        $this->time = '';
        $process = Process::path(base_path())
            ->start('php artisan queue:listen');
        while ($process->running()) {
            // ...
            $this->stream(
                to: 'count',
                content: $this->time,
                replace: true,
            );
            // Pause for 1 second between numbers...
            sleep(3); // se no troppe richieste

            $this->time .= $process->latestOutput();
        }

        $result = $process->wait();
    }

    public function beginStream()
    {
        $this->run = ! $this->run;
        // $output = new BufferedOutput();
        /*
        $output = new class() extends StreamOutput {
            public function __construct()
            {
                parent::__construct(fopen('php://output', 'w'));
            }

            protected function doWrite(string $message, bool $newline): void
            {
                if ('' != $message) {
                    dddx($message);
                }

                $message = str_replace("\n", '<br>', $message);

                if ($newline) {
                    $message .= '<br>';
                }

                parent::doWrite($message, false);
            }
        };
        */
        $output = new StreamOutput(fopen('php://stdout', 'w'));
        // $output = new StreamOutput(fopen('/path/to/output.log', 'a', false));

        Artisan::call('route:list', [], $output);

        dddx($output);

        return;
        // dddx($output);
        // dddx($output->fetch());
        while ($this->run) {
            // Stream the current count to the browser...
            $this->stream(
                to: 'count',
                content: $this->time,
                replace: true,
            );

            // Pause for 1 second between numbers...
            sleep(1);

            // Decrement the counter...
            // $this->time = (string) Carbon::now()->format('H:i:s');
            $this->time = $output->fetch().PHP_EOL;
        }
    }
}
