<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CreateNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testUserCanCreateNote(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Modul 3')
                    ->clickLink('Log in')
                    ->type('email', 'jihanrizkyta@gmail.com')
                    ->type('password', 'jihanrizkyta')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->press('Create Note')
                    ->assertPathIs('/create-note')
                    ->type('title', 'Modul 3')
                    ->type('description', 'Praktikum PPL Modul 3')
                    ->press('CREATE')
                    ->assertPathIs('/notes')
                    ->assertSee('Modul 3');

        });
    }
}
