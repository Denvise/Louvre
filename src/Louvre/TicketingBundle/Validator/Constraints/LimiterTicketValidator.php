<?php

namespace Louvre\TicketingBundle\Validator\Constraints;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class LimiterTicketValidator extends ConstraintValidator {

    private $doctrine;

    public function __construct(EntityManager $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public function validate($protocol, Constraint $constraint){

        $em = $this->doctrine;
        $nbrTicket = $em->getRepository('LouvreTicketingBundle:Purchase')->myCount($protocol->getDateVisit(), $protocol->getTickets()->count());
        if ($nbrTicket === false){
            $this->context->buildViolation($constraint->message) ->addViolation();
        }
    }


}
