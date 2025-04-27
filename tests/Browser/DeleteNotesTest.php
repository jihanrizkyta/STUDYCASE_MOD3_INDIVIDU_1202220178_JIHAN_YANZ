<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class DeleteNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testUserCanDeleteNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->clickLink('Log in')
                    ->type('email', 'jihanrizkyta@gmail.com')
                    ->type('password', 'jihanrizkyta')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->assertSee('Author: jihan rizkyta fitri')
                    ->assertSee('Praktikum PPL Modul 3-Edit')
                    ->assertSee('Edit')
                    ->assertSee('Delete')
                    ->press('Delete')
                    ->assertSee('Note has been deleted')
                    ->assertDontSee('Modul 3')
                    ->assertDontSee('Praktikum PPL Modul 3-Edit')
                    ->assertDontSee('Edit')
                    ->assertDontSee('Delete');

        });
    }
}
