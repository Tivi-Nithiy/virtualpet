<?php

namespace App\Commands;

use Domain\Pet_Management;
use App\DispatchResult;

final class Tick implements Command
{
    public function name(): string
    {
        return 'tick';
    }

    public function help(): string
    {
        return "tick            - one tick passes";
    }

    public function run(Pet_Management $pet_manager, array $args): DispatchResult
    {
        if ($pet_manager->checkAlive() === 0)
                {
                return new DispatchResult('Your pet has died due to low health');
                }
        $pet_manager->tick();
        return new DispatchResult ("Tick tock!"); 
    }
}