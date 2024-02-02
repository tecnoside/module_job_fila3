<?php

namespace Modules\Job\Tests\Unit\Database\Factories;

use Modules\Job\Database\Factories\FailedJobFactory;
use Tests\TestCase;

/**
 * Class FailedJobFactoryTest.
 *
 * @covers \Modules\Job\Database\Factories\FailedJobFactory
 */
final class FailedJobFactoryTest extends TestCase
{
    private FailedJobFactory $failedJobFactory;

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
        $this->failedJobFactory = new FailedJobFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->failedJobFactory);
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
