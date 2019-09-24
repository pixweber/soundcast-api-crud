<?php
namespace App\Tests\Entity;

use App\Entity\Event;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EventRepositoryTest extends KernelTestCase {

    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp() {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()->get('doctrine')->getManager();
    }

    /**
     * A country code in an event object should contains only 2 characters
     */
    public function testCountryCode() {

        // Get some event
        $event = $this->entityManager->getRepository(Event::class)->findOneBy(array('country' => 'VN'));
        $this->assertSame(2, strlen($event->getCountry()));
    }

    protected function tearDown(): void {
        parent::tearDown();

        // Close entityManger to save memory
        $this->entityManager->close();
        $this->entityManager = null;
    }
}