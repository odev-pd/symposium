<?php

use App\User;
use Carbon\Carbon;
use App\Conference;
use App\Notifications\CFPIsOpen;
use Illuminate\Support\Facades\Notification;

class ConferenceTest extends IntegrationTestCase
{
    /** @test */
    function user_can_create_conference()
    {
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/conferences/create')
            ->type('Das Conf', '#title')
            ->type('A very good conference about things', '#description')
            ->type('http://dasconf.org', '#url')
            ->press('Create');

        $this->seeInDatabase('conferences', [
            'title' => 'Das Conf',
            'description' => 'A very good conference about things',
        ]);
    }

    /** @test */
    function user_can_edit_conference()
    {
        $this->disableExceptionHandling();

        $user = factory(App\User::class)->create();

        $conference = factory(App\Conference::class)->create([
            'author_id' => $user->id,
            'title' => 'Rubycon',
            'description' => 'A conference about Ruby',
        ]);

        $this->actingAs($user)
            ->visit('/conferences/' . $conference->id . '/edit')
            ->type('Laracon', '#title')
            ->type('A conference about Laravel', '#description')
            ->press('Update');

        $this->seeInDatabase('conferences', [
            'title' => 'Laracon',
            'description' => 'A conference about Laravel',
        ]);

        $this->missingFromDatabase('conferences', [
            'title' => 'Rubycon',
            'description' => 'A conference about Ruby',
        ]);
    }

    /** @test */
    function conferences_accept_proposals_during_the_call_for_papers()
    {
        $conference = factory(App\Conference::class)->create([
            'cfp_starts_at' => Carbon::yesterday(),
            'cfp_ends_at' => Carbon::tomorrow(),
        ]);

        $this->assertTrue($conference->isCurrentlyAcceptingProposals());
    }

    /** @test */
    function conferences_dont_accept_proposals_outside_of_the_call_for_papers()
    {
        $conference = factory(App\Conference::class)->create([
            'cfp_starts_at' => Carbon::tomorrow(),
            'cfp_ends_at' => Carbon::tomorrow()->addDay(),
        ]);

        $this->assertFalse($conference->isCurrentlyAcceptingProposals());

        $conference = factory(App\Conference::class)->create([
            'cfp_starts_at' => Carbon::yesterday()->subDay(),
            'cfp_ends_at' => Carbon::yesterday(),
        ]);

        $this->assertFalse($conference->isCurrentlyAcceptingProposals());
    }

    /** @test */
    function conferences_that_havent_announced_their_cfp_are_not_accepting_proposals()
    {
        $conference = factory(App\Conference::class)->create([
            'cfp_starts_at' => null,
            'cfp_ends_at' => null,
        ]);

        $this->assertFalse($conference->isCurrentlyAcceptingProposals());
    }

    /** @test */
    function non_owners_can_view_conference()
    {
        $user = factory(App\User::class)->create();

        $otherUser = factory(App\User::class)->create();
        $conference = factory(App\Conference::class)->create();
        $otherUser->conferences()
            ->save($conference);

        $this->actingAs($user)
            ->visit('conferences/' . $conference->id)
            ->see($conference->title);
    }

    /** @test */
    function guests_can_view_conference()
    {
        $user = factory(App\User::class)->create();

        $conference = factory(App\Conference::class)->create();
        $user->conferences()
            ->save($conference);

        $this->visit('conferences/' . $conference->id)
            ->see($conference->title);
    }

    /** @test */
    function guests_can_view_conference_list()
    {
        $user = factory(App\User::class)->create();

        $conference = factory(App\Conference::class)->create();
        $user->conferences()
            ->save($conference);

        $this->visit('conferences?filter=all')
            ->seePageIs('conferences?filter=all')
            ->see($conference->title);
    }

    /** @test */
    function guests_cannot_create_conference()
    {
        $this->visit('conferences/create')
            ->seePageIs('login');
    }

    /** @test */
    function notification_gets_send_to_all_users_for_open_cfp_today()
    {
        Notification::fake();
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/conferences/create')
            ->type('Das Conf', '#title')
            ->type('A very good conference about things', '#description')
            ->type('http://dasconf.org', '#url')
            ->type(Carbon::today()->addDays(10)->toDateString(), '#starts_at')
            ->type(Carbon::today()->toDateString(), '#cfp_starts_at')
            ->type(Carbon::tomorrow()->toDateString(), '#cfp_ends_at')
            ->press('Create');

        $conference = Conference::first();

        Notification::assertSentTo(User::all(), CFPIsOpen::class, function ($notification) use ($conference) {
            return $notification->conference->id === $conference->id;
        });
    }

    /** @test */
    function notification_gets_not_send_for_closed_cfp()
    {
        Notification::fake();
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/conferences/create')
            ->type('Das Conf', '#title')
            ->type('A very good conference about things', '#description')
            ->type('http://dasconf.org', '#url')
            ->type(Carbon::tomorrow()->addDays(1)->toDateString(), '#starts_at')
            ->type(Carbon::today()->subDays(10)->toDateString(), '#cfp_starts_at')
            ->type(Carbon::yesterday()->toDateString(), '#cfp_ends_at')
            ->press('Create');

        Notification::assertNotSentTo(User::all(), CFPIsOpen::class);
    }

    /** @test */
    function notification_gets_not_send_for_no_cfp_provided()
    {
        Notification::fake();
        $user = factory(App\User::class)->create();

        $this->actingAs($user)
            ->visit('/conferences/create')
            ->type('Das Conf', '#title')
            ->type('A very good conference about things', '#description')
            ->type('http://dasconf.org', '#url')
            ->press('Create');

        Notification::assertNotSentTo(User::all(), CFPIsOpen::class);
    }
}
