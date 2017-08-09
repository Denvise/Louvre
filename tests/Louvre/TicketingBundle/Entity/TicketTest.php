<?php

namespace Tests\LouvreTicketingBundle\Entity;

use Louvre\TicketingBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TicketTest extends WebTestCase {

    public function testTicket(){

        $ticket = new Ticket();
        $ticket
            ->setBuyerFirstname('Jack')
            ->setBuyerLastname('Russel')
            ->setBuyerBirthday('01/01/1980')
            ->setBuyerCountry('FR')
            ->setReducedPrice(false)
            ->setTicketPrice('16');

        $this->assertEquals('Russel', $ticket->getBuyerLastname());
        $this->assertEquals('Jack', $ticket->getBuyerFirstname());
        $this->assertEquals('FR', $ticket->getBuyerCountry());
        $this->assertEquals('01/01/1980', $ticket->getBuyerBirthday());
        $this->assertFalse($ticket->getReducedPrice());
        $this->assertEquals(16, $ticket->getTicketPrice());

    }

}
