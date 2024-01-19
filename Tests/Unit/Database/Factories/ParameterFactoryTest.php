<?php

namespace Modules\Job\Tests\Unit\Database\Factories;

use Modules\Job\Database\Factories\ParameterFactory;
use Tests\TestCase;

/**
 * Class ParameterFactoryTest.
 *
 * @covers \Modules\Job\Database\Factories\ParameterFactory
 */
final class ParameterFactoryTest extends TestCase
{
    private ParameterFactory $parameterFactory;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->parameterFactory = new ParameterFactory();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->parameterFactory);
    }

    public function testDefinition(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
