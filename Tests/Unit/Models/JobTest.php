<?php

namespace Tests\Unit\Modules\Job\Models;

use Modules\Job\Models\Job;
use Tests\TestCase;

/**
 * Class JobTest.
 *
 * @covers \Modules\Job\Models\Job
 */
final class JobTest extends TestCase
{
    private Job $job;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->job = new Job();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->job);
    }

    public function testGetTable(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
