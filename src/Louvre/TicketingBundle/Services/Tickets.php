<?php

namespace Louvre\TicketingBundle\Services;

use Louvre\TicketingBundle\Entity\Purchase;

class Tickets {

    public function setPrice(Purchase $purchase){

        $tickets = $purchase->getTickets();

        foreach ($tickets as $ticket){
            $buyerBirthday = $ticket->getBuyerBirthday();
            $buyerAge = $buyerBirthday->diff(new \DateTime());
            $reducedPrice = $ticket->getReducedPrice();
        }

        if ($buyerAge->y < 4){
            $ticket->setTicketPrice(number_format(0.00, 2));
        } elseif ($buyerAge->y >= 4 && $buyerAge->y < 12){
            $ticket->setTicketPrice(number_format(8.00, 2));
        } elseif ($buyerAge->y >= 12 && $buyerAge->y < 60){
            $ticket->setTicketPrice(number_format(16.00, 2));
        } elseif ($buyerAge->y >= 60){
            $ticket->setTicketPrice(number_format(12.00, 2));
        } elseif ($reducedPrice == 1){
            $ticket->setTicketPrice(number_format(10.00, 2));
        }

    }

    public function setCount(Purchase $purchase){
        $tickets = $purchase->getTickets();
        $nbrtickets = 0;

        foreach ($tickets as $ticket) {
            $nbrtickets++;
        }

        $purchase->setNbrTickets($nbrtickets);
    }

}
