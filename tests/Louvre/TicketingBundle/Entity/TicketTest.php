<?php

namespace Louvre\TicketingBundle\Tests\Entity;



use Louvre\TicketingBundle\Entity\Ticket;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class TicketTest extends WebTestCase
{
    public function testTicketMethods()
    {
        $ticket = new Ticket();
        $ticket
            ->setBuyerLastname('Tosh')
            ->setBuyerFirstname('Iba')
            ->setBuyerCountry('FR')
            ->setBuyerBirthday('1981-01-01')
            ->setReducedPrice('0')
            ->setTicketPrice('16.00');

        $this->assertEquals('Tosh', $ticket->getBuyerLastname());
        $this->assertEquals('Iba', $ticket->getBuyerFirstname());
        $this->assertEquals('FR', $ticket->getBuyerCountry());
        $this->assertEquals('1981-01-01', $ticket->getBuyerBirthday());
        $this->assertEquals('0', $ticket->getReducedPrice());
        $this->assertEquals('16.00', $ticket->getTicketPrice());
    }
}
