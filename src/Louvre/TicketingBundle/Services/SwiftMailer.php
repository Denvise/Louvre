<?php

namespace Louvre\TicketingBundle\Services;

use Louvre\TicketingBundle\Entity\Purchase;



class SwiftMailer {

    protected $mailer;
    private $twig;

    public function __construct(\Twig_Environment $twig, \Swift_Mailer $mailer) {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    public function sendMail($purchase, $name = null){

        $message = \Swift_Message::newInstance()
            ->setSubject('Confirmation de commande')
            ->setFrom(array('contact@thomascherel.com' => "Musée du Louvre" ))
            ->setTo($purchase->getEmail())
            ->setContentType('text/html')
            ->setBody($this->twig->render('LouvreTicketingBundle:Emails:tickets.html.twig', array( 'name' => $name)));

        $this->mailer->send($message);

    }

}
