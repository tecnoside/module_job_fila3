<?php

namespace Tests\Unit\Modules\Job\Events;

use Modules\Job\Events\PrivateEvent;
use Tests\TestCase;

/**
 * Class PrivateEventTest.
 *
 * @covers \Modules\Job\Events\PrivateEvent
 */
final class PrivateEventTest extends TestCase
{
    private PrivateEvent $privateEvent;

    private string $message;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->message = '42';
        $this->privateEvent = new PrivateEvent($this->message);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->privateEvent);
        unset($this->message);
    }

    public function testBroadcastOn(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }
}
