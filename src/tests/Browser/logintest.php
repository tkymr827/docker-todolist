<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class logintest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('http://127.0.0.1:10080/login')
                ->value('input[name="email"]', 'aaa@aa.com')
                ->value('input[name="password"]', 'aaaaaaaa')
                ->press("submit")
                ->assertSee('ログインしました');
        });
    }
}
