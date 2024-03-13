<?php

namespace Modules\Job\Tests\Unit\Database\Factories;

use Modules\Job\Database\Factories\FrequencyFactory;
use Tests\TestCase;

/**
 * Class FrequencyFactoryTest.
 *
 * @covers \Modules\Job\Database\Factories\FrequencyFactory
 */
final class FrequencyFactoryTest extends TestCase
{
    private FrequencyFactory $frequencyFactory;

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
        $this->frequencyFactory = new FrequencyFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->frequencyFactory);
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
