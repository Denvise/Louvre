<?php

namespace Louvre\TicketingBundle\Tests\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TicketingControllerTest extends WebTestCase {

    /**
     * @dataProvider provideUrls
     */
    public function testUrls($url){
        $client = static::createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function provideUrls(){

        return array(
            array('/'),
            array('/validation/17'),
            array('/confirmation/17'),
        );

    }


}
