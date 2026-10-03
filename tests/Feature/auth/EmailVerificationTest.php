<?php

namespace Tests\Feature\auth;

use App\Models\User;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{

    
    use DatabaseTransactions;
    /**
     * A basic feature test example.
     */

     /** @test */

       public function it_emails_is_verified_only_after_accepting_invitation()
    {

         Event::fake();

        $user = User::factory()->create([
            'email_verified_at' => null,
        ]);

        $this->assertFalse($user->hasVerifiedEmail());

         $verificationUrl = URL::temporarySignedRoute(
        'verification.verify',
            Carbon::now()->addMinutes(60),
            [
                'id' => $user->getKey(),
                'hash' => sha1($user->getEmailForVerification()),
            ]
        );

        $this->actingAs($user)
        ->get($verificationUrl)
        ->assertRedirect('/dashboard');

        $user->refresh();
        $this->assertTrue($user->hasVerifiedEmail());

        Event::assertDispatched(Verified::class);

    }

    



   
}
