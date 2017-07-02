<?php

namespace Louvre\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Purchase
 *
 * @ORM\Table(name="purchase")
 * @ORM\Entity(repositoryClass="Louvre\TicketingBundle\Repository\PurchaseRepository")
 */
class Purchase
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="Louvre\TicketingBundle\Entity\Ticket", mappedBy="purchase", cascade={"all"})
     */
    private $tickets;

    /**
     * @var \DateTime
     * @ORM\Column(name="dateVisit", type="date")
     */
    private $dateVisit;

    /**
     * @var string
     *
     * @ORM\Column(name="typeTicket", type="string", length=255)
     */
    private $typeTicket;

    /**
     * @var int
     *
     * @ORM\Column(name="nbrTickets", type="integer")
     */
    private $nbrTickets;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datePurchase", type="datetime")
     */
    private $datePurchase;

    private $totalPrice;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateVisit
     *
     * @param \DateTime $dateVisit
     *
     * @return Purchase
     */
    public function setDateVisit($dateVisit)
    {
        $this->dateVisit = $dateVisit;

        return $this;
    }

    /**
     * Get dateVisit
     *
     * @return \DateTime
     */
    public function getDateVisit()
    {
        return $this->dateVisit;
    }

    /**
     * Set typeTicket
     *
     * @param string $typeTicket
     *
     * @return Purchase
     */
    public function setTypeTicket($typeTicket)
    {
        $this->typeTicket = $typeTicket;

        return $this;
    }

    /**
     * Get typeTicket
     *
     * @return string
     */
    public function getTypeTicket()
    {
        return $this->typeTicket;
    }

    /**
     * Set nbrTickets
     *
     * @param integer $nbrTickets
     *
     * @return Purchase
     */
    public function setNbrTickets($nbrTickets)
    {
        $this->nbrTickets = $nbrTickets;

        return $this;
    }

    /**
     * Get nbrTickets
     *
     * @return int
     */
    public function getNbrTickets()
    {
        return $this->nbrTickets;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return Purchase
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set datePurchase
     *
     * @param \DateTime $datePurchase
     *
     * @return Purchase
     */
    public function setDatePurchase($datePurchase)
    {
        $this->datePurchase = $datePurchase;

        return $this;
    }

    /**
     * Get datePurchase
     *
     * @return \DateTime
     */
    public function getDatePurchase()
    {
        return $this->datePurchase;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->datePurchase = new \DateTime();
    }

    /**
     * Add ticket
     *
     * @param \Louvre\TicketingBundle\Entity\Ticket $ticket
     *
     * @return Purchase
     */
    public function addTicket(\Louvre\TicketingBundle\Entity\Ticket $ticket)
    {
        $this->tickets[] = $ticket;

        return $this;
    }

    /**
     * Remove ticket
     *
     * @param \Louvre\TicketingBundle\Entity\Ticket $ticket
     */
    public function removeTicket(\Louvre\TicketingBundle\Entity\Ticket $ticket)
    {
        $this->tickets->removeElement($ticket);
    }

    /**
     * Get tickets
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTickets()
    {
        return $this->tickets;
    }

    /**
     * @return mixed
     */
    public function getTotalPrice()
    {
        $tickets = $this->getTickets();
        $totalPrice = 0;
        foreach ($tickets as $ticket) {
            $totalPrice += $ticket->getTicketPrice();
        }
        $this->setTotalPrice($totalPrice);
        return $this->totalPrice;
    }

    /**
     * @param mixed $totalPrice
     */
    public function setTotalPrice($totalPrice)
    {
        $this->totalPrice = $totalPrice;
    }


}
