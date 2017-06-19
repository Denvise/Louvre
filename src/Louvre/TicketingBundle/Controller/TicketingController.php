<?php

namespace Louvre\TicketingBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TicketingController extends Controller
{

    public function indexAction()
    {

        return $this->render('LouvreTicketingBundle:Ticket:index.html.twig');

    }
}
