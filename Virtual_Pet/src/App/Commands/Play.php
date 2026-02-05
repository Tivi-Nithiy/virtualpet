<?php

namespace App\Commands;

use Domain\Pet_Management;
use App\DispatchResult;

final class Play implements Command
{
    public function name(): string
    {
        return 'play';
    }

    public function help(): string
    {
        return "play            - play with your pet";
    }

    public function run(Pet_Management $pet_manager, array $args): DispatchResult
    {
        if ($pet_manager->checkAlive() === 0)
                {
                return new DispatchResult('Your pet has died due to low health');
                }    
        if ($pet_manager->checkEnergy() < 20)
                {
                return new DispatchResult("Your pet's energy levels are too low");
                }  
        $pet_manager->play();
        return new DispatchResult ("Let's play!"); 
    }
}