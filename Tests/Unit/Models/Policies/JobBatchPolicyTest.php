<?php

namespace Modules\Job\Tests\Unit\Models\Policies;

use App\User;
use Mockery;
use Modules\Job\Models\Policies\JobBatchPolicy;
use Modules\User\Models\Team;
use Tests\TestCase;

/**
 * Class JobBatchPolicyTest.
 *
 * @covers \Modules\Job\Models\Policies\JobBatchPolicy
 */
final class JobBatchPolicyTest extends TestCase
{
    private JobBatchPolicy $jobBatchPolicy;

    private User $user;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->jobBatchPolicy = new JobBatchPolicy();
        $this->user = new User();
        $this->app->instance(JobBatchPolicy::class, $this->jobBatchPolicy);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobBatchPolicy);
        unset($this->user);
    }

    public function testViewAnyWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertFalse($this->user->can('viewAny', [JobBatchPolicy::class]));
    }

    public function testViewAnyWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertTrue($this->user->can('viewAny', [JobBatchPolicy::class]));
    }

    public function testViewWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('view', $team));
    }

    public function testViewWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('view', $team));
    }

    public function testCreateWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertFalse($this->user->can('create', [JobBatchPolicy::class]));
    }

    public function testCreateWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertTrue($this->user->can('create', [JobBatchPolicy::class]));
    }

    public function testUpdateWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertFalse($this->user->can('update', [JobBatchPolicy::class]));
    }

    public function testUpdateWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        self::assertTrue($this->user->can('update', [JobBatchPolicy::class]));
    }

    public function testAddTeamMemberWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('addTeamMember', $team));
    }

    public function testAddTeamMemberWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('addTeamMember', $team));
    }

    public function testUpdateTeamMemberWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('updateTeamMember', $team));
    }

    public function testUpdateTeamMemberWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('updateTeamMember', $team));
    }

    public function testRemoveTeamMemberWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('removeTeamMember', $team));
    }

    public function testRemoveTeamMemberWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('removeTeamMember', $team));
    }

    public function testDeleteWhenUnauthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('delete', $team));
    }

    public function testDeleteWhenAuthorized(): void
    {
        /** @todo This test is incomplete. */
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('delete', $team));
    }
}
