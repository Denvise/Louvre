<?php

namespace Louvre\TicketingBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class LimiterTicket
 *
 * @Annotation
 */

class LimiterTicket extends Constraint {

    public $message = "Le musée est complet à cette date, veuillez choisir un autre jour";

    public function validatedBy()
    {
        return 'limiter_ticket';
    }

    public function getTargets() {
        return self::CLASS_CONSTRAINT;
    }


}
