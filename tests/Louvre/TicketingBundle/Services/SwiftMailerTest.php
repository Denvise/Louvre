<?php

namespace Tests\Louvre\TicketingBundle\Services;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SwiftMailerTest extends WebTestCase {

    protected $mailer;
    private $twig;

    public function swiftMailerTest(){

        $kernel = static::createKernel();
        $kernel->boot();
        $container = $kernel->getContainer();
        $service = $container->get('louvre_ticketing.mailer');

        $this->assertInstanceOf('Swift_Message', $message);
        $this->assertEquals('Hello Email', $message->getSubject());
        $this->assertEquals('send@example.com', key($message->getFrom()));
        $this->assertEquals('recipient@example.com', key($message->getTo()));
        $this->assertEquals(
            'You should see me from the profiler!',
            $message->getBody()
        );

    }

}
