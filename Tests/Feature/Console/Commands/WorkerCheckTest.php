<?php

namespace Modules\Job\Tests\Feature\Console\Commands;

use Modules\Job\Console\Commands\WorkerCheck;
use Tests\TestCase;

/**
 * Class WorkerCheckTest.
 *
 * @covers \Modules\Job\Console\Commands\WorkerCheck
 */
final class WorkerCheckTest extends TestCase
{
    private WorkerCheck $workerCheck;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->workerCheck = new WorkerCheck();
        $this->app->instance(WorkerCheck::class, $this->workerCheck);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->workerCheck);
    }

    public function testHandle(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $this->artisan('worker:check')
            ->expectsOutput('Some expected output')
            ->assertExitCode(0);
    }
}
