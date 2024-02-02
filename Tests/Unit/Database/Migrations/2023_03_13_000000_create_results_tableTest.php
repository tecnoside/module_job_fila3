<?php

namespace Tests\Unit;

use CreateResultsTable;
use Tests\TestCase;

/**
 * Class CreateResultsTableTest.
 *
 * @covers \CreateResultsTable
 */
final class CreateResultsTableTest extends TestCase
{
    private CreateResultsTable $createResultsTable;

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
        $this->createResultsTable = new CreateResultsTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createResultsTable);
    }

    public function testUp(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }
}
