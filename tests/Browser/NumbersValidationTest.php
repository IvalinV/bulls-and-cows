<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class NumbersValidationTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     * @test
     */
    public function user_cannot_type_digits_smaller_than_1()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/home')
                    ->type('@first-number', '0')
                    ->type('@second-number', '0')
                    ->type('@third-number', '0')
                    ->type('@fourth-number', '0')
                    ->press('@save-button')
                    ->pause(1000)
                    ->assertSee('An error occured The input should be greater than 0.');
        });
    }

        /**
     * A Dusk test example.
     *
     * @return void
     * @test
     */
    public function user_cannot_type_digits_smaller_than_1_as_guess()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/home')
                    ->type('@first-number', '1')
                    ->type('@second-number', '2')
                    ->type('@third-number', '3')
                    ->type('@fourth-number', '4')
                    ->press('@save-button')
                    ->pause(2000)
                    ->type('@first-number-guess', '0')
                    ->type('@second-number-guess', '2')
                    ->type('@third-number-guess', '5')
                    ->type('@fourth-number-guess', '7')
                    ->pause(2000)
                    ->assertSee('An error occured The input should be greater than 0.');
        });
    }

    /**
     * A Dusk test example.
     *
     * @return void
     * @test
     */
    public function user_can_send_properly_the_typed_in_guesses()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/home')
                    ->type('@first-number', '1')
                    ->type('@second-number', '2')
                    ->type('@third-number', '3')
                    ->type('@fourth-number', '4')
                    ->press('@save-button')
                    ->pause(2000)
                    ->type('@first-number-guess', '3')
                    ->type('@second-number-guess', '2')
                    ->type('@third-number-guess', '5')
                    ->type('@fourth-number-guess', '7')
                    ->pause(2000)
                    ->press('@next-button')
                    ->pause(2000)
                    ->assertSee('Success Your score, was stored successfully!');
        });
    }

     /**
     * A Dusk test example.
     *
     * @return void
     * @test
     */
    public function user_canot_type_numbers_as_guesses()
    {
        $user = User::factory()->create();

        $this->browse(function (Browser $browser) use($user) {
            $browser->loginAs($user)
                    ->visit('/home')
                    ->type('@first-number', '1')
                    ->type('@second-number', '2')
                    ->type('@third-number', '3')
                    ->type('@fourth-number', '4')
                    ->press('@save-button')
                    ->pause(2000)
                    ->type('@first-number-guess', '35')
                    ->type('@second-number-guess', '26')
                    ->type('@third-number-guess', '58')
                    ->type('@fourth-number-guess', '97')
                    ->pause(2000)
                    ->press('@next-button')
                    ->pause(2000)
                    ->assertSee('The input may not be greater than 9.');
        });
    }
}
