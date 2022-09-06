<?php

namespace Tests\Browser;

use App\Models\Score;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LeaderboardTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function user_can_see_the_leaderbords_page()
    {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/score')
                    ->assertSee('BULLS FOUND');
        });
    }
}
