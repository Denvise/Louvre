<?php

namespace Tests\LouvreTicketingBundle\Entity;


use Louvre\TicketingBundle\Entity\Purchase;
use Louvre\TicketingBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class PurchaseTest extends WebTestCase {

    public function testAddTicket(){

        $purchase = new Purchase();
        $purchase
            ->setDateVisit('04/11/2017')
            ->setTypeTicket('Journée')
            ->setNbrTickets('3')
            ->setEmail('jarckrussel@orange.fr')
            ->setDatePurchase('03/11/2017');


        $this->assertEquals('04/11/2017', $purchase->getDateVisit());
        $this->assertEquals('Journée', $purchase->getTypeTicket());
        $this->assertEquals('3', $purchase->getNbrTickets());
        $this->assertEquals('jarckrussel@orange.fr', $purchase->getEmail());
        $this->assertEquals('03/11/2017', $purchase->getDatePurchase());
    }

}
