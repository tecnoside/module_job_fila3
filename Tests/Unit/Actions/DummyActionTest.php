<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Job\Actions;

use Modules\Job\Actions\DummyAction;
use Tests\TestCase;

/**
 * Class DummyActionTest.
 *
 * @covers \Modules\Job\Actions\DummyAction
 */
final class DummyActionTest extends TestCase
{
    private DummyAction $dummyAction;

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
        $this->dummyAction = new DummyAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->dummyAction);
    }

    public function testExecute(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }
}
