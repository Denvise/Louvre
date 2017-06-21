<?php

namespace Louvre\TicketingBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ticket
 *
 * @ORM\Table(name="ticket")
 * @ORM\Entity(repositoryClass="Louvre\TicketingBundle\Repository\TicketRepository")
 */
class Ticket
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
     * @ORM\ManyToOne(targetEntity="Louvre\TicketingBundle\Entity\Purchase", inversedBy="tickets")
     * @ORM\JoinColumn(nullable=false)
     */
    private $purchase;

    /**
     * @var string
     *
     * @ORM\Column(name="buyerLastname", type="string", length=255)
     */
    private $buyerLastname;

    /**
     * @var string
     *
     * @ORM\Column(name="buyerFirstname", type="string", length=255)
     */
    private $buyerFirstname;

    /**
     * @var string
     *
     * @ORM\Column(name="buyerCountry", type="string", length=255)
     */
    private $buyerCountry;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="buyerBirthday", type="date")
     */
    private $buyerBirthday;

    /**
     * @var bool
     *
     * @ORM\Column(name="reducedPrice", type="boolean")
     */
    private $reducedPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="ticketPrice", type="decimal", precision=10, scale=2)
     */
    private $ticketPrice;


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
     * Set buyerLastname
     *
     * @param string $buyerLastname
     *
     * @return Ticket
     */
    public function setBuyerLastname($buyerLastname)
    {
        $this->buyerLastname = $buyerLastname;

        return $this;
    }

    /**
     * Get buyerLastname
     *
     * @return string
     */
    public function getBuyerLastname()
    {
        return $this->buyerLastname;
    }

    /**
     * Set buyerFirstname
     *
     * @param string $buyerFirstname
     *
     * @return Ticket
     */
    public function setBuyerFirstname($buyerFirstname)
    {
        $this->buyerFirstname = $buyerFirstname;

        return $this;
    }

    /**
     * Get buyerFirstname
     *
     * @return string
     */
    public function getBuyerFirstname()
    {
        return $this->buyerFirstname;
    }

    /**
     * Set buyerCountry
     *
     * @param string $buyerCountry
     *
     * @return Ticket
     */
    public function setBuyerCountry($buyerCountry)
    {
        $this->buyerCountry = $buyerCountry;

        return $this;
    }

    /**
     * Get buyerCountry
     *
     * @return string
     */
    public function getBuyerCountry()
    {
        return $this->buyerCountry;
    }

    /**
     * Set buyerBirthday
     *
     * @param \DateTime $buyerBirthday
     *
     * @return Ticket
     */
    public function setBuyerBirthday($buyerBirthday)
    {
        $this->buyerBirthday = $buyerBirthday;

        return $this;
    }

    /**
     * Get buyerBirthday
     *
     * @return \DateTime
     */
    public function getBuyerBirthday()
    {
        return $this->buyerBirthday;
    }

    /**
     * Set reducedPrice
     *
     * @param boolean $reducedPrice
     *
     * @return Ticket
     */
    public function setReducedPrice($reducedPrice)
    {
        $this->reducedPrice = $reducedPrice;

        return $this;
    }

    /**
     * Get reducedPrice
     *
     * @return bool
     */
    public function getReducedPrice()
    {
        return $this->reducedPrice;
    }

    /**
     * Set ticketPrice
     *
     * @param string $ticketPrice
     *
     * @return Ticket
     */
    public function setTicketPrice($ticketPrice)
    {
        $this->ticketPrice = $ticketPrice;

        return $this;
    }

    /**
     * Get ticketPrice
     *
     * @return string
     */
    public function getTicketPrice()
    {
        return $this->ticketPrice;
    }

    /**
     * Set purchase
     *
     * @param \Louvre\TicketingBundle\Entity\Purchase $purchase
     *
     * @return Ticket
     */
    public function setPurchase(\Louvre\TicketingBundle\Entity\Purchase $purchase)
    {
        $this->purchase = $purchase;

        return $this;
    }

    /**
     * Get purchase
     *
     * @return \Louvre\TicketingBundle\Entity\Purchase
     */
    public function getPurchase()
    {
        return $this->purchase;
    }

}
