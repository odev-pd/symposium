<?php

use App\Acceptance;
use App\Conference;
use App\Submission;
use App\Talk;
use App\TalkRevision;
use App\User;
use Illuminate\Support\Facades\Session;

class AcceptanceTest extends IntegrationTestCase
{
    /** @test */
    function can_create_from_submission()
    {
        $user = factory(User::class)->create();
        $this->be($user);

        $conference = factory(Conference::class)->create();
        $talk = factory(App\Talk::class)->create(['author_id' => $user->id]);
        $revision = factory(App\TalkRevision::class)->create();
        $talk->revisions()->save($revision);

        $submission = factory(Submission::class)->create([
            'talk_revision_id' => $revision->id,
            'conference_id' => $conference->id,
        ]);

        $acceptance = Acceptance::createFromSubmission($submission);

        $submission = $submission->refresh();

        $this->assertTrue($submission->isAccepted());
        $this->assertEquals($submission->id, $acceptance->submission->id);
    }


    /** @test */
    function user_can_mark_talks_as_accepted_via_http()
    {
        $user = factory(User::class)->create();
        $this->be($user);

        $conference = factory(Conference::class)->create();
        $talk = factory(Talk::class)->create(['author_id' => $user->id]);
        $revision = factory(TalkRevision::class)->create();
        $talk->revisions()->save($revision);
        $submission = factory(Submission::class)->create([
            'talk_revision_id' => $revision->id,
            'conference_id' => $conference->id,
        ]);

        $this->post('acceptances', [
            'submissionId' => $submission->id,
            '_token' => Session::token(),
        ]);

        $this->assertTrue($submission->refresh()->isAccepted());
    }

    /** @test */
    function user_can_remove_acceptance_via_http()
    {
        $user = factory(User::class)->create();
        $this->be($user);

        $conference = factory(Conference::class)->create();
        $talk = factory(Talk::class)->create(['author_id' => $user->id]);
        $revision = factory(TalkRevision::class)->create();
        $talk->revisions()->save($revision);

        $acceptance = factory(Acceptance::class)->create();

        $submission = factory(Submission::class)->create([
            'talk_revision_id' => $revision->id,
            'conference_id' => $conference->id,
            'acceptance_id' => $acceptance->id
        ]);

        $this->delete('acceptances/'.$acceptance->id, [
            '_token' => Session::token(),
        ]);

        $this->assertFalse($submission->refresh()->isAccepted());
    }
}