<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Campagne", inversedBy="events")
     * @ORM\JoinColumn(nullable=false)
     */
    private $campagne;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ip;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $country;

    /**
     * @ORM\Column(type="string", length=160)
     */
    private $city;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string $type
     * @return Event
     */
    public function setType(string $type): self
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * @param User|null $user
     * @return Event
     */
    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Campagne|null
     */
    public function getCampagne(): ?Campagne
    {
        return $this->campagne;
    }

    /**
     * @param Campagne|null $campagne
     * @return Event
     */
    public function setCampagne(?Campagne $campagne): self
    {
        $this->campagne = $campagne;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getIp(): ?string
    {
        return $this->ip;
    }

    /**
     * @param string|null $ip
     * @return Event
     */
    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string $country
     * @return Event
     */
    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * @return Event
     */
    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    /**
     * @param \DateTimeInterface $date
     * @return Event
     */
    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return string|null
     */
    public function __toString() {
        return $this->getType();
    }
}
