<?php

namespace Modules\Job\Tests\Unit\Models\Traits;

use Modules\Job\Models\Traits\FrontendSortable;
use Tests\TestCase;

/**
 * Class FrontendSortableTest.
 *
 * @covers \Modules\Job\Models\Traits\FrontendSortable
 */
final class FrontendSortableTest extends TestCase
{
    private FrontendSortable $frontendSortable;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->frontendSortable = $this->getMockBuilder(FrontendSortable::class)
            ->setConstructorArgs([])
            ->getMockForTrait();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->frontendSortable);
    }

    public function testScopeSortableBy(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
