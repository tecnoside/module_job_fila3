<?php

namespace Tests\Unit;

use CreateParametersTable;
use Tests\TestCase;

/**
 * Class CreateParametersTableTest.
 *
 * @covers \CreateParametersTable
 */
final class CreateParametersTableTest extends TestCase
{
    private CreateParametersTable $createParametersTable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->createParametersTable = new CreateParametersTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createParametersTable);
    }

    public function testUp(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
