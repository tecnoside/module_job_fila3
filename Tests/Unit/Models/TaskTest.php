<?php

namespace Tests\Unit\Modules\Job\Models;

use Modules\Job\Models\Task;
use Tests\TestCase;

/**
 * Class TaskTest.
 *
 * @covers \Modules\Job\Models\Task
 */
final class TaskTest extends TestCase
{
    private Task $task;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->task = new Task();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->task);
    }

    public function testGetActivatedAttribute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetUpcomingAttribute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testFrequencies(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testResults(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetLastResultAttribute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetAverageRuntimeAttribute(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRouteNotificationForMail(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRouteNotificationForNexmo(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRouteNotificationForSlack(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testAutoCleanup(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
