<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Job\Events;

use Modules\Job\Events\PublicEvent;
use Tests\TestCase;

/**
 * Class PublicEventTest.
 *
 * @covers \Modules\Job\Events\PublicEvent
 */
final class PublicEventTest extends TestCase
{
    private PublicEvent $publicEvent;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /**
*
         *
 * @todo Correctly instantiate tested object to use it.
*/
        $this->publicEvent = new PublicEvent();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->publicEvent);
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
