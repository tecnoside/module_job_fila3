<?php

namespace Modules\Job\Tests\Unit\Database\Factories;

use Modules\Job\Database\Factories\JobBatchFactory;
use Tests\TestCase;

/**
 * Class JobBatchFactoryTest.
 *
 * @covers \Modules\Job\Database\Factories\JobBatchFactory
 */
final class JobBatchFactoryTest extends TestCase
{
    private JobBatchFactory $jobBatchFactory;

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
        $this->jobBatchFactory = new JobBatchFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobBatchFactory);
    }

    public function testDefinition(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::markTestIncomplete();
    }
}
