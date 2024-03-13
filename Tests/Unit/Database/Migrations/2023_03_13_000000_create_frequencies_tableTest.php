<?php

namespace Tests\Unit;

use CreateFrequenciesTable;
use Tests\TestCase;

/**
 * Class CreateFrequenciesTableTest.
 *
 * @covers \CreateFrequenciesTable
 */
final class CreateFrequenciesTableTest extends TestCase
{
    private CreateFrequenciesTable $createFrequenciesTable;

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
        $this->createFrequenciesTable = new CreateFrequenciesTable();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->createFrequenciesTable);
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
