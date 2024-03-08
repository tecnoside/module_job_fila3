<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Job\Models;

use Modules\Job\Models\Frequency;
use Tests\TestCase;

/**
 * Class FrequencyTest.
 *
 * @covers \Modules\Job\Models\Frequency
 */
final class FrequencyTest extends TestCase
{
    private Frequency $frequency;

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
        $this->frequency = new Frequency();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->frequency);
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

    public function testParameters(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }
}
