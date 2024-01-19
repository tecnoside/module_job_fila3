<?php

namespace Modules\Job\Http\Tests\Unit\Livewire\Schedule;

use Modules\Job\Http\Livewire\Schedule\Crud;
use Tests\TestCase;

/**
 * Class CrudTest.
 *
 * @covers \Modules\Job\Http\Livewire\Schedule\Crud
 */
final class CrudTest extends TestCase
{
    private Crud $crud;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->crud = new Crud();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->crud);
    }

    public function testGetFrequencies(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testTaskCreate(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testGetCommands(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testExecuteTask(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
