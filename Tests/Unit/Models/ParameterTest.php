<?php

namespace Tests\Unit\Modules\Job\Models;

use Modules\Job\Models\Parameter;
use Tests\TestCase;

/**
 * Class ParameterTest.
 *
 * @covers \Modules\Job\Models\Parameter
 */
final class ParameterTest extends TestCase
{
    private Parameter $parameter;

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
        $this->parameter = new Parameter();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->parameter);
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
}
