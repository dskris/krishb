<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        //check contents in page
        $this->visit('/')
             ->see('highlights');

        $this->visit('/')
             ->see('AUTHENTIC ALCOHOL GUARANTEE');

        $this->visit('/')
             ->see('BIRTHDAY EVENTS');

        $this->visit('/')
             ->see('COCKTAIL GALORE');

        $this->visit('/')
             ->see('MOBILE BAR');

        $this->visit('/')
             ->see('pundit');

        $response = $this->call('GET', '/');

        $this->assertEquals(200, $response->getStatusCode());

        $this->visit('/menu')
             ->see('menu');

       /* $this->visit('/')
    ->click('MENU')
    ->seePageIs('/menu');*/

        /*this->visit('/menu')
             ->see('menu');

        $this->visit('/promotion')
             ->see('promotion');

        $this->visit('/services')
             ->see('services');

        $this->visit('gallery')
             ->see('gallery');

        $this->visit('/events')
             ->see('events');*/

                /* $this->visit('auth/register')
                ->type('bob', 'name')
                ->type('hello1@in.com', 'email')
                ->type('hello1', 'password')
                ->type('hello1', 'password_confirmation')
                ->press('Register')
                ->seePageIs('/');*/
    }
}
