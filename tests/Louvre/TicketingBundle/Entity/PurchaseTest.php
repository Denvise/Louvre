<?php

namespace Louvre\TicketingBundle\Tests\Entity;


use Louvre\TicketingBundle\Entity\Purchase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class OrderTest extends WebTestCase
{
    public function testOrderMethods()
    {
        $purchase = new Purchase();
        $purchase
        ->setDateVisit('2017-09-20')
        ->setTypeTicket('Journée')
        ->setEmail('thomas@gmail.com')
        ->setDatePurchase('2017-09-18');

        $this->assertEquals('2017-09-20', $purchase->getDateVisit());
        $this->assertEquals('Journée', $purchase->getTypeTicket());
        $this->assertEquals('thomas@gmail.com', $purchase->getEmail());
        $this->assertEquals('2017-09-18', $purchase->getDatePurchase());
    }
}
