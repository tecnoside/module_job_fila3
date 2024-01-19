<?php

namespace Tests\Unit\Modules\Job\Events;

use Modules\Job\Events\BroadcastingEvent;
use Tests\TestCase;

/**
 * Class BroadcastingEventTest.
 *
 * @covers \Modules\Job\Events\BroadcastingEvent
 */
final class BroadcastingEventTest extends TestCase
{
    private BroadcastingEvent $broadcastingEvent;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->broadcastingEvent = new BroadcastingEvent();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->broadcastingEvent);
    }

    public function testBroadcastOn(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testBroadcastWhen(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
