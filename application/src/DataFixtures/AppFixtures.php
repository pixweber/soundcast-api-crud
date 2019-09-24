<?php

namespace App\DataFixtures;

use App\Entity\Campagne;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Event;
use Faker\Factory;


class AppFixtures extends Fixture {

    public $faker;

    public function __construct() {
        $this->faker = Factory::create('fr_FR');
    }

    public function load(ObjectManager $manager) {
        $this->loadUsers($manager);
        $this->loadCampagnes($manager);
        $this->loadEvents($manager);
    }

    public function loadUsers(ObjectManager $objectManager) {

        /**
         * Load 10 users
         */
        for ($i=1; $i <= 10; $i++) {
            $user = new User();
            $user->setUsername($this->faker->userName);
            $user->setFirstName($this->faker->firstName);
            $user->setLastName($this->faker->lastName);
            $user->setEmail($this->faker->email);
            $user->setCompanyName($this->faker->company);

            $this->setReference("user_$i", $user);

            $objectManager->persist($user);
        }

        $objectManager->flush();
    }

    public function loadCampagnes(ObjectManager $objectManager) {

        /**
         * Load 10 users
         */
        for ($i=1; $i <= 10; $i++) {
            $campagne = new Campagne();
            $campagne->setName($this->faker->text(60));
            $campagne->setStartDate(\DateTime::createFromFormat('Y-m-d', $this->faker->date('Y-m-d')));
            $campagne->setEndDate(\DateTime::createFromFormat('Y-m-d', $this->faker->date('Y-m-d')));
            $campagne->setPrice($this->faker->randomFloat(2, 500, 30000));


            $userReference = $this->getRandomUserReference();

            $campagne->setUser($userReference);

            $this->setReference("campagne_$i", $campagne);

            $objectManager->persist($campagne);
        }

        $objectManager->flush();
    }

    public function loadEvents(ObjectManager $objectManager) {

        /**
         * Load 10 users
         */
        for ($i=1; $i <= 100; $i++) {
            $event = new Event();
            $event->setType($this->faker->text(60));
            $event->setType($this->faker->realText(20));
            $event->setCity($this->faker->city());
            $event->setDate(\DateTime::createFromFormat('Y-m-d', $this->faker->date('Y-m-d')));
            $event->setIp($this->faker->ipv4);
            $event->setCountry($this->faker->countryCode);

            $event->setUser($this->getRandomUserReference());
            $event->setCampagne($this->getRandomCampagneReference());

            $objectManager->persist($event);
        }

        $objectManager->flush();
    }

    /**
     * @param $entity
     * @return User
     */
    protected function getRandomUserReference(): User {
        $randomUser = rand(1, 10);

        return $this->getReference(
            "user_$randomUser"
        );
    }

    /**
     * @param $entity
     * @return Campagne
     */
    protected function getRandomCampagneReference(): Campagne {
        $randomCampagne = rand(1, 10);

        return $this->getReference(
            "campagne_$randomCampagne"
        );
    }
}
