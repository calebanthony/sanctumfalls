<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;
use App\Guide;

class GuideTest extends DuskTestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_make_a_guide_from_hero_view()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/guides/Aisling')
                    ->clickLink('Create a Guide for This Hero')
                    ->assertPathIs('/guides/create/Aisling')
                    ->assertSee('Create a Guide for Aisling')
                    ->visit('/guides/Beckett')
                    ->clickLink('Create a Guide for This Hero')
                    ->assertPathIs('/guides/create/Beckett')
                    ->assertSee('Create a Guide for Beckett');
        });
    }

    /** @test */
    public function a_user_can_fill_out_a_guide()
    {
        $user = factory(User::class)->create();

        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)
                    ->visit('/guides/create/Aisling')
                    ->type('name', 'fjn42lkj2gq1p8flj32')
                    ->type('pros[]', 'A huge pro')
                    ->type('cons[]', 'A huge con')
                    ->click('#lmb-toggle')
                    ->click('#lmb_left_left')
                    ->click('#rmb-toggle')
                    ->click('#rmb_left_left')
                    ->click('#f-toggle')
                    ->click('#f_left_left')
                    ->click('#q-toggle')
                    ->click('#q_left_left')
                    ->click('#e-toggle')
                    ->click('#e_left_left')
                    ->click('#talent-toggle')
                    ->click('#talent1')
                    ->keys('#guideContents', 'This is the content of the guide!')
                    ->press('Submit Guide')
                    ->assertPathIs('/guides/Aisling/fjn42lkj2gq1p8flj32');
        });
    }

    /** @test */
    public function a_guest_cannot_create_a_guide()
    {
        $this->browse(function (Browser $browser) {
            $browser->logout()
                    ->visit('/guides/create/Charnok')
                    ->assertPathIs('/login');
        });
    }

    /** @test */
    public function a_guest_can_view_a_guide_via_home_page()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Aisling')
                    ->assertPathIs('/guides/Aisling')
                    ->clickLink('fjn42lkj2gq1p8flj32')
                    ->assertPathIs('/guides/Aisling/fjn42lkj2gq1p8flj32');
        });

        Guide::where('name', 'fjn42lkj2gq1p8flj32')->delete();
    }
}
