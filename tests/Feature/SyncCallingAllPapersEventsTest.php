<?php

namespace Tests\Feature;

use App\Models\TightenSlack;
use App\Notifications\ConferenceImporterStarted;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Notification;
use Tests\MocksCallingAllPapers;
use Tests\TestCase;

class SyncCallingAllPapersEventsTest extends TestCase
{
    use RefreshDatabase;
    use MocksCallingAllPapers;

    protected $eventStub;

    /** @test */
    function notifying_slack_when_command_starts_and_ends()
    {
        Notification::fake();
        $this->stubEvent();
        $this->mockClient();
        $tightenSlack = new TightenSlack();

        Artisan::call('callingallpapers:sync');

        Notification::assertSentTo($tightenSlack, ConferenceImporterStarted::class);
    }
}
