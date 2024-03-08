<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Job\Notifications;

use Modules\Job\Notifications\TaskCompleted;
use Tests\TestCase;

/**
 * Class TaskCompletedTest.
 *
 * @covers \Modules\Job\Notifications\TaskCompleted
 */
final class TaskCompletedTest extends TestCase
{
    private TaskCompleted $taskCompleted;

    private string $output;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->output = '42';
        $this->taskCompleted = new TaskCompleted($this->output);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->taskCompleted);
        unset($this->output);
    }

    public function testVia(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }

    public function testToMail(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }
}
