<?php

namespace Domain;
use Domain\Pet;

final class Pet_Management
{
    private Pet $myPet;

    public function __construct()
    {
        $this->myPet = new Pet;
    }

    public function rename($newName): void
    {
        $this->myPet->setName($newName);
    }
    
    public function tick(): void
    {
        $this->myPet->increaseTime();
        $this->myPet->increaseHunger(3);
        $this->myPet->decreaseEnergy(3);
        if ($this->myPet->getHunger() > 80)
            {
                $this->myPet->decreaseHealth(5);
            }
        elseif ($this->myPet->getHappiness() < 20)
            {
                $this->myPet->decreaseHealth(5);
            }
        $this->myPet->decreaseHappiness(2);

    }

    public function status(): array
    {
        $status_values = [];
        $status_values[] = $this->myPet->getName();
        $status_values[] = $this->myPet->getAge();
        $status_values[] = $this->myPet->getHunger();
        $status_values[] = $this->myPet->getEnergy();
        $status_values[] = $this->myPet->getHappiness();
        $status_values[] = $this->myPet->getHealth();
        $status_values[] = $this->myPet->getTime();
        return $status_values;
    }

    public function feed(): void
    {
        $this->myPet->increaseHunger(5);
    }

    public function play(): void
    {
        $this->myPet->decreaseEnergy(5);
        $this->myPet->increaseHappiness(5);
    }

    public function sleep(): void
    {
        $this->myPet->increaseEnergy(5);
    }

    public function checkAlive(): int
    {
        return $this->myPet->checkHealth();
    }

    public function checkEnergy(): int
    {
        return $this->myPet->getEnergy();
    }
}