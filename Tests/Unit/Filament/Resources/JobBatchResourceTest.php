<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Filament\Resources;

use Modules\Job\Filament\Resources\JobBatchResource;
use Tests\TestCase;

/**
 * Class JobBatchResourceTest.
 *
 * @covers \Modules\Job\Filament\Resources\JobBatchResource
 */
final class JobBatchResourceTest extends TestCase
{
    private JobBatchResource $jobBatchResource;

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
        $this->jobBatchResource = new JobBatchResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobBatchResource);
    }

    public function testTable(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }

    public function testGetPages(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }

    public function testGetNavigationBadge(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
    }
}
