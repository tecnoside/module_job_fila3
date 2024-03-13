<?php

namespace Tests\Unit\Modules\Job\Models;

use Modules\Job\Models\Result;
use Tests\TestCase;

/**
 * Class ResultTest.
 *
 * @covers \Modules\Job\Models\Result
 */
final class ResultTest extends TestCase
{
    private Result $result;

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
        $this->result = new Result();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->result);
    }

    public function testTask(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testGetLastRun(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testGetAverageRunTime(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }
}
