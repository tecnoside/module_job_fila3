<?php

namespace Tests\Unit;

use CreateJobsTable;
use Tests\TestCase;

/**
 * Class CreateJobsTableTest.
 *
 * @covers \CreateJobsTable
 */
final class CreateJobsTableTest extends TestCase
{
    private CreateJobsTable $createJobsTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createJobsTable = new CreateJobsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createJobsTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
