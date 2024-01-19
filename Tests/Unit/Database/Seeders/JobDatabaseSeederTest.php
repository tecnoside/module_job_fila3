<?php

namespace Modules\Job\Tests\Unit\Database\Seeders;

use Modules\Job\Database\Seeders\JobDatabaseSeeder;
use Tests\TestCase;

/**
 * Class JobDatabaseSeederTest.
 *
 * @covers \Modules\Job\Database\Seeders\JobDatabaseSeeder
 */
final class JobDatabaseSeederTest extends TestCase
{
    private JobDatabaseSeeder $jobDatabaseSeeder;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->jobDatabaseSeeder = new JobDatabaseSeeder();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobDatabaseSeeder);
    }

    public function testRun(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
