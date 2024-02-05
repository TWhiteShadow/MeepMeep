<?php

namespace App\Entity;

use DateTime;

class Car
{
    private ?int $id;
    private ?string $name;
    private ?float $milesPerGallon;
    private ?int $cylinders;
    private ?float $displacement;
    private ?int $horsepower;
    private ?int $weightInLbs;
    private ?float $acceleration;
    private ?DateTime $year;
    private ?string $origin;
    private ?string $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): static
    {
        $this->id = $id;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function getMilesPerGallon(): float
    {
        return $this->milesPerGallon;
    }

    public function setMilesPerGallon(?float $milesPerGallon): static
    {
        $this->milesPerGallon = $milesPerGallon;
        return $this;
    }

    public function getCylinders(): int
    {
        return $this->cylinders;
    }

    public function setCylinders(?int $cylinders): static
    {
        $this->cylinders = $cylinders;
        return $this;
    }

    public function getDisplacement(): float
    {
        return $this->displacement;
    }

    public function setDisplacement(?float $displacement): static
    {
        $this->displacement = $displacement;
        return $this;
    }

    public function getHorsepower(): int
    {
        return $this->horsepower;
    }

    public function setHorsepower(?int $horsepower): static
    {
        $this->horsepower = $horsepower;
        return $this;
    }

    public function getWeightInLbs(): int
    {
        return $this->weightInLbs;
    }

    public function setWeightInLbs(?int $weightInLbs): static
    {
        $this->weightInLbs = $weightInLbs;
        return $this;
    }

    public function getAcceleration(): float
    {
        return $this->acceleration;
    }

    public function setAcceleration(?float $acceleration): static
    {
        $this->acceleration = $acceleration;
        return $this;
    }

    public function getYear(): DateTime
    {
        return $this->year;
    }

    public function setYear(?DateTime $year): static
    {
        $this->year = $year;
        return $this;
    }

    public function getOrigin(): string
    {
        return $this->origin;
    }

    public function setOrigin(?string $origin): static
    {
        $this->origin = $origin;
        return $this;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): static
    {
        $this->photo = $photo;
        return $this;
    }
}
