<?php

namespace Tests\Unit\Modules\Job\Actions;

use Modules\Job\Actions\GetTaskCommandsAction;
use Tests\TestCase;

/**
 * Class GetTaskCommandsActionTest.
 *
 * @covers \Modules\Job\Actions\GetTaskCommandsAction
 */
final class GetTaskCommandsActionTest extends TestCase
{
    private GetTaskCommandsAction $getTaskCommandsAction;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->getTaskCommandsAction = new GetTaskCommandsAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getTaskCommandsAction);
    }

    public function testExecute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
