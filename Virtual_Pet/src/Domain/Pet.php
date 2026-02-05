<?php

namespace Domain;

use App\DispatchResult;
use Domain\Alive;

final class Pet extends BaseStats
{
        private string $name;
        private int $time;
        private int $age;
        private Alive $alive;
        private int $energy;
        private int $hunger;
        private int $happiness;
        private int $health;

        public function __construct()
        {
            $this->name = '';
            $this->time = 0;
            $this->age = 1;
            $this->alive = Alive::ALIVE;
            $this->energy = 50;
            $this->hunger = 50;
            $this->happiness = 50;
            $this->health = 50;

        }

        public function getName(): string
        {
            return $this->name;
        }

        public function getTime(): int
        {
            return $this->time;
        }

        public function getAge(): int
        {
            $current_age = 1 + floor($this->time/5);
            $this->age = $current_age;
            return $current_age;
        }

        public function getAlive(): Alive
        {
            return $this->alive;
        }

        public function getEnergy(): int
        {
            return $this->energy;
        }

        public function getHunger(): int
        {
            return $this->hunger;
        }

        public function getHappiness(): int
        {
            return $this->happiness;
        }

        public function getHealth(): int
        {
            return $this->health;
        }
        
        public function increaseTime(): void
        {
            $this->time += 1;
        }
        
        public function setName($newName): void
        {
            $this->name = $newName;
        }

        public function decreaseHunger($amount): void
        {
            $this->hunger -= $amount;
        }

        public function increaseHunger($amount): void
        {
            $this->hunger -= $amount;
        }

        public function decreaseEnergy($amount): void
        {
            $this->energy -= $amount;
        }

        public function increaseEnergy($amount): void
        {
            $this->energy -= $amount;
        }

        public function decreaseHappiness($amount): void
        {
            $this->happiness -= $amount;
        }

        public function increaseHappiness($amount): void
        {
            $this->happiness -= $amount;
        }

        public function decreaseHealth($amount): void
        {
            $this->health -= $amount;
        }

        public function increaseHealth($amount): void
        {
            $this->health -= $amount;
        }

        public function checkHealth(): int
        {
            if ($this->health === 0)
                {
                $this->alive = Alive :: DEAD;
                }
            return $this->health;
        }

}