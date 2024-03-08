<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Http\Livewire;

use Modules\Job\Http\Livewire\Broad;
use Tests\TestCase;

/**
 * Class BroadTest.
 *
 * @covers \Modules\Job\Http\Livewire\Broad
 */
final class BroadTest extends TestCase
{
    private Broad $broad;

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
        $this->broad = new Broad();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->broad);
    }

    public function testRender(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }

    public function testTry(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }

    public function testNotifyEvent(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }
}
