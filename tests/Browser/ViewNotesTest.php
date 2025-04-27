<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class ViewNotesTest extends DuskTestCase
{
    use DatabaseMigrations;

    /**
     * Test user can view notes list and note details.
     */
    public function testUserCanViewNotes(): void
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
                    ->assertSee('Modul 3')
                    ->assertSee('Author: jihan rizkyta fitri')
                    ->assertSee('Praktikum PPL Modul 3-Edit')
                    ->assertSee('Edit')
                    ->assertSee('Delete')

                    ->clickLink('Modul 3')
                    ->assertPathIs('/note/1')
                    ->assertSee('Notes / Modul 3')
                    ->assertSee('Modul 3')
                    ->assertSee('Author: jihan rizkyta fitri')
                    ->assertSee('Praktikum PPL Modul 3-Edit')
                    ->assertSee('Edit')
                    ->assertSee('Delete');
        });
    }
}
