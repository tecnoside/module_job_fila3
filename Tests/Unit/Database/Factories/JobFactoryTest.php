<?php

namespace Modules\Job\Tests\Unit\Database\Factories;

use Modules\Job\Database\Factories\JobFactory;
use Tests\TestCase;

/**
 * Class JobFactoryTest.
 *
 * @covers \Modules\Job\Database\Factories\JobFactory
 */
final class JobFactoryTest extends TestCase
{
    private JobFactory $jobFactory;

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
        $this->jobFactory = new JobFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobFactory);
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
