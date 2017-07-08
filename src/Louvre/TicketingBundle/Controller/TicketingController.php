<?php

namespace Louvre\TicketingBundle\Controller;
use Louvre\TicketingBundle\Entity\Purchase;
use Louvre\TicketingBundle\Form\PurchaseType;
use Stripe\Charge;
use Stripe\Stripe;
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
            $em->persist($purchase);
            $em->flush();

            return $this->redirectToRoute('louvre_ticketing_validation', [ 'id' => $purchase->getId()]);
        }

        return $this->render('LouvreTicketingBundle:Ticket:index.html.twig', [
            'form' => $form->createView()
        ]);

    }

    public function validationAction(Request $request, Purchase $purchase, $name = null){

        if($request->isMethod('POST')) {
            $token = $request->request->get('stripeToken');

            try {
                Stripe::setApiKey($this->getParameter('stripe_api_key_sk'));
                Charge::create(array(
                    'amount' => $purchase->getTotalPrice() * 100,
                    'currency' => 'eur',
                    'source' => $token
                ));

            } catch (\Stripe\Error\Card $e) {
                $this->addFlash('payment_error', 'Une erreur s\'est produite, veuillez recommencer');
                return $this->redirectToRoute('louvre_ticketing_validation', array('id' => $purchase->getId()));
            }

            $this->get('louvre_ticketing.mailer')->sendMail($purchase, $name);

            return $this->redirectToRoute('louvre_ticketing_confirmation', array('id' => $purchase->getId(), 'email'=> $purchase->getEmail()));
        }

        return $this->render('LouvreTicketingBundle:Ticket:validation.html.twig', [
            'purchase' => $purchase,
            'tickets' => $purchase->getTickets(),
            'totalPrice' => $purchase->getTotalPrice(),
        ]);
    }

    public function confirmationAction(){

        return $this->render('LouvreTicketingBundle:Ticket:confirmation.html.twig');

    }
}
