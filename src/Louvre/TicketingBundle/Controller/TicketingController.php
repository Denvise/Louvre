<?php

namespace Louvre\TicketingBundle\Controller;
use Louvre\TicketingBundle\Entity\Purchase;
use Louvre\TicketingBundle\Form\PurchaseType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TicketingController extends Controller
{

    public function indexAction(Request $request)
    {

        $purchase = new Purchase();
        $form = $this->createForm(PurchaseType::class, $purchase);

        $em = $this->getDoctrine()->getManager();

        if($request->isMethod('POST') && $form->handleRequest($request)->isValid()){
            $this->get('louvre_ticketing.tickets')->setPrice($purchase);
            $this->get('louvre_ticketing.tickets')->setCount($purchase);
            $em->persist($purchase);
            $em->flush();

            return $this->redirectToRoute('louvre_ticketing_validation', [ 'id' => $purchase->getId()]);
        }

        return $this->render('LouvreTicketingBundle:Ticket:index.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function validationAction(Request $request, Purchase $purchase){
        return $this->render('LouvreTicketingBundle:Ticket:validation.html.twig', [
            'purchase' => $purchase,
            'tickets' => $purchase->getTickets(),
            'totalPrice' => $purchase->getTotalPrice(),
        ]);
    }
}
