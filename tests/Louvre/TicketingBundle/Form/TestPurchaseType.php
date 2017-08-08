<?php

namespace Tests\Louvre\TicketingBundle\Form;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TestPurchaseType extends WebTestCase
{

    public function purchaseForm()
    {

        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertGreaterThan(
            0,
            $crawler->filter('html:contains("Réservez")')->count());

    }
}
