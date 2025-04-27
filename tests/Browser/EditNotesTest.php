<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class EditNotesTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testUserCanEditNote(): void
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
                    ->assertSee('Create Note')
                    ->assertSee('Modul 3')
                    ->assertSee('Author: jihan rizkyta fitri')
                    ->assertSee('Praktikum PPL Modul 3')
                    ->assertSee('Edit')
                    ->assertSee('Delete')
                    ->press('Edit') 
                    ->assertPathIs('/edit-note-page/1') 
                    ->type('description', 'Praktikum PPL Modul 3-Edit') 
                    ->press('UPDATE')
                    ->assertPathIs('/notes')
                    ->assertSee('Note has been updated') 
                    ->assertSee('Modul 3')
                    ->assertSee('Praktikum PPL Modul 3-Edit')
                    ->assertSee('Edit')
                    ->assertSee('Delete');
        });
    }
}