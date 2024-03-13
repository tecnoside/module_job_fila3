<?php

namespace Modules\Job\Tests\Unit\Models\Policies;

use App\User;
use Mockery;
use Modules\Job\Models\Policies\JobPolicy;
use Modules\User\Models\Team;
use Tests\TestCase;

/**
 * Class JobPolicyTest.
 *
 * @covers \Modules\Job\Models\Policies\JobPolicy
 */
final class JobPolicyTest extends TestCase
{
    private JobPolicy $jobPolicy;

    private User $user;

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
        $this->jobPolicy = new JobPolicy();
        $this->user = new User();
        $this->app->instance(JobPolicy::class, $this->jobPolicy);
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->jobPolicy);
        unset($this->user);
    }

    public function testViewAnyWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::assertFalse($this->user->can('viewAny', [JobPolicy::class]));
    }

    public function testViewAnyWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::assertTrue($this->user->can('viewAny', [JobPolicy::class]));
    }

    public function testViewWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('view', $team));
    }

    public function testViewWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('view', $team));
    }

    public function testCreateWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::assertFalse($this->user->can('create', [JobPolicy::class]));
    }

    public function testCreateWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::assertTrue($this->user->can('create', [JobPolicy::class]));
    }

    public function testUpdateWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::assertFalse($this->user->can('update', [JobPolicy::class]));
    }

    public function testUpdateWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        self::assertTrue($this->user->can('update', [JobPolicy::class]));
    }

    public function testAddTeamMemberWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('addTeamMember', $team));
    }

    public function testAddTeamMemberWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('addTeamMember', $team));
    }

    public function testUpdateTeamMemberWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('updateTeamMember', $team));
    }

    public function testUpdateTeamMemberWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('updateTeamMember', $team));
    }

    public function testRemoveTeamMemberWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('removeTeamMember', $team));
    }

    public function testRemoveTeamMemberWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('removeTeamMember', $team));
    }

    public function testDeleteWhenUnauthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertFalse($this->user->can('delete', $team));
    }

    public function testDeleteWhenAuthorized(): void
    {
        /**
* 
         *
 * @todo This test is incomplete. 
*/
        $team = Mockery::mock(Team::class);

        self::assertTrue($this->user->can('delete', $team));
    }
}
