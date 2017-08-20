<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class AuthTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_log_in()
    {
        $user = User::where('email', 'test@example.org')->delete();

        $user = factory(User::class)->create([
            'email' => 'test@example.org',
            'name' => 'Johnathan',
        ]);

        $this->browse(function (Browser $browser) use ($user) {
            $browser->visit('/login')
                    ->type('email', $user->email)
                    ->type('password', 'secret')
                    ->press('Login')
                    ->assertSee('Johnathan')
                    ->assertPathIs('/');
        });
    }

    /** @test */
    public function a_user_can_log_out()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/')
                    ->clickLink('Logout')
                    ->assertSee('Register');
        });
    }

    /** @test */
    public function a_user_can_register()
    {
        $user = User::where('email', 'test@example.org')->delete();

        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->visit('/')
                    ->clickLink('Register')
                    ->type('name', 'Johnathan')
                    ->type('email', 'test@example.org')
                    ->type('password', 'secret')
                    ->type('password_confirmation', 'secret')
                    ->press('Register')
                    ->assertPathIs('/')
                    ->assertSee('Johnathan');
        });
    }
}
