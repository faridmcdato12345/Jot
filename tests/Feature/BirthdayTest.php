<?php

namespace Tests\Feature;

use App\User;
use App\Contact;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BirthdayTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function contacts_with_birthday_in_the_current_month_can_be_fetch(){
        $this->withoutExceptionHandling();
        $user=factory(User::class)->create();
        $birthdayContact = factory(Contact::class)->create([
            'user_id'=>$user->id,
            'birthday'=>now()->subYear(),
        ]);
        $noBirthdayContact = factory(Contact::class)->create([
            'user_id'=>$user->id,
            'birthday'=>now()->subMonth()
        ]);
        $this->get('/api/birthdays?api_token='.$user->api_token)
        ->assertJsonCount(1)
        ->assertJson([
            'data'=>[
                [
                    'data'=>[
                        'contact_id'=>$birthdayContact->id
                    ]
                ]
            ]
        ]);
    }
}