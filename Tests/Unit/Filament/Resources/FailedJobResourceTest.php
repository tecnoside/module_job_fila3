<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Filament\Resources;

use Modules\Job\Filament\Resources\FailedJobResource;
use Tests\TestCase;

/**
 * Class FailedJobResourceTest.
 *
 * @covers \Modules\Job\Filament\Resources\FailedJobResource
 */
final class FailedJobResourceTest extends TestCase
{
    private FailedJobResource $failedJobResource;

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
        $this->failedJobResource = new FailedJobResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->failedJobResource);
    }

    public function testForm(): void
    {
        /**
*
         *
 * @todo This test is incomplete.
*/
        self::markTestIncomplete();
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
