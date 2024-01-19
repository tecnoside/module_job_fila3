<?php

namespace Tests\Unit\Modules\Job\Actions;

use Modules\Job\Actions\ExecuteTaskAction;
use Tests\TestCase;

/**
 * Class ExecuteTaskActionTest.
 *
 * @covers \Modules\Job\Actions\ExecuteTaskAction
 */
final class ExecuteTaskActionTest extends TestCase
{
    private ExecuteTaskAction $executeTaskAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->executeTaskAction = new ExecuteTaskAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->executeTaskAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
