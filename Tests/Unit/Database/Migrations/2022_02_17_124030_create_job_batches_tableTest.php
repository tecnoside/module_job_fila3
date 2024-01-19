<?php

namespace Tests\Unit;

use CreateJobBatchesTable;
use Tests\TestCase;

/**
 * Class CreateJobBatchesTableTest.
 *
 * @covers \CreateJobBatchesTable
 */
final class CreateJobBatchesTableTest extends TestCase
{
    private CreateJobBatchesTable $createJobBatchesTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createJobBatchesTable = new CreateJobBatchesTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createJobBatchesTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
