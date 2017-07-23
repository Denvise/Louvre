<?php

namespace Louvre\TicketingBundle\Services;

use Louvre\TicketingBundle\Entity\Purchase;

class Html2pdf {


    private $twig;

    public function __construct(\Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    public function getPdf(Purchase $purchase){

        $pdf = $this->twig->render(
            'LouvreTicketingBundle:Emails:tickets.html.twig',
            array(
                'purchase'  => $purchase,
                'purchaseID' => sha1($purchase->getId()),
                'tickets' => $purchase->getTickets(),
                'totalPrice'  => $purchase->getTotalPrice()
            ));

        $html2pdf = new \Spipu\Html2Pdf\Html2Pdf('P', 'A4', 'fr');
        $html2pdf->pdf->SetDisplayMode('real');
        $html2pdf->writeHTML($pdf);
        $html2pdf->output('PDF/billet-'.$purchase->getId().'.pdf', 'F');

    }

}
