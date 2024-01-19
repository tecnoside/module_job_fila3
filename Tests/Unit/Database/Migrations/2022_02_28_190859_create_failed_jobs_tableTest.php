<?php

namespace Tests\Unit;

use CreateFailedJobsTable;
use Tests\TestCase;

/**
 * Class CreateFailedJobsTableTest.
 *
 * @covers \CreateFailedJobsTable
 */
final class CreateFailedJobsTableTest extends TestCase
{
    private CreateFailedJobsTable $createFailedJobsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createFailedJobsTable = new CreateFailedJobsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createFailedJobsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
