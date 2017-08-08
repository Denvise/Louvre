<?php

namespace Tests\LouvreTicketingBundle\Entity;


use Louvre\TicketingBundle\Entity\Purchase;
use Louvre\TicketingBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PurchaseTest extends WebTestCase {

    public function testAddTicket(){

        $purchase = new Purchase();
        $purchase->setDateVisit('04/11/2017');
        $purchase->setTypeTicket('Journée');
        $purchase->setEmail('jarckrussel@orange.fr');

        $ticket = new Ticket();
        $ticket->setBuyerFirstname('Jack');
        $ticket->setBuyerLastname('Russel');
        $ticket->setBuyerBirthday('01/01/1980');
        $ticket->setBuyerCountry('FR');
        $ticket->setReducedPrice(false);
        $ticket->setTicketPrice('16');
        $ticket->setPurchase($purchase);

        $this->assertEquals('Russel', $ticket->getBuyerLastname());
        $this->assertEquals('Jack', $ticket->getBuyerFirstname());
        $this->assertEquals('jarckrussel@orange.fr', $purchase->getEmail());
        $this->assertEquals('FR', $ticket->getBuyerCountry());
        $this->assertEquals('01/01/1980', $ticket->getBuyerBirthday());
        $this->assertEquals('Journée', $purchase->getTypeTicket());
        $this->assertFalse($ticket->getReducedPrice());
        $this->assertEquals(16, $ticket->getTicketPrice());
    }

}
