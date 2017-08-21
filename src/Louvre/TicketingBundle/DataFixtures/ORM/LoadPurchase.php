<?php

namespace Louvre\TicketingBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Louvre\TicketingBundle\Entity\Purchase;
use Louvre\TicketingBundle\Entity\Ticket;

class LoadPurchase implements FixtureInterface {

    public function load(ObjectManager $manager){


        for($i = 1; $i <= 1000; $i++) {

            $purchase = new Purchase();
            $purchase->setDatePurchase(new \DateTime('2017-09-21'));
            $purchase->setDateVisit(new \DateTime('2017-09-23'));
            $purchase->setTypeTicket('Journée');
            $purchase->setEmail('test@test.com');
            $purchase->setTotalPrice(15984);

            $ticket = new Ticket();
            $ticket->setBuyerLastname('Russel');
            $ticket->setBuyerFirstname('Jack');
            $ticket->setBuyerCountry('FR');
            $ticket->setReducedPrice('0');
            $ticket->setBuyerBirthday(new \DateTime('1980-09-23'));

            $purchase->addTicket($ticket);
            $manager->persist($purchase);
        }

        $manager->flush();
        return $purchase;


    }

}
