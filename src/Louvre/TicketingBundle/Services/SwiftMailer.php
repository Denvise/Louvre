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

    public function sendMail(Purchase $purchase){

        $message = \Swift_Message::newInstance()
            ->setSubject('Confirmation de commande')
            ->setFrom(array('louvre@thomascherel.com' => "Musée du Louvre" ))
            ->setTo($purchase->getEmail())
            ->setContentType('text/html')
            ->setBody('
            <h2>Nous sommes heureux de vous voir bientôt !</h2>
            <p>Imprimez vos billets et présentez-les à l\'entrée lors de votre visite.</p>
            <p>Si vous avez toutefois des questions n\'hésitez pas à repondre à ce mail.</p>
            ')
            ->attach(\Swift_Attachment::fromPath('PDF/billet-'.$purchase->getId().'.pdf'));

        $this->mailer->send($message);

    }

}
