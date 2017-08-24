<?php

namespace Louvre\TicketingBundle\Tests\Controller;


use Louvre\TicketingBundle\DataFixtures\ORM\LoadPurchase;
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
            array('/validation/31270'),
            array('/confirmation/31270'),
        );
    }

    public function testPurchase() {

        $client = static::createClient();
        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $form = $crawler->selectButton('louvre_ticketingbundle_purchase[validate]')->form();

        $data = array(
            'louvre_ticketingbundle_purchase' => array(
                'dateVisit' => '2017-08-15',
                'typeTicket' => 'Journée',
                'email' => 'dfgdfgd@email.com',
                'tickets' => array(
                    0 => array (
                        'buyerFirstname' => 'Firstname',
                        'buyerLastname' => 'Lastname',
                        'buyerCountry' => 'FR',
                        'reducedPrice' => '0',
                        'buyerBirthday' => array(
                            'year' => '1970',
                            'month' => '10',
                            'day' => '10'
                        ),
                    )
                ),
                '_token' => $form['louvre_ticketingbundle_purchase[_token]']->getValue(),
            )
        );
        $client->request('POST', '/', $data);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());

    }

    public function testLimitTicket()
    {

        $client = static::createClient();

        $container = $client->getContainer();
        $doctrine = $container->get('doctrine');
        $entityManager = $doctrine->getManager();


        $fixture = new LoadPurchase();
        $purchase = $fixture->load($entityManager);
        var_dump($purchase);

        $crawler = $client->request('GET', '/');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $form = $crawler->selectButton('louvre_ticketingbundle_purchase[validate]')->form();

        $data = array(
            'louvre_ticketingbundle_purchase' => array(
                'dateVisit' => '2017-09-23',
                'typeTicket' => 'Journée',
                'email' => 'dfgdfgd@email.com',
                'tickets' => array(
                    0 => array(
                        'buyerFirstname' => 'Firstname',
                        'buyerLastname' => 'Lastname',
                        'buyerCountry' => 'FR',
                        'reducedPrice' => 0,
                        'buyerBirthday' => array(
                            'year' => '1970',
                            'month' => '10',
                            'day' => '10'
                        ),
                    )
                ),

                '_token' => $form['louvre_ticketingbundle_purchase[_token]']->getValue(),
            )
        );
        $client->request('POST', '/', $data);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

}
