<?php
namespace App\Tests\Entity;
use App\Entity\Campagne;
use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;

class CampagneTest extends TestCase {

    public function testCampagneStartEndDate() {

        $faker = \Faker\Factory::create('FR');

        $campagne = new Campagne();
        $campagne->setName('Lauching event');
        $campagne->setPrice(12000.00);
        $campagne->setUser(new User(112));
        $campagne->setStartDate(\DateTime::createFromFormat('Y-m-d', $faker->date('Y-m-d')));
        $campagne->setEndDate(\DateTime::createFromFormat('Y-m-d', $faker->date('Y-m-d')));

        // Now, mock the repository so it returns the mock of the campagne
        $campagneRepository = $this->createMock(ObjectRepository::class);
        $campagneRepository->expects($this->any())
            ->method('find')
            ->willReturn($campagne);

        // Last, mock the EntityManager to return the mock of the repository
        $objectManager = $this->createMock(ObjectManager::class);
        $objectManager->expects($this->any())
            ->method('getRepository')
            ->willReturn($campagneRepository);

        $this->assertGreaterThan($campagne->getStartDate(), $campagne->getEndDate());
    }
}