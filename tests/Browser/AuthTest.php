<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function user_can_register_correctly()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                    ->type('name', 'Ivalin Venkov')
                    ->type('email', 'ivalinvenkov@gmail.com')
                    ->type('password', 'password')
                    ->type('password_confirmation', 'password')
                    ->press('button[type=submit]')
                    ->assertSee('What number do you have in mind...')
                    ->clickLink('Ivalin Venkov')
                    ->assertSee('Logout')
                    ->clickLink('Logout');
        });
    }

     /**
     * A Dusk test example.
     * @test
     * @return void
     */
    public function user_can_login_correctly()
    {
        $user = User::factory()->create();
        $this->browse(function (Browser $browser) use($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password','password')
                    ->press('button[type=submit]')
                    ->assertSee('What number do you have in mind...');
        });
    }
}
