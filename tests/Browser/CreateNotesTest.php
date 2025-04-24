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
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Modul 3')
                    ->clickLink('Log in')
                    ->assertPathIs('/login')
                    ->type('email', 'jihanrizkyta@gmail.com')
                    ->type('password', 'jihanrizkyta')
                    ->press('LOG IN')
                    ->assertPathIs('/dashboard')
                    ->clickLink('Notes')
                    ->assertPathIs('/notes')
                    ->clickLink('Create Notes')
                    ->assertPathIs('/create-note')
                    ->type('title', 'Modul 3')
                    ->type('description', 'Praktikum PPL Modul 3')
                    ->press('CREATE')
                    ->assertPathIs('/notes');

        });
    }
}
