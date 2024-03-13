<?php

namespace Tests\Unit\Modules\Job\Models;

use Modules\Job\Models\JobBatch;
use Tests\TestCase;

/**
 * Class JobBatchTest.
 *
 * @covers \Modules\Job\Models\JobBatch
 */
final class JobBatchTest extends TestCase
{
    private JobBatch $jobBatch;

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
        $this->jobBatch = new JobBatch();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobBatch);
    }

    public function testProcessedJobs(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testProgress(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testHasPendingJobs(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testFinished(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testHasFailures(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testFailed(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }

    public function testCancelled(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }
}
