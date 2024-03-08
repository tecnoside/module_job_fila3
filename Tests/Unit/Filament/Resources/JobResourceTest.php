<?php

declare(strict_types=1);

namespace Modules\Job\Tests\Unit\Filament\Resources;

use Modules\Job\Filament\Resources\JobResource;
use Tests\TestCase;

/**
 * Class JobResourceTest.
 *
 * @covers \Modules\Job\Filament\Resources\JobResource
 */
final class JobResourceTest extends TestCase
{
    private JobResource $jobResource;

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
        $this->jobResource = new JobResource();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobResource);
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

    public function testGetRelations(): void
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
