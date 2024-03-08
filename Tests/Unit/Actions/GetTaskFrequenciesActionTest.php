<?php

declare(strict_types=1);

namespace Tests\Unit\Modules\Job\Actions;

use Modules\Job\Actions\GetTaskFrequenciesAction;
use Tests\TestCase;

/**
 * Class GetTaskFrequenciesActionTest.
 *
 * @covers \Modules\Job\Actions\GetTaskFrequenciesAction
 */
final class GetTaskFrequenciesActionTest extends TestCase
{
    private GetTaskFrequenciesAction $getTaskFrequenciesAction;

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
        $this->getTaskFrequenciesAction = new GetTaskFrequenciesAction();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->getTaskFrequenciesAction);
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
